<?php

global $arFilial;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/script.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');

?>

<header class="header">
    <nav class="header__top">
        <div class="container">
            <div class="row ">
				<div class="col d-flex justify-content-between align-items-center">
					<a href="<?=SITE_DIR?>" class="d-flex align-items-center header__logo">
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
					<?if ($arFilial['CITY'] || $arFilial['ADDRESS']) {?>
						<div class="header__contact header-contact">
							<div class="header-contact__icon">
								<?=GetContentSvgIcon('geo');?>
							</div>
							<div class="header-contact__value">
								<div>
									<?=$arFilial['CITY'] ? '<span>' . $arFilial['CITY'] . '</span>' : ''?>
									<?=$arFilial['ADDRESS'] ? '<span>' . $arFilial['ADDRESS'] . '</span>' : ''?>
								</div>
							</div>
						</div>
					<?}?>
					<div class="header__contact header-contact">
						<div class="header-contact__icon">
							<?=GetContentSvgIcon('phone');?>
						</div>
						<div class="header-contact__value">
							<?if ($arFilial['PHONE']) {?>
								<a class="header-contact__phone" href="tel:<?=preg_replace('~[^0-9]+~', '', $arFilial['PHONE']);?>"><?=$arFilial['PHONE']?></a>
							<?}?>
							<?$APPLICATION->IncludeComponent(
								"website96:web.forms",
								".default",
								array(
									"COMPONENT_TEMPLATE" => ".default",
									"IBLOCK_TYPE" => "forms",
									"IBLOCK_ID" => "14",
									"FORM_PRODUCT_ADD" => "N",
									"FORM_BTN_TYPE" => "link link_secondary",
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
    </nav>
    <nav class="header__bottom">
        <div class="container">
            <div class="row row-line">
                <div class="col-12">
                    <div class="header__catalog-menu header-catalog-menu">
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
        </div>
    </nav>
</header>