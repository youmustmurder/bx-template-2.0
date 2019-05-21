<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

global $arFilial;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/script.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');
?>
<header class="header">
    <nav class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-top__navbar">
                        <?$APPLICATION->IncludeFile(
                            "/include/" . SITE_ID . "/blocks/menu/top.php",
                            array(),
                            array(
                                "SHOW_BORDER" => false,
                                "MODE" => "php"
                            )
                        );?>
                    </div>
                </div>
                <address class="col-lg-6 header__address header-address d-flex align-items-center justify-content-end">
                    <?if ($arFilial['FULL_ADDRESS']) {?>
                        <a href="<?=SITE_DIR?>contacts/" class="header-address__link d-flex">
                            <span class="header-address__icon"><?=GetContentSvgIcon('address');?></span>
                            <span class="header-address__value"><?=$arFilial['FULL_ADDRESS']?></span>
                        </a>
                    <?}?>
                </address>
            </div>
        </div>
    </nav>
    <div class="header-middle">
        <div class="container">
            <div class="row">
				<div class="col d-flex justify-content-between align-items-center">
					<a href="<?=SITE_DIR?>" class="header-middle__logo d-flex align-items-center">
						<?$APPLICATION->IncludeFile(
							"/include/" . SITE_ID . "/logo.php",
							array(),
							array(
								"SHOW_BORDER" => true,
								"MODE" => "html"
							)
						);?>
					</a>
					<div class="header-search">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:search.form",
                            "",
                            array(
	                            "PAGE" => "#SITE_DIR#search/",
		                        "USE_SUGGEST" => "N",
	                        ),
                            false
                        );?>
					</div>
					<div class="header__contact">
						<?if ($arFilial['PHONE']) {?>
							<div class="header__phone">
								<?=GetContentSvgIcon('phone');?>
								<a href="tel:<?=preg_replace('~[^0-9]+~', '', $arFilial['PHONE']);?>"><?=$arFilial['PHONE']?></a>
							</div>
						<?}?>
						<div class="header__call">
							<?$APPLICATION->IncludeComponent(
								"website96:web.forms",
								".default",
								array(
									"COMPONENT_TEMPLATE" => ".default",
									"IBLOCK_TYPE" => "forms",
									"IBLOCK_ID" => "14",
									"FORM_PRODUCT_ADD" => "N",
									"FORM_BTN_TYPE" => "btn--primary",
									"FORM_FIELDS" => array(
										0 => "24",
										1 => "25",
									),
									"FORM_REQUIRED_FIELDS" => array(
										0 => "25",
									),
									"FORM_TITLE" => "Форма обратной связи",
									"FORM_BTN_OPEN" => "Заказать звонок",
									"FORM_BTN_SUBMIT" => "Отправить",
									"FORM_POLITIC_URL" => "/politic/",
									"CACHE_TYPE" => "A",
									"CACHE_TIME" => "3600",
									"FORM_PRODUCT_ID" => ""
								),
								false
							);?>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
    <nav class="header-bottom">
        <div class="container">
            <div class="row row-line">
                <div class="col header__catalog-menu header-catalog-menu">
                    <?$APPLICATION->IncludeFile(
                        "/include/" . SITE_ID . "/blocks/menu/catalog_top.php",
                        array(),
                        array(
                            "SHOW_BORDER" => false,
                            "MODE" => "php"
                        )
                    );?>
                </div>
            </div>
        </div>
    </nav>
</header>