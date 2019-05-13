<?
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

AddEventHandler('main', 'OnBuildGlobalMenu', 'OnBuildGlobalMenuHandlerWebsiteTemplate');
function OnBuildGlobalMenuHandlerWebsiteTemplate (&$arGlobalMenu, &$arModuleMenu)
{
    $moduleID = 'website.template';
    
    $arGlobalMenu['global_menu_website'] = [
        'menu_id' => 'global_menu_website',
        'text' => Loc::getMessage('WEBSITE_TEMPLATE_MENU_TEXT'),
        'title' => Loc::getMessage('WEBSITE_TEMPLATE_MENU_TITLE'),
        'sort' => 1000,
        'items_id' => 'global_menu_website',
        'items' => [
            [
                'text'      => Loc::getMessage('WEBSITE_TEMPLATE_MENU_OPTIONS_TEXT'),
                'title'     => Loc::getMessage('WEBSITE_TEMPLATE_MENU_OPTIONS_TITLE'),
                'sort'      => 10,
                'url'       => '/bitrix/admin/' . $moduleID . '_options.php',
                //'url'       => '/local/modules/website.template/options.php',
                'icon'      => 'util_menu_icon',
                'page_icon' => '',
                'items_id'  => 'menu_custom',
            ]
        ],
    ];
}