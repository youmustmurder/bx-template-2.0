<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arTemplateParameters = array(
    "COUNT_ELEMENTS" => array("HIDDEN" => "Y"),
    "ADD_SECTIONS_CHAIN" => array("HIDDEN" => "Y"),
    "SECTION_FIELDS" => array("HIDDEN" => "Y"),
    "SECTION_USER_FIELDS" => array("HIDDEN" => "Y"),
    "TOP_DEPTH" => array("HIDDEN" => "Y"),
    "SEF_MODE" => array("HIDDEN" => "Y"),
    "SECTION_TITLE" => array(
        "NAME" => Loc::getMessage("CATEGORIES_NAME_SECTION_TITLE"),
        "TYPE" => "STRING",
        "PARENT" => "BASE"
    ),
    "SECTION_LINK_NAME" => array(
        "NAME" => Loc::getMessage("CATEGORIES_NAME_SECTION_LINK_NAME"),
        "TYPE" => "STRING",
        "PARENT" => "BASE"
    ),
    "SECTION_LINK" => array(
        "NAME" => Loc::getMessage("CATEGORIES_NAME_SECTION_LINK"),
        "TYPE" => "STRING",
        "PARENT" => "BASE",
        "DEFAULT" => "catalog/"
    ),
    "MAX_ITEMS" => array(
        "NAME" => Loc::getMessage("CATEGORIES_NAME_MAX_ITEMS"),
        "TYPE" => "STRING",
        "PARENT" => "BASE",
        "DEFAULT" => "6"
    )
);