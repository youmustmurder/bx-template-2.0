<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arTemplateParameters = array(
    "SLIDER_AUTOPLAY" => array(
        'PARENT' => 'BASE',
        'NAME' => Loc::getMessage('HOME_SLIDER_DEFAULT_AUTOPLAY_TITLE'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'Y'
    ),
    "SLIDER_ARROWS" => array(
        'PARENT' => 'BASE',
        'NAME' => Loc::getMessage('HOME_SLIDER_DEFAULT_ARROWS_TITLE'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'Y'
    ),
    "SLIDER_TIME" => array(
        'PARENT' => 'BASE',
        'NAME' => Loc::getMessage('HOME_SLIDER_DEFAULT_AUTOPLAY_TIME_TITLE'),
        'TYPE' => 'STRING',
        'DEFAULT' => '3000'
    ),
    'NEWS_COUNT' => array(
        'NAME' => Loc::getMessage('HOME_SLIDER_DEFAULT_NEWS_COUNT_TITLE'),
        'PARENT' => 'BASE',
        'TYPE' => 'STRING',
        'DEFAULT' => '5'
    ),
    'SLIDER_BTN_TYPE' => array(
        'NAME' => Loc::getMessage('HOME_SLIDER_DEFAULT_BTN_TYPE_TITLE'),
        'PARENT' => 'BASE',
        'TYPE' => 'LIST',
        'VALUES' => array(
            'BIG' => Loc::getMessage('HOME_SLIDER_DEFAULT_BTN_TYPE_BIG'),
            'MID' => Loc::getMessage('HOME_SLIDER_DEFAULT_BTN_TYPE_MID')
        )
    ),
    'PREVIEW_TRUNCATE_LEN' => array('HIDDEN' => 'Y'),
    'ACTIVE_DATE_FORMAT' => array('HIDDEN' => 'Y'),
    'SET_TITLE' => array('HIDDEN' => 'Y'),
    'SET_BROWSER_TITLE' => array('HIDDEN' => 'Y'),
    'SET_META_KEYWORDS' => array('HIDDEN' => 'Y'),
    'SET_META_DESCRIPTION' => array('HIDDEN' => 'Y'),
    'SET_LAST_MODIFIED' => array('HIDDEN' => 'Y'),
    'INCLUDE_IBLOCK_INTO_CHAIN' => array('HIDDEN' => 'Y'),
    'HIDE_LINK_WHEN_NO_DETAIL' => array('HIDDEN' => 'Y'),
    'ADD_SECTIONS_CHAIN' => array('HIDDEN' => 'Y'),
    'DETAIL_URL' => array('HIDDEN' => 'Y'),
    'PARENT_SECTION' => array('HIDDEN' => 'Y'),
    'PARENT_SECTION_CODE' => array('HIDDEN' => 'Y'),
    'INCLUDE_SUBSECTIONS' => array('HIDDEN' => 'Y'),
    'STRICT_SECTION_CHECK' => array('HIDDEN' => 'Y'),
    'PAGER_TEMPLATE' => array('HIDDEN' => 'Y'),
    'DISPLAY_TOP_PAGER' => array('HIDDEN' => 'Y'),
    'DISPLAY_BOTTOM_PAGER' => array('HIDDEN' => 'Y'),
    'PAGER_DESC_NUMBERING_CACHE_TIME' => array('HIDDEN' => 'Y'),
    'PAGER_TITLE' => array('HIDDEN' => 'Y'),
    'PAGER_SHOW_ALL' => array('HIDDEN' => 'Y'),
    'PAGER_DESC_NUMBERING' => array('HIDDEN' => 'Y'),
    'PAGER_BASE_LINK_ENABLE' => array('HIDDEN' => 'Y'),
    'PAGER_SHOW_ALWAYS' => array('HIDDEN' => 'Y'),
    'SET_STATUS_404' => array('HIDDEN' => 'Y'),
    'SHOW_404' => array('HIDDEN' => 'Y'),
    'MESSAGE_404' => array('HIDDEN' => 'Y'),
);