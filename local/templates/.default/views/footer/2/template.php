<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

global $arFilial;

dump($arFilial);

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
                <?if($arParams['SETTING']['TEMPLATE_TYPE'] != 'COMPANY'){?>
                    <div class="footer__nav footer-nav col-lg-2 col-md-4">
                        <div class="footer-nav__title">Каталог продукции</div>
                        <div class="footer-nav__catalog">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                ".default",
                                array(
                                    "ALLOW_MULTI_SELECT" => "N",
                                    "CHILD_MENU_TYPE" => "catalog_top",
                                    "DELAY" => "N",
                                    "MAX_LEVEL" => "1",
                                    "MENU_CACHE_GET_VARS" => array(
                                    ),
                                    "MENU_CACHE_TIME" => "3600",
                                    "MENU_CACHE_TYPE" => "Y",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "ROOT_MENU_TYPE" => "catalog_top",
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
                <div class="footer__nav footer-nav footer-nav_two-columns col-lg-4 col-md-8">
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
                <div class="footer__info footer-info col-lg-5 col-md-12">
                    <?if ($arFilial['PHONE']) {?>
                        <div class="footer__contact footer-contact">
                            <div class="footer-contact__content">
                                <div class="footer-contact__name"><?=Loc::getMessage('FOOTER_2_PHONE_TITLE')?></div>
                                <a class="footer-contact__link"
                                   href="tel:<?=preg_replace('~[^0-9]+~', '', $arFilial['PHONE']);?>"><?=$arFilial['PHONE']?></a>
                            </div>
                            <a href="#" class="btn btn_min btn_primary btn_round footer__link-callback js-init-modal__form" data-sign="WVRveE5EcDdjem94TURvaVEwRkRTRVZmVkVsTlJTSTdjem8wT2lJek5qQXdJanR6T2pFd09pSkRRVU5JUlY5VVdWQkZJanR6T2pFNklrRWlPM002TVRNNklrWlBVazFmUWxST1gwOVFSVTRpTzNNNk1qazZJdENYMExEUXV0Q3cwTGZRc05HQzBZd2cwTGZRc3RDKzBMM1F2dEM2SWp0ek9qRTFPaUpHVDFKTlgwSlVUbDlUVlVKTlNWUWlPM002TVRnNkl0Q2UwWUxRdjlHQTBMRFFzdEM0MFlMUmpDSTdjem94TXpvaVJrOVNUVjlDVkU1ZlZGbFFSU0k3Y3pveU1Ub2lZblJ1TFdSbFptRjFiSFFnWW5SdUxYZG9hWFJsSWp0ek9qRXhPaUpHVDFKTlgwWkpSVXhFVXlJN1lUb3lPbnRwT2pBN2N6b3lPaUl5TkNJN2FUb3hPM002TWpvaU1qVWlPMzF6T2pFMk9pSkdUMUpOWDFCUFRFbFVTVU5mVlZKTUlqdHpPams2SWk5d2IyeHBkR2xqTHlJN2N6b3hOam9pUms5U1RWOVFVazlFVlVOVVgwRkVSQ0k3Y3pveE9pSk9JanR6T2pFMU9pSkdUMUpOWDFCU1QwUlZRMVJmU1VRaU8zTTZNRG9pSWp0ek9qSXdPaUpHVDFKTlgxSkZVVlZKVWtWRVgwWkpSVXhFVXlJN1lUb3lPbnRwT2pBN2N6b3lPaUl5TkNJN2FUb3hPM002TWpvaU1qVWlPMzF6T2pFd09pSkdUMUpOWDFSSlZFeEZJanR6T2pJNU9pTFFudEdCMFlMUXNOQ3kwWXpSZ3RDMUlOQzMwTERSajlDeTBMclJneUk3Y3pvNU9pSkpRa3hQUTB0ZlNVUWlPM002TWpvaU1UUWlPM002TVRFNklrbENURTlEUzE5VVdWQkZJanR6T2pVNkltWnZjbTF6SWp0ek9qRTRPaUpEVDAxUVQwNUZUbFJmVkVWTlVFeEJWRVVpTzNNNk9Eb2lMbVJsWm1GMWJIUWlPMzA9Ljg4Y2VmMTc0MjNlZTA0NWNkZDYwNWI3ZmIyZDhhMmE4M2M2NTQ4OTFjY2NlN2U1YjczYWMzZTM1ZWI4MTU4NjE%3D" data-modal="14">Заказать звонок</a>
                        </div>
                    <?}?>
                    <?if ($arFilial['EMAIL']) {?>
                        <div class="footer__contact footer-contact">
                            <div class="footer-contact__content">
                                <div class="footer-contact__name"><?=Loc::getMessage('FOOTER_2_EMAIL_TITLE')?></div>
                                <a class="footer-contact__link" href="mailto:<?=$arFilial['EMAIL']?>"><?=$arFilial['EMAIL']?></a>
                            </div>
                        </div>
                    <?}?>
                    <?if ($arFilial['CITY'] || $arFilial['ADDRESS']) {?>
                        <div class="footer__contact footer-contact">
                            <div class="footer-contact__content">
                                <div class="footer-contact__name"><?=Loc::getMessage('FOOTER_2_ADDRESS_TITLE')?></div>
                                <a class="footer-contact__link" href="<?=SITE_DIR?>contacts/">
                                    <span><?=$arFilial['CITY']?></span>
                                    <span><?=$arFilial['ADDRESS']?></span>
                                </a>
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
                <div class="col-12 col-md-4 footer__copyright">
                    <?$APPLICATION->IncludeFile(
                        "/include/".SITE_ID."/copyright.php",
                        array(),
                        array(
                            "SHOW_BORDER" => true,
                            "MODE" => "text"
                        ));
                    ?>
                </div>
                <div class="col-12 col-md-4 footer__socials footer-socials">
                    <a href="#" class="footer-socials__item">
                        <?=GetContentSvgIcon('vk');?>
                    </a>
                    <a href="#" class="footer-socials__item">
                        <?=GetContentSvgIcon('fb');?>
                    </a>
                    <a href="#" class="footer-socials__item">
                        <?=GetContentSvgIcon('ig');?>
                    </a>
                    <a href="#" class="footer-socials__item">
                        <?=GetContentSvgIcon('tw');?>
                    </a>
                </div>
                <div class="col-12 col-md-4 footer__developer">
                    <a rel="nofollow" href="https://website96.ru/" target="_blank" title="Разработано Website96"><?=GetContentSvgIcon('logo')?></a>
                </div>
            </div>
        </div>
    </div>
</footer>