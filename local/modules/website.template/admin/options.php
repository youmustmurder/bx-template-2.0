<?
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_before.php');
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_after.php');

use \Bitrix\Main\Loader,
    \Bitrix\Main\Config\Option,
    \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
//Loc::loadMessages($_SERVER['DOCUMENT_ROOT'] . BX_ROOT . '/modules/main/options.php');

$moduleID = 'website.template';

Loader::IncludeModule($moduleID);
Loader::IncludeModule("iblock");
Loader::IncludeModule('highloadblock');

$RIGHT = $APPLICATION->GetGroupRight($moduleID);

if ($RIGHT >= "R") {
    $showRightsTab = false;
    $arSites = array();
    $db_res = CSite::GetList($by, $sort, array("ACTIVE"=>"Y"));
    while($res = $db_res->Fetch()){
        $arSites[] = $res;
    }
    
    $arTabs = array();
    foreach($arSites as $key => $arSite){
        $arTabs[] = array(
            "DIV" => "edit".($key+1),
            "TAB" => Loc::getMessage("MAIN_OPTIONS_SITE_TITLE", array(
                "#SITE_NAME#" => $arSite["NAME"],
                "#SITE_ID#" => $arSite["ID"])
            ),
            "ICON" => "settings",
            "TITLE" => GetMessage("MAIN_OPTIONS_TITLE"),
            "PAGE_TYPE" => "site_settings",
            "SITE_ID" => $arSite["ID"],
            "SITE_DIR" => $arSite["DIR"],
            "OPTIONS" => $arOptions,
        );
    }
    
    $arGroups = array(
        'MAIN' => array(
            'TITLE' => Loc::getMessage('GROUP_MAIN_OPTIONS_TITLE'),
            'TAB' => 0
        ),
        'HOME_PAGE' => array(
            'TITLE' => Loc::getMessage('GROUP_HOME_PAGE_TITLE'),
            'TAB' => 1
        ),
        'SOCIAL' => array(
            'TITLE' => Loc::getMessage('GROUP_SOCIAL_TITLE'),
            'TAB' => 2
        )
    );
    
    $arOptions = array(
        'THEME_SWITCHER' => array(
            'TITLE' => Loc::getMessage('THEME_SWITCHER_TITLE'),
            'TYPE' => 'CHECKBOX',
            'GROUP' => 'MAIN',
            'DEFAULT' => 'Y',
            'SORT' => 100
        ),
        'LOGO_IMAGE' => array(
            'TITLE' => Loc::getMessage('LOGO_IMAGE_TITLE'),
            'TYPE' => 'FILE',
            'GROUP' => 'MAIN',
            'DEFAULT' => '',
            'SORT' => 200
        ),
        'FAVICON' => array(
            'TITLE' => Loc::getMessage('FAVICON_TITLE'),
            'TYPE' => 'FILE',
            'GROUP' => 'MAIN',
            'DEFAULT' => '',
            'SORT' => 300
        ),
        'COLOR' => array(
            'TITLE' => Loc::getMessage('COLOR_TITLE'),
            'TYPE' => 'SELECT',
            'GROUP' => 'MAIN',
            'VALUES' => '',
            'SORT' => 400
        ),
        'FONT' => array(
            'TITLE' => Loc::getMessage('FONT_TITLE'),
            'TYPE' => 'SELECT',
            'GROUP' => 'MAIN',
            'VALUES' => '',
            'SORT' => 500
        ),
        'FONT_SIZE' => array(
            'TITLE' => Loc::getMessage('FONT_SIZE_TITLE'),
            'TYPE' => 'SELECT',
            'GROUP' => 'MAIN',
            'VALUES' => '',
            'SORT' => 600
        ),
        'HEADER' => array(
            'TITLE' => Loc::getMessage('HEADER_TITLE'),
            'TYPE' => 'SELECT',
            'GROUP' => 'MAIN',
            'VALUES' => '',
            'SORT' => 700
        ),
        'FOOTER' => array(
            'TITLE' => Loc::getMessage('FOOTER_TITLE'),
            'TYPE' => 'SELECT',
            'GROUP' => 'MAIN',
            'VALUES' => '',
            'SORT' => 800
        ),
        'HOME_SLIDER' => array(
            'TITLE' => Loc::getMessage('HOME_SLIDER_TITLE'),
            'GROUP' => 'HOME_PAGE',
            'TYPE' => 'SELECT',
            'VALUES' => '',
            'SORT' => 100
        ),
        'HOME_CATALOG_SECTIONS' => array(
            'TITLE' => Loc::getMessage('HOME_CATALOG_SECTIONS_TITLE'),
            'GROUP' => 'HOME_PAGE',
            'TYPE' => 'SELECT',
            'VALUES' => '',
            'SORT' => 200
        ),
        'HOME_CATALOG_PRODUCTS' => array(
            'TITLE' => Loc::getMessage('HOME_CATALOG_PRODUCTS_TITLE'),
            'GROUP' => 'HOME_PAGE',
            'TYPE' => 'SELECT',
            'VALUES' => '',
            'SORT' => 300
        ),
        'HOME_SERVICES' => array(
            'TITLE' => Loc::getMessage('HOME_SERVICES_TITLE'),
            'GROUP' => 'HOME_PAGE',
            'TYPE' => 'SELECT',
            'VALUES' => '',
            'SORT' => 400
        ),
        'HOME_NEWS' => array(
            'TITLE' => Loc::getMessage('HOME_NEWS_TITLE'),
            'GROUP' => 'HOME_PAGE',
            'TYPE' => 'SELECT',
            'VALUES' => '',
            'SORT' => 500
        ),
        'HOME_REVIEWS' => array(
            'TITLE' => Loc::getMessage('HOME_REVIEWS_TITLE'),
            'GROUP' => 'HOME_PAGE',
            'TYPE' => 'SELECT',
            'VALUES' => '',
            'SORT' => 600
        ),
        
        'SOCIAL_VK' => array(
            'TITLE' => Loc::getMessage('SOCIAL_VK_TITLE'),
            'GROUP' => '',
            'TYPE' => 'SELECT',
            'VALUES' => '',
            'SORT' => 600
        ),
            'SOCIAL_FACEBOOK' => array(),
            'SOCIAL_FB' => array(),
            'SOCIAL_INSTAGRAM' => array(),
            'SOCIAL_TELEGRAM' => array(),
            'SOCIAL_YOUTUBE' => array(),
            'SOCIAL_ODNOKLASSNIKI' => array(),
            'SOCIAL_MAIL' => array(),
        
    );
  /*
        $arOptions2 = array(
        'WEBSITE_TEMPLATE_SETTING_VIEW_LOGO' => array(
            'GROUP' => 'SETTING_VIEW_GROUP_MAIN',
            'TYPE' => 'FILE',
            'NAME' => 'лого'
        ),
        'WEBSITE_TEMPLATE_SETTING_VIEW_TYPE_SAVE' => [
            'GROUP' => 'SETTING_VIEW_GROUP_MAIN',
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_SETTING_VIEW_TYPE_SAVE'),
            'TYPE' => 'SELECT',
            'VALUES' => [
                'REFERENCE_ID' => ['file', 'session'],
                'REFERENCE' => ['В файле', 'В сессии']
            ],
            'SORT' => 50
        ],
        'WEBSITE_TEMPLATE_SETTING_VIEW_PANEL' => [
            'GROUP' => 'SETTING_VIEW_GROUP_MAIN',
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_SETTING_VIEW_PANEL'),
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'Y',
            'SORT' => 100
        ],
        'WEBSITE_TEMPLATE_SETTING_VIEW_COLOR_MAIN' => [
            'GROUP' => 'SETTING_VIEW_GROUP_COLOR',
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_SETTING_VIEW_COLOR_MAIN'),
            'TYPE' => 'SELECT',
            'VALUES' => $arColors,
            'SORT' => 200
        ],
        'WEBSITE_TEMPLATE_SETTING_VIEW_COLOR_ACTION' => [
            'GROUP' => 'SETTING_VIEW_GROUP_COLOR',
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_SETTING_VIEW_COLOR_ACTION'),
            'TYPE' => 'SELECT',
            'VALUES' => $arColors,
            'SORT' => 250
        ],
        'WEBSITE_TEMPLATE_SETTING_VIEW_HEADER' => [
            'GROUP' => 'SETTING_VIEW_GROUP_HEADER',
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_SETTING_VIEW_HEADER_LIST'),
            'TYPE' => 'SELECT',
            'VALUES' => $arHeaders,
            'SORT' => 300
        ],
        'WEBSITE_TEMPLATE_SETTING_VIEW_HOME' => [
            'GROUP' => 'SETTING_VIEW_GROUP_HOME',
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_SETTING_VIEW_HOME_LIST'),
            'TYPE' => 'SELECT',
            'VALUES' => $arHomeViews,
            'SORT' => 400
        ],
        'WEBSITE_TEMPLATE_SETTING_SITE_FAST_ORDER' => [
            'GROUP' => 'SETTING_SITE_GROUP_MAIN',
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_SETTING_SITE_FAST_ORDER'),
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'Y',
            'SORT' => 100
        ]
    );*/
    
    $tabControl = new CAdminTabControl("tabControl", $arTabs);

    $opt = new CModuleOptions($module_id, $arTabs, $arGroups, $arOptions, $showRightsTab);
    $opt->ShowHTML();

}