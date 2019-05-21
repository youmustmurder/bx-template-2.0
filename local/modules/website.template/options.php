<?
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_before.php');
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_after.php');

use \Bitrix\Main\Loader,
    \Bitrix\Main\Config\Option,
    \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
Loc::loadMessages($_SERVER['DOCUMENT_ROOT'] . BX_ROOT . '/modules/main/options.php');

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
            "TAB" => GetMessage("MAIN_OPTIONS_SITE_TITLE", array("#SITE_NAME#" => $arSite["NAME"], "#SITE_ID#" => $arSite["ID"])),
            "ICON" => "settings",
            "TITLE" => GetMessage("MAIN_OPTIONS_TITLE"),
            "PAGE_TYPE" => "site_settings",
            "SITE_ID" => $arSite["ID"],
            "SITE_DIR" => $arSite["DIR"],
            "OPTIONS" => $arBackParametrs,
        );
    }
    
    $arGroups = [
        'SETTING_VIEW_GROUP_MAIN' => [
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_SETTING_VIEW_GROUP_MAIN'),
            'TAB' => 0
        ],
        'SETTING_VIEW_GROUP_COLOR' => [
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_SETTING_VIEW_GROUP_COLOR'),
            'TAB' => 0
        ],
        'SETTING_VIEW_GROUP_HEADER' => [
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_SETTING_VIEW_GROUP_HEADER'),
            'TAB' => 0
        ],
        'SETTING_VIEW_GROUP_HOME' => [
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_SETTING_VIEW_GROUP_HOME'),
            'TAB' => 0
        ]
    ];
    
    $arOptions = array(
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
    );
    
    //$tabControl = new CAdminTabControl("tabControl", $arTabs);

    $opt = new CModuleOptions($module_id, $arTabs, $arGroups, $arOptions, $showRightsTab);
    $opt->ShowHTML();

}