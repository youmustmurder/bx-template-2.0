<?

if(!defined('WEBSITE_MODULE_ID')) {
    define('WEBSITE_MODULE_ID', 'website.template');
}

use Bitrix\Highloadblock as HL,
    Bitrix\Main\Localization\Loc,
    Bitrix\Main\Loader,
    Bitrix\Main\Application,
    Bitrix\Main\Page\Asset,
    Bitrix\Iblock\ElementTable;

Loc::loadMessages(__FILE__);
Loader::includeModule('iblock');
Loader::includeModule('highloadblock');

require_once __DIR__ . '/../../parameters.php';

class CWebsiteTemplate {
    const SITE_DIR = SITE_DIR;

    static $arParametersList = array();
    static $arCurrentSetting = array();
    static $arCurrentFilial = array();
    static $demoMode = false;
    static $settingPathFile;
    
    static function getPathSettingFile()
    {
        return self::$demoMode ? false : $_SERVER['DOCUMENT_ROOT'] . SITE_DIR . '.settings.json';
    }
    
    static function getSiteTypes()
    {
        $arTypes = array(
            'COMPANY' => Loc::getMessage('WEBSITE_TEMPLATE_TYPE_COMPANY'),
            'CATALOG' => Loc::getMessage('WEBSITE_TEMPLATE_TYPE_CATALOG'),
            'SHOP' => Loc::getMessage('WEBSITE_TEMPLATE_TYPE_SHOP'),
        );
        return CWebsiteTemplate::$demoMode ? $arTypes : false;
    }
    
    public static function loadCss()
    {
        foreach (self::$arCurrentSetting as $code => $value) {
            switch ($code) {
                case 'FONT':
                    $key = self::recursiveArraySearch($value, self::$arParametersList[$code]);
                    Asset::getInstance()->addCss(self::$arParametersList[$code][$key]['FONT_SRC']);
                    Asset::getInstance()->addCss(self::getCss($code, $value));
                    break;
                case 'COLOR':
                case 'FONT_SIZE':
                    Asset::getInstance()->addCss(self::getCss($code, $value));
                    break;
            }
        }
    }
    
    public static function getCurrentFilial()
    {
        $arFilial = array();
        $res = CIBlockElement::GetList(
            array(),
            array('IBLOCK_CODE' => 'filials', 'ACTIVE' => 'Y', '!PROPERTY_C_DEFAULT_VALUE' => false),
            false, array(),
            array('ID', 'IBLOCK_ID', 'PROPERTY_*')
        );
        while ($ar = $res->GetNextElement()) {
            $ar_res = $ar->GetFields();
            $ar_res['PROPERTIES'] = $ar->GetProperties();
            foreach ($ar_res['PROPERTIES'] as $code => $prop) {
                switch ($code) {
                    case 'C_CITY':
                        $arFilial['ADDRESS'] = $ar_res['PROPERTIES']['C_ADDRESS']['VALUE'] && $prop['VALUE'] ?
                            $prop['VALUE'] . ', ' . $ar_res['PROPERTIES']['C_ADDRESS']['VALUE'] : $prop['VALUE'];
                        break;
                    case 'C_PHONE':
                        $arFilial['PHONE'] = empty($prop['VALUE']) && !empty($ar_res['PROPERTIES']['C_PHONES']['VALUE'][0]) ?
                            $ar_res['PROPERTIES']['C_PHONES']['VALUE'][0] : $prop['VALUE'];
                        break;
                    case 'C_EMAIL':
                        $arFilial['EMAIL'] = empty($prop['VALUE']) && !empty($ar_res['PROPERTIES']['C_EMAILS']['VALUE'][0]) ?
                            $ar_res['PROPERTIES']['C_EMAILS']['VALUE'][0] : $prop['VALUE'];
                        break;
                }
            }
        }
        return $arFilial;
    }
    
