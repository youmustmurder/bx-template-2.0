<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

global $arFilial;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/script.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');
?>

<div class="header-responsive">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <nav class="col-md-1 col-sm-2 col-3 header-responsive__burger-wrap">
                <button class="header-responsive__burger"></button>
            </nav>
            <div class="col-md-3 col-sm-6 col-6 header-responsive__logo d-flex align-items-center">
                <a href="<?=SITE_DIR?>" class="d-inline-flex align-items-center head-logo__link" style="height:70px">
                    <?$APPLICATION->IncludeFile(
                        "/include/" . SITE_ID . "/content/logo.php",
                        array(),
                        array(
                            "SHOW_BORDER" => true,
                            "MODE" => "html"
                        )
                    );?>
                </a>
			</div>
			<?if ($arFilial['PHONE']) {?>
                <a href="tel:<?=preg_replace('~[^0-9]+~', '', $arFilial['PHONE']);?>"
                   class="col-md-4 col-sm-2 col-3 header-responsive__phone header-responsive-phone">
                    <span class="header-responsive-phone__icon">
                        <?=GetContentSvgIcon('phone');?>
                    </span>
                    <span class="header-responsive-phone__value" ><?=$arFilial['PHONE']?></span>
                </a>
			<?}?>
            <div class="col-sm-auto header-responsive__callback">
                <?$APPLICATION->IncludeComponent(
                    "website96:web.forms",
                    ".default",
                    array(
                        "COMPONENT_TEMPLATE" => ".default",
                        "IBLOCK_TYPE" => "forms",
                        "IBLOCK_ID" => "14",
                        "FORM_PRODUCT_ADD" => "N",
                        "FORM_BTN_TYPE" => "btn_round",
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
                        "FORM_PRODUCT_ID" => "",
                        "FORM_BTN_STYLE" => "btn_primary",
                        "FORM_BTN_SIZE" => "btn_min",
                        "FORM_LINK_TYPE" => "btn"
                    ),
                    false
                );?>
            </div>
        </div>
    </div>
</div>

<div class="mobile-menu">
	<div class="mobile-menu__content">
		<div class="mobile-menu__menu">
			<?$APPLICATION->IncludeFile(
				"/include/" . SITE_ID . "/blocks/menu/catalog_top.php",
				array(),
				array(
					"SHOW_BORDER" => false,
					"MODE" => "php"
				)
			);?>
		</div>
		<div class="mobile-menu__menu mobile-menu__menu_nav-site">
			<?$APPLICATION->IncludeFile(
				"/include/" . SITE_ID . "/blocks/menu/top.php",
				array(),
				array(
					"SHOW_BORDER" => false,
					"MODE" => "php"
				)
			);?>
		</div>
		<div class="mobile-menu__contacts">
			<?if ($arFilial['PHONE']) {?>
				<a class="mobile-menu__contact mobile-menu-contact"
                   href="tel:<?=preg_replace('~[^0-9]+~', '', $arFilial['PHONE']);?>">
					<span class="mobile-menu-contact__icon">
						<?=GetContentSvgIcon('phone');?>
					</span>
					<span class="mobile-menu-contact__value"><?=$arFilial['PHONE']?></span>
				</a>
			<?}?>
			<?if ($arFilial['CITY'] || $arFilial['ADDRESS']) {?>
				<a class="mobile-menu__contact mobile-menu-contact" href="<?=SITE_DIR?>contacts/">
					<span class="mobile-menu-contact__icon">
						<?=GetContentSvgIcon('geo');?>
					</span>
					<span class="mobile-menu-contact__value">
						<?=$arFilial['CITY'] ? '<span>' . $arFilial['CITY'] . '</span>' : ''?>
						<?=$arFilial['ADDRESS'] ? '<span>' . $arFilial['ADDRESS'] . '</span>' : ''?>
					</span>
				</a>
			<?}?>
		</div>
	</div>
</div>