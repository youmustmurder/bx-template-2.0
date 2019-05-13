<?

if(!defined('WEBSITE_MODULE_ID')) {
    define('WEBSITE_MODULE_ID', 'website.template');
}

use Bitrix\Highloadblock as HL,
    Bitrix\Main\Localization\Loc,
    Bitrix\Main\Loader,
    Bitrix\Main\Page\Asset;

Loc::loadMessages(__FILE__);
Loader::includeModule('iblock');
Loader::includeModule('highloadblock');

require_once __DIR__ . '/../../parameters.php';

class CWebsiteTemplate {
    const SITE_DIR = SITE_DIR;

    static $arParametersList = array();
    static $arCurrentSetting = array();
    static $demoMode = false;
    static $settingPathFile;

    public function __construct($demoMode = false)
    {
        self::$demoMode = $demoMode;
    }
    
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
               // case 'COLOR':
              //  case 'FONT':
                case 'FONT_SIZE':
                    return self::getCss($code, $value);
                    if ($file) {
                        Asset::getInstance()->addCss($file);
                    }
                    break;
            }
        }
    }
    
    protected static function getCss($codeProperty, $value = 'default')
    {
        $arParameters = self::$arParametersList;
        return $arParameters;
        $request = Bitrix\Main\Application::getInstance()->getContext()->getRequest();
        $cssFilePath = SITE_TEMPLATE_PATH . '/public/css/theme/' . $colorCode . '.css';
        
        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $cssFilePath) || $request->get('clear_cache') == 'Y') {
            $content = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/local/modules/' . WEBSITE_MODULE_ID . '/tools/css/color.tpl');
            $ID = self::recursive_array_search($colorCode, self::$arParametersList['COLORS']);
            $content = str_replace('#', '#' . self::$arParametersList['COLORS'][$ID]['COLOR_HEX'], $content);
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . $cssFilePath, $content);
        }
        return $cssFilePath;
    }
    
    protected function getCssFonts($font_type, $font_code = 'default')
    {
        if (empty($font_type)) {
            return false;
        }
        $key = $this->recursive_array_search($font_code, $this->fonts);
        if ($key && !empty($this->fonts[$key])) {
            if ($this->fonts[$key]['FONT_SRC']) {
                Asset::getInstance()->addCss($this->fonts[$key]['FONT_SRC']);
            }
            $css = SITE_TEMPLATE_PATH . '/public/css/fonts/' . $font_type . '_' . $font_code . '.css';
            if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $css)) {
                $path = $_SERVER['DOCUMENT_ROOT'] . '/local/tools/fonts/' . $font_type . '.css';
                $content = file_get_contents($path);
                $content = str_replace($font_type, $this->fonts[$key]['FONT_NAME'], $content);
                //return $css;
                if (file_put_contents($_SERVER['DOCUMENT_ROOT'] . $css, $content)) {
                    Asset::getInstance()->addCss($css);
                    return true;
                } else {
                    return false;
                }
            } else {
                Asset::getInstance()->addCss($css);
                return true;
            }
        }
    }
    
    public function getCssSizeFonts($size)
    {
        if (empty($size)) {
            return false;
        }
        
        $css = SITE_TEMPLATE_PATH . '/public/css/fonts/size' . $size . '.css';
        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $css)) {
            $path = $_SERVER['DOCUMENT_ROOT'] . '/local/tools/fonts/FONT_SIZE.css';
            $content = file_get_contents($path);
            $content = str_replace('SIZE', $size, $content);
            if (file_put_contents($_SERVER['DOCUMENT_ROOT'] . $css, $content)) {
                Asset::getInstance()->addCss($css);
                return true;
            } else {
                return false;
            }
        } else {
            Asset::getInstance()->addCss($css);
            return true;
        }
    }
    
    public function setTemplateSetting($settings)
    {
        if (empty($settings)) {
            return false;
        }

        $arCurSetting = $this->settings;
        
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

    protected static function recursive_array_search($needle, $haystack)
    {
        foreach ($haystack as $key => $value) {
            $currentKey = $key;
            if ($needle === $value || (is_array($value) && self::recursive_array_search($needle, $value) !== false)) {
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
            'HEADER' => '.default',
            'FAST_ORDER' => 'Y',
            'FOOTER' => '.default',
            'COLOR' => 'default',
            'SECTIONS' => 'default',
            'ADVANTAGE' => 'default',
            'FONT_SIZE' => '15',
            'FONT' => array(
                'SIMPLE' => 'default',
                'TITLE' => 'default'
            ),
            'REVIEWS' => 'default',
            'LOGO' => 'default',
            'SLIDER' => 'default'
        );
        
        if (CWebsiteTemplate::$demoMode == true) {
            self::$arCurrentSetting = strlen($_SESSION['TEMPLATE_SETTINGS']) > 1 ? json_decode($_SESSION['TEMPLATE_SETTINGS'], true)
                : $arSetting;
        } else {
            self::$arCurrentSetting = file_exists(CWebsiteTemplate::getPathSettingFile()) ? json_decode(file_get_contents(CWebsiteTemplate::getPathSettingFile()), true)
                : $arSetting;
        }
        return self::$arCurrentSetting;
    }
}