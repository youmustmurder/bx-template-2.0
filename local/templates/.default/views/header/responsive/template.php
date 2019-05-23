<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

global $arCurrentSetting,
       $arFilial;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/script.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');
?>

<div class="header-responsive">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <nav class="col-md col-sm-2 col-3 header-responsive__burger-wrap">
                <button class="header-responsive__burger"></button>
            </nav>
            <div class="col-md-3 col-sm-6 col-6 header-responsive__logo d-flex align-items-center">
                <a href="/" class="d-inline-flex align-items-center head-logo__link" style="height:70px">
                    <?$APPLICATION->IncludeFile(
                        "/include/" . SITE_ID . "/logo.php",
                        array(),
                        array(
                            "SHOW_BORDER" => true,
                            "MODE" => "html"
                        )
                    );?>
                </a>
			</div>
			<?if ($arFilial['PHONE']) {?>
            <a href="tel:<?=preg_replace('~[^0-9]+~', '', $arFilial['PHONE']);?>" class="col-md-4 col-sm-2 col-3 header-responsive__phone header-responsive-phone">
                <span class="header-responsive-phone__icon">
					<?=GetContentSvgIcon('phone');?>
				</span>
				<span class="header-responsive-phone__value" ><?=$arFilial['PHONE']?></span>
			</a>
			<?}?>
            <div class="col-sm-auto header-responsive__callback">
                <a href="#" class="link link_secondary js-init-modal__form" data-sign="%3D" data-modal="14">Заказать звонок</a>
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
				<a class="mobile-menu__contact mobile-menu-contact" href="tel:<?=preg_replace('~[^0-9]+~', '', $arFilial['PHONE']);?>">
					<span class="mobile-menu-contact__icon">
						<?=GetContentSvgIcon('phone');?>
					</span>
					<span class="mobile-menu-contact__value"><?=$arFilial['PHONE']?></span>
				</a>
			<?}?>
			<?if ($arFilial['CITY'] || $arFilial['ADDRESS']) {?>
				<a class="mobile-menu__contact mobile-menu-contact" href="/contacts/">
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