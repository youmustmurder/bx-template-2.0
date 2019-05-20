<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

$APPLICATION->IncludeComponent(
    "bitrix:catalog.section.list",
    "home-sections_1",
    array(
        "IBLOCK_TYPE" => "base",
        "IBLOCK_ID" => "1",
        "SECTION_ID" => $_REQUEST["SECTION_ID"],
        "SECTION_CODE" => "",
        "COUNT_ELEMENTS" => "Y",
        "TOP_DEPTH" => "2",
        "SECTION_FIELDS" => array(
            0 => "",
            1 => "",
        ),
        "SECTION_USER_FIELDS" => array(
            0 => "",
            1 => "",
        ),
        "FILTER_NAME" => "sectionsFilter",
        "SECTION_URL" => "",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_GROUPS" => "Y",
        "CACHE_FILTER" => "N",
        "ADD_SECTIONS_CHAIN" => "Y"
    ),
    false
);