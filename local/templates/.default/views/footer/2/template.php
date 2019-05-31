<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

global $arCurrentSetting;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/script.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');

?>
<footer class="footer">
    <div class="footer__top footer-top">
        <div class="container">
            <div class="row justify-content-between align-items-start">
                <?if($arParams['SETTING']['TEMPLATE_TYPE'] != 'COMPANY'){?>
                    <div class="footer__nav footer-nav col-lg-2 col-md-3 col-sm-6">
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
                <div class="footer__nav footer-nav footer-nav_two-columns <?=$arParams['SETTING']['TEMPLATE_TYPE'] != 'COMPANY' ? 'col-lg-4 col-md-5 col-sm-6' : 'col-lg-8 col-md-8 col-sm-12'?>">
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
                <div class="footer__info footer-info <?=$arParams['SETTING']['TEMPLATE_TYPE'] != 'COMPANY' ? 'col-lg-5 col-md-4 col-sm-12' : 'col-lg-4 col-md-4 col-sm-12'?>">
                    <div class="footer__contact footer-contact">
                        <div class="footer-contact__content">
                            <div class="footer-contact__name"><?$APPLICATION->IncludeFile("/include/".SITE_ID."/contact/phone__title.php",[],["SHOW_BORDER"=>true,"MODE"=>"text"]);?></div>
                            <a class="footer-contact__link" href="tel:<?$APPLICATION->IncludeFile("/include/".SITE_ID."/contact/phone.php", [],["SHOW_BORDER" => false,"MODE" => "text"]);?>"><?$APPLICATION->IncludeFile("/include/".SITE_ID."/contact/phone.php", [],["SHOW_BORDER"=>true, "MODE" => "text"]);?></a>
                        </div>
                        <a href="#" class="btn btn_min btn_primary btn_round js-init-modal__form" data-sign="WVRveE5EcDdjem94TURvaVEwRkRTRVZmVkVsTlJTSTdjem8wT2lJek5qQXdJanR6T2pFd09pSkRRVU5JUlY5VVdWQkZJanR6T2pFNklrRWlPM002TVRNNklrWlBVazFmUWxST1gwOVFSVTRpTzNNNk1qazZJdENYMExEUXV0Q3cwTGZRc05HQzBZd2cwTGZRc3RDKzBMM1F2dEM2SWp0ek9qRTFPaUpHVDFKTlgwSlVUbDlUVlVKTlNWUWlPM002TVRnNkl0Q2UwWUxRdjlHQTBMRFFzdEM0MFlMUmpDSTdjem94TXpvaVJrOVNUVjlDVkU1ZlZGbFFSU0k3Y3pveU1Ub2lZblJ1TFdSbFptRjFiSFFnWW5SdUxYZG9hWFJsSWp0ek9qRXhPaUpHVDFKTlgwWkpSVXhFVXlJN1lUb3lPbnRwT2pBN2N6b3lPaUl5TkNJN2FUb3hPM002TWpvaU1qVWlPMzF6T2pFMk9pSkdUMUpOWDFCUFRFbFVTVU5mVlZKTUlqdHpPams2SWk5d2IyeHBkR2xqTHlJN2N6b3hOam9pUms5U1RWOVFVazlFVlVOVVgwRkVSQ0k3Y3pveE9pSk9JanR6T2pFMU9pSkdUMUpOWDFCU1QwUlZRMVJmU1VRaU8zTTZNRG9pSWp0ek9qSXdPaUpHVDFKTlgxSkZVVlZKVWtWRVgwWkpSVXhFVXlJN1lUb3lPbnRwT2pBN2N6b3lPaUl5TkNJN2FUb3hPM002TWpvaU1qVWlPMzF6T2pFd09pSkdUMUpOWDFSSlZFeEZJanR6T2pJNU9pTFFudEdCMFlMUXNOQ3kwWXpSZ3RDMUlOQzMwTERSajlDeTBMclJneUk3Y3pvNU9pSkpRa3hQUTB0ZlNVUWlPM002TWpvaU1UUWlPM002TVRFNklrbENURTlEUzE5VVdWQkZJanR6T2pVNkltWnZjbTF6SWp0ek9qRTRPaUpEVDAxUVQwNUZUbFJmVkVWTlVFeEJWRVVpTzNNNk9Eb2lMbVJsWm1GMWJIUWlPMzA9Ljg4Y2VmMTc0MjNlZTA0NWNkZDYwNWI3ZmIyZDhhMmE4M2M2NTQ4OTFjY2NlN2U1YjczYWMzZTM1ZWI4MTU4NjE%3D" data-modal="14">Заказать звонок</a>
                    </div>
                    <div class="footer__contact footer-contact">
                        <div class="footer-contact__content">
                            <div class="footer-contact__name"><?$APPLICATION->IncludeFile("/include/".SITE_ID."/contact/email__title.php",[],["SHOW_BORDER"=>true,"MODE"=>"text"]);?></div>
                            <a class="footer-contact__link" href="mailto:<?$APPLICATION->IncludeFile("/include/".SITE_ID."/contact/email.php",[],["SHOW_BORDER"=>false,"MODE"=>"text"]);?>"> <?$APPLICATION->IncludeFile("/include/".SITE_ID."/contact/email.php",[],["SHOW_BORDER"=>true,"MODE"=>"text"]);?></a>
                        </div>
                    </div>
                    <div class="footer__contact footer-contact">
                        <div class="footer-contact__content">
                            <div class="footer-contact__name"><?$APPLICATION->IncludeFile("/include/".SITE_ID."/contact/address__title.php",[],["SHOW_BORDER"=>true,"MODE"=>"text"]);?></div>
                            <a class="footer-contact__link" href="<?=SITE_DIR?>contacts/"><?$APPLICATION->IncludeFile("/include/".SITE_ID."/contact/address.php", [],["SHOW_BORDER"=>true,"MODE" =>"text"]);?></a>
                        </div>
                    </div>
                    <div class="col footer__search footer-search">
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
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom footer-bottom">
        <div class="container">
            <div class="row footer__bottom-wrap">
                <div class="col-12 col-md-4 footer__copyright">
                    <?$APPLICATION->IncludeFile("/include/".SITE_ID."/copyright.php", [], ["SHOW_BORDER" => true, "MODE" => "text"]);?>
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
                    <a rel="nofollow" href="http://website96.ru/" target="_blank" title="Разработано Website96"><?=GetContentSvgIcon('logo')?></a>
                </div>
            </div>
        </div>
    </div>
</footer>