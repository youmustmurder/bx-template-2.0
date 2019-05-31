<?php

global $arCurrentSetting,
       $arFilial;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/script.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');

?>
<header class="header">
    <nav class="header__top">
        <div class="container">
            <div class="row ">
				<div class="col d-flex justify-content-between align-items-center">
					<div class="header__block header__block_menu">
						<button class="header__hamburger">
							<span></span>
						</button>
					</div>
					<div class="d-flex align-items-center header__logo header-logo">
						<a href="<?=SITE_DIR?>" class="header-logo__link">
							<?$APPLICATION->IncludeFile(
								"/include/" . SITE_ID . "/logo.php",
								array(),
								array(
									"SHOW_BORDER" => true,
									"MODE" => "html"
								)
							);?>
						</a>
						<div class="header-logo__name"><?$APPLICATION->IncludeFile(
								"/include/" . SITE_ID . "/slogan.php",
								array(),
								array(
									"SHOW_BORDER" => true,
									"MODE" => "text"
								)
							);?>
						</div>
					</div>
					<div class="header-search header-search__min">
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
					<div class="header__block header__block_phone header-phone">
						<div class="header-phone__icon">
							<?=GetContentSvgIcon('phone');?>
						</div>
						<div class="header-phone__info">
							<?if ($arFilial['PHONE']) {?>
							<a class="header-phone__number"
								href="tel:<?=preg_replace('~[^0-9]+~', '', $arFilial['PHONE']);?>"><?=$arFilial['PHONE']?></a>
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
</header>

<div class="header-menu">
	<div class="container">
		<div class="header-menu__content">
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