    public static function getCss($codeProperty, $value = 'default')
    {
        if (empty($codeProperty)) {
            return false;
        }
        
        $request = Application::getInstance()->getContext()->getRequest();
        $filePath = SITE_TEMPLATE_PATH . '/public/css/theme/' . strtolower($codeProperty) . '.css';

        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $filePath) || $request->get('clear_cache') == 'Y') {
            $content = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/local/modules/' . WEBSITE_MODULE_ID . '/tools/css/' . strtolower($codeProperty) . '.tpl');
            $id = self::recursiveArraySearch($value, self::$arParametersList[$codeProperty]);
            if ($id === false) {
                $id = self::recursiveArraySearch('default', self::$arParametersList[$codeProperty]);
            }
            $value = $codeProperty == 'COLOR' || stripos($codeProperty, 'COLOR') ?
                '#' . self::$arParametersList[$codeProperty][$id]['VALUE'] :
                self::$arParametersList[$codeProperty][$id]['VALUE'];
            $content = str_replace('#VALUE#', $value, $content);
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . $filePath, $content);
        }
        return $filePath;
    }
    
    public function setTemplateSetting($settings)
    {
        if (empty($settings)) {
            return false;
        }

        $arCurSetting = self::$arCurrentSetting;
        
        foreach ($settings as $code => $value) {
            if (isset($arCurSetting[$code])) {
                if (is_array($value)) {
                    foreach ($value as $k => $val) {
                        $arCurSetting[$code][$k] = $val;
                    }
                } else {
                    $arCurSetting[$code] = $value;
                }
            }
        }

        if (CWebsiteTemplate::$demoMode == true) {
            $_SESSION['TEMPLATE_SETTINGS'] = json_encode($arCurSetting);
            return true;
        } else {
            $res = file_put_contents(CWebsiteTemplate::getPathSettingFile(), json_encode($arCurSetting)) ? true : false;
            return $res;
        }
    }

    static function getViewTemplates($typeView)
    {
        if (empty($typeView)) {
            return false;
        }
        
        $arItems = array();
        $pathViewTemplates = $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/views/' . $typeView . '/';
        
        if (is_dir($pathViewTemplates)) {
            $arTemplates = array_slice(scandir($pathViewTemplates), 2);
            foreach ($arTemplates as $template) {
                $pathTemplate = $pathViewTemplates . $template . '/';
                    if (is_dir($pathTemplate)) {
                        $arFiles = array_slice(scandir($pathTemplate), 2);
                        if (is_array($arFiles) && $arFiles) {
                            if (file_exists($pathTemplate . 'template.php')) {
                                $arItems[$template]['ID'] = $template;
                                if (file_exists($pathTemplate . '.description.php')) {
                                    $arItems[$template]['NAME'] = file_get_contents($pathTemplate . '.description.php') ?: $template;
                                }
                                if (file_exists($pathTemplate . 'preview.png')) {
                                    $arItems[$template]['PICTURE'] = $pathTemplate . '/preview.png';
                                }
                            }
                        }
                    }
                }
            }
        return $arItems;
    }

    public static function getElementsHLBlock($ID)
    {
        if (empty($ID)) {
            return false;
        }
        if(($entityDataClass = self::getEntityDataClass($ID)) != false){
            $rsData = $entityDataClass::getList(array('select' => array('*')));
            $elements = array();
            while ($arFields = $rsData->fetch()) {
               
                foreach ($arFields as $code => $field) {
                    if (strpos($code, 'UF') === false) {
                        $elements[$arFields['ID']][$code] = $field;
                    } else {
                        $code = str_replace('UF_', '', $code);
                        switch ($code) {
                            case 'COLOR_HEX':
                                $elements[$arFields['ID']]['VALUE'] = $field;
                                break;
                            case 'FONT_NAME':
                                $elements[$arFields['ID']]['VALUE'] = $field;
                                $elements[$arFields['ID']]['NAME'] = $field;
                                break;
                            case 'COLOR_NAME':
                                $elements[$arFields['ID']]['NAME'] = $field;
                                break;
                            default:
                                $elements[$arFields['ID']][$code] = $field;
                        }
                    }
                }
                
            }
            return $elements;
        } else {
            return false;
        }
    }

    static private function getEntityDataClass($id)
    {
        $hlblock = HL\HighloadBlockTable::getById($id)->fetch();
        if($hlblock['ID'] > 0){
            $entity = HL\HighloadBlockTable::compileEntity($hlblock);
            $result = $entity->getDataClass();
        } else {
            $result = false;
        }
        return $result;
    }

    protected static function recursiveArraySearch($needle, $haystack)
    {
        foreach ($haystack as $key => $value) {
            $currentKey = $key;
            if ($needle === $value || (is_array($value) && self::recursiveArraySearch($needle, $value) !== false)) {
                return $currentKey;
            }
        }
        return false;
    }

    public static function getTemplateSetting()
    {
        $arSetting = array(
            'SHOW_PANEL' => COption::GetOptionString(MODULE_ID, 'WEBSITE_TEMPLATE_SETTING_VIEW_PANEL', 'Y', SITE_ID),
            'TEMPLATE_TYPE' => 'CATALOG',
            'HEADER' => 'default',
            'FAST_ORDER' => 'Y',
            'FOOTER' => 'default',
            'COLOR' => 'default',
            'SECTIONS' => 'default',
            'ADVANTAGE' => 'default',
            'FONT_SIZE' => '15',
            'FONT' => 'default',
            'NEWS' => 'default',
            'REVIEWS' => 'default',
            'ABOUT' => 'default',
            'SERVICES' => 'default',
            'LOGO' => 'default',
            'SLIDER' => 'default',
            'PRODUCTS' => 'default'
        );
        
        if (CWebsiteTemplate::$demoMode == true) {
            self::$arCurrentSetting = strlen($_SESSION['TEMPLATE_SETTINGS']) > 1 ? json_decode($_SESSION['TEMPLATE_SETTINGS'], true)
                : $arSetting;
        } else {
            if (file_exists(CWebsiteTemplate::getPathSettingFile())) {
                self::$arCurrentSetting = json_decode(file_get_contents(CWebsiteTemplate::getPathSettingFile()), true);
            } else {
                if (file_put_contents(CWebsiteTemplate::getPathSettingFile(), json_encode($arSetting))) {
                    self::$arCurrentSetting = $arSetting;
                }
            }
        }
        return self::$arCurrentSetting;
    }
}