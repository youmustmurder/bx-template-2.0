<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();use Bitrix\Main\Loader,    Bitrix\Main\Context;;Loader::includeModule('website.template');$request = Context::getCurrent()->getRequest();$CWb = new CWebsiteTemplate();/*$CWb->load();$arResult = array(    'FIELDS' => $CWb->result(),    'SETTING' => $CWb->settings);*/global $arCurrentSetting;dump($_POST);if ($request->isPost()) {        die();}if (check_bitrix_sessid() && $_REQUEST['SET_SETTING'] == 'Y') {    $APPLICATION->RestartBuffer();    $arSetting = array();    foreach ($arResult['SETTING'] as $code => $value) {        if (isset($_REQUEST[$code])) {            if (is_array($_REQUEST[$code])) {                foreach ($_REQUEST[$code] as $k => $val) {                    $arSetting[$code][$k] = $val;                }            } else {                $arSetting[$code] = $_REQUEST[$code];                            }                    }            }    $json['success'] = $CWb->setTemplateSetting($arSetting);    //*$json['success'] = $arResult['SETTING'];    echo json_encode($json);    die();    } elseif ($_REQUEST['TEMPLATE_RESET'] == 'Y') {        $CWb->reset();        } else {        $this->IncludeComponentTemplate();    }