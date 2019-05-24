<?
/**
* @author Lukmanov Mikhail <lukmanof92@gmail.com>
*/
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arTemplateParameters = array(
    "FILTER_NAME" => array("HIDDEN" => "Y"),
    "LINE_ELEMENT_COUNT" => array("HIDDEN" => "Y"),
    "OFFERS_LIMIT" => array("HIDDEN" => "Y"),
    "BACKGROUND_IMAGE" => array("HIDDEN" => "Y"),
    "SECTION_URL" => array("HIDDEN" => "Y"),
    "DETAIL_URL" => array("HIDDEN" => "Y"),
    "SECTION_ID_VARIABLE" => array("HIDDEN" => "Y"),
    "AJAX_MODE" => array("HIDDEN" => "Y"),
    "SEF_MODE" => array("HIDDEN" => "Y"),
    "AJAX_OPTION_STYLE" => array("HIDDEN" => "Y"),
    "AJAX_OPTION_JUMP" => array("HIDDEN" => "Y"),
    "AJAX_OPTION_HISTORY" => array("HIDDEN" => "Y"),
    "SET_TITLE" => array("HIDDEN" => "Y"),
    "SET_BROWSER_TITLE" => array("HIDDEN" => "Y"),
    "SET_META_KEYWORDS" => array("HIDDEN" => "Y"),
    "SET_META_DESCRIPTION" => array("HIDDEN" => "Y"),
    "SET_LAST_MODIFIED" => array("HIDDEN" => "Y"),
    "USE_MAIN_ELEMENT_SECTION" => array("HIDDEN" => "Y"),
    "ADD_SECTIONS_CHAIN" => array("HIDDEN" => "Y"),
    "CACHE_FILTER" => array("HIDDEN" => "Y"),
    "ACTION_VARIABLE" => array("HIDDEN" => "Y"),
    "PRODUCT_ID_VARIABLE" => array("HIDDEN" => "Y"),
    "USE_PRICE_COUNT" => array("HIDDEN" => "Y"),
    "SECTION_TITLE" => array(
        "NAME" => Loc::getMessage("CATEGORIES_NAME_SECTION_TITLE"),
        "TYPE" => "STRING",
        "PARENT" => "BASE"
    ),
    "SECTION_LINK" => array(
        "NAME" => Loc::getMessage("CATEGORIES_NAME_SECTION_LINK"),
        "TYPE" => "STRING",
        "PARENT" => "BASE"
    )
);