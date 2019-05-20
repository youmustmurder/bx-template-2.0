<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

global $arCurrentSetting,
       $arFilial;

use Bitrix\Main\Page\Asset,
    Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/script.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');
?>
<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row justify-content-between align-items-start">
                <?if ($arCurrentSetting['TEMPLATE_TYPE'] != 'COMPANY'){?>
                    <div class="footer-nav col-lg-3 col-md-4 col-sm-6">
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
                                    "COMPOSITE_FRAME_TYPE" => "AUTO"
                                ),
                                $component
                            );?>
                        </div>
                    </div>
                <?}?>
                <div class="footer-nav two-columns <?=$arCurrentSetting['TEMPLATE_TYPE'] != 'COMPANY' ? 'col-lg-5 col-md-4 col-sm-6' : 'col-lg-8 col-md-8 col-sm-12'?>">
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
                <div class="<?=$arCurrentSetting['TEMPLATE_TYPE'] != 'COMPANY' ? 'col-lg-3 col-md-4 col-sm-12' : 'col-lg-4 col-md-4 col-sm-12'?>">
                    <?if ($arFilial['PHONE']) {?>
                        <div class="footer-contact">
                            <div class="col-2 footer-contact__icon"><?=GetContentSvgIcon('phone');?></div>
                            <div class="footer-contact__content">
                                <div class="footer-contact__name"><?=Loc::getMessage('PHONE_TITLE')?></div>
                                <a class="footer-contact__link"
                                   href="tel:<?=preg_replace('~[^0-9]+~', '', $arFilial['PHONE']);?>"><?=$arFilial['PHONE']?></a>
                            </div>
                        </div>
                    <?}?>
                    <?if ($arFilial['FULL_ADDRESS'] || $arFilial['ADDRESS']) {?>
                        <div class="footer-contact">
                            <div class="col-2 footer-contact__icon"><?=GetContentSvgIcon('address');?></div>
                            <div class="footer-contact__content">
                                <div class="footer-contact__name"><?=Loc::getMessage('ADDRESS_TITLE')?></div>
                                <a class="footer-contact__link"
                                   href="<?=SITE_DIR?>contacts/"><?=$arFilial['FULL_ADDRESS'] ?: $arFilial['ADDRESS']?></a>
                            </div>
                        </div>
                    <?}?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row justify-content-sm-between align-items-center">
                <div class="col-auto copyright">
                    <?$APPLICATION->IncludeFile(
                        "/include/" . SITE_ID . "/copyright.php",
                        array(),
                        array(
                            "SHOW_BORDER" => true,
                            "MODE" => "text"
                        )
                    );?>
                </div>
                <div class="col-auto developer">
                    <a rel="nofollow" href="http://website96.ru/" target="_blank" title="Разработано Website96"><?=GetContentSvgIcon('website96')?></a>
                </div>
            </div>
        </div>
    </div>
</footer>




