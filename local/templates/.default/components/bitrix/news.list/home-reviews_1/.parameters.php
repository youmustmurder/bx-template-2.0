<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */
dump(SITE_DIR);
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arTemplateParameters = array(
    "BLOCK_TITLE" => array(
        'PARENT' => 'BASE',
        'NAME' => Loc::getMessage('HOME_REVIEWS_1_BLOCK_TITLE_NAME'),
        'TYPE' => 'STRING',
        'DEFAULT' => Loc::getMessage('HOME_REVIEWS_1_BLOCK_TITLE_DEFAULT')
    ),
    "SECTION_LINK_NAME" => array(
        'PARENT' => 'BASE',
        'NAME' => Loc::getMessage('HOME_REVIEWS_1_SECTION_LINK_NAME_NAME'),
        'TYPE' => 'STRING',
        'DEFAULT' => Loc::getMessage('HOME_REVIEWS_1_SECTION_LINK_NAME_DEFAULT')
    ),
    "SECTION_LINK" => array(
        'PARENT' => 'BASE',
        'NAME' => Loc::getMessage('HOME_REVIEWS_1_SECTION_LINK_NAME'),
        'TYPE' => 'STRING',
        'DEFAULT' => Loc::getMessage('HOME_REVIEWS_1_SECTION_LINK_DEFAULT')
    ),
    'PREVIEW_TRUNCATE_LEN' => array('HIDDEN' => 'Y'),
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
    'MESSAGE_404' => array('HIDDEN' => 'Y')
);