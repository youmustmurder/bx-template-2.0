<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

global $arCurrentSetting,
       $arFilial;

use Bitrix\Main\Page\Asset,
    Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/script.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');
?>
<footer class="footer">
    <div class="footer__top footer-top">
        <div class="container">
            <div class="row justify-content-between align-items-start">
                <div class="footer__nav footer-nav col-lg-3 col-md-4 col-sm-6">
                    <div class="footer-nav__title"><?=Loc::getMessage('PRODUCT_CATALOG')?></div>
                    <div class="footer-nav__catalog">
                        <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	".default", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "Y",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "catalog",
		"USE_EXT" => "Y",
		"COMPONENT_TEMPLATE" => ".default",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"MAX_ITEMS" => ""
	),
	$component
);?>
                    </div>
                </div>
                <div class="footer__nav footer-nav footer-nav_two-columns col-lg-5 col-md-4 col-sm-6">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        ".default",
                        array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "Y",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "footer",
                            "USE_EXT" => "N",
                            "COMPONENT_TEMPLATE" => ".default",
                            "COMPOSITE_FRAME_MODE" => "A",
                            "COMPOSITE_FRAME_TYPE" => "AUTO"
                        ),
                        false
                    );?>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <?if ($arFilial['PHONE']) {?>
                        <div class="footer__contact footer-contact">
                            <div class="footer-contact__icon"><?=GetContentSvgIcon('phone');?></div>
                            <div class="footer-contact__content">
                                <div class="footer-contact__name"><?=Loc::getMessage('PHONE_TITLE')?></div>
                                <a class="footer-contact__link" href="tel:<?=preg_replace('~[^0-9]+~', '', $arFilial['PHONE']);?>"><?=$arFilial['PHONE']?></a>
                            </div>
                        </div>
                    <?}?>
                    <?if ($arFilial['FULL_ADDRESS'] || $arFilial['ADDRESS']) {?>
                        <div class="footer__contact footer-contact">
                            <div class="footer-contact__icon"><?=GetContentSvgIcon('geo');?></div>
                            <div class="footer-contact__content">
                                <div class="footer-contact__name"><?=Loc::getMessage('ADDRESS_TITLE')?></div>
                                <a class="footer-contact__link" href="<?=SITE_DIR?>contacts/"><?=$arFilial['FULL_ADDRESS'] ?: $arFilial['ADDRESS']?></a>
                            </div>
                        </div>
                    <?}?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom footer-bottom">
        <div class="container">
            <div class="row footer__bottom-wrap">
                <div class="col-12 col-sm-6 footer__copyright">
                    <?$APPLICATION->IncludeFile(
                        "/include/" . SITE_ID . "/copyright.php",
                        array(),
                        array(
                            "SHOW_BORDER" => true,
                            "MODE" => "text"
                        )
                    );?>
                </div>
                <div class="col-12 col-sm-6 footer__developer">
                    <a rel="nofollow" href="http://website96.ru/" target="_blank" title="Разработано Website96"><?=GetContentSvgIcon('logo')?></a>
                </div>
            </div>
        </div>
    </div>
</footer>




