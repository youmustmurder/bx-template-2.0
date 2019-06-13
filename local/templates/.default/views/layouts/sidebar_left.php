<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */
?>

<main>
	<div class="container">
		<div class="row">
			<div class="col">
                <?$APPLICATION->IncludeFile(
                    "/include/" . SITE_ID . "/blocks/breadcrumb.php",
                    array(),
                    array(
                        "SHOW_BORDER" => false,
                        "MODE" => "php"
                    )
                );?>
			</div>
		</div>
	</div>
	<div class="page-header">
		<div class="container">
			<div class="row">
				<div class="col">
					<h1><?=$APPLICATION->GetTitle()?></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="page">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-4 sidebar">
					<div class="catalog-menu sidebar__block">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            ".default",
                            array(
                                "COMPONENT_TEMPLATE" => ".default",
                                "ROOT_MENU_TYPE" => "catalog",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "MENU_CACHE_GET_VARS" => array(
                                ),
                                "MAX_LEVEL" => "2",
                                "CHILD_MENU_TYPE" => "left",
                                "USE_EXT" => "Y",
                                "DELAY" => "N",
                                "ALLOW_MULTI_SELECT" => "N",
                                "MAX_ITEMS" => "99"
                            ),
                            false
                        );?>
					</div>
					<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"sidebar_stocks", 
	array(
		"COMPONENT_TEMPLATE" => "sidebar_stocks",
		"IBLOCK_TYPE" => "base",
		"IBLOCK_ID" => "10",
		"NEWS_COUNT" => "3",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "j F Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false
);?>
				</div>
				<div class="col-lg-9 col-md-8">
                    <?=$arParams['CONTENT']?>
				</div>
			</div>
		</div>
	</div>
</main>