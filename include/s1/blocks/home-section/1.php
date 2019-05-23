<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

global $sectionFilter;
$sectionFilter = array('UF_SECTION_ON_HOME' => '1');

$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"home-section_1", 
	array(
		"IBLOCK_TYPE" => "base",
		"IBLOCK_ID" => "1",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_CODE" => "",
		"COUNT_ELEMENTS" => "Y",
		"TOP_DEPTH" => "1",
		"SECTION_TITLE" => "",
		"SECTION_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_USER_FIELDS" => array(
			0 => "UF_SECTION_ON_HOME",
			1 => "UF_SECTION_SUBTITLE",
			2 => "UF_ANONS",
			3 => "UF_SECTION_PERCENT",
		),
		"FILTER_NAME" => "sectionFilter",
		"SECTION_URL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"CACHE_FILTER" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"COMPONENT_TEMPLATE" => "home-section_1",
		"SECTION_LINK" => "",
		"SEF_MODE" => "N"
	),
	false
);