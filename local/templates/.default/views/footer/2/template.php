<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

global $arCurrentSetting;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/script.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');

?>
<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row justify-content-between align-items-start">
                <?if($arParams['SETTING']['TEMPLATE_TYPE'] != 'COMPANY'){?>
                    <div class="footer-nav col-lg-2 col-md-3 col-sm-6">
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
                <div class="footer-nav two-columns <?=$arParams['SETTING']['TEMPLATE_TYPE'] != 'COMPANY' ? 'col-lg-4 col-md-5 col-sm-6' : 'col-lg-8 col-md-8 col-sm-12'?>">
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
                <div class="footer-info <?=$arParams['SETTING']['TEMPLATE_TYPE'] != 'COMPANY' ? 'col-lg-5 col-md-4 col-sm-12' : 'col-lg-4 col-md-4 col-sm-12'?>">
                    <div class="footer-contact">
                        <div class="footer-contact__content">
                            <div class="footer-contact__name"><?$APPLICATION->IncludeFile("/include/".SITE_ID."/contact/phone__title.php",[],["SHOW_BORDER"=>true,"MODE"=>"text"]);?></div>
                            <a class="footer-contact__link"
                               href="tel:<?$APPLICATION->IncludeFile("/include/".SITE_ID."/contact/phone.php", [],["SHOW_BORDER" => false,"MODE" => "text"]);?>">
                                <?$APPLICATION->IncludeFile("/include/".SITE_ID."/contact/phone.php", [],["SHOW_BORDER"=>true, "MODE" => "text"]);?></a>
                        </div>
                        <a href="#" class="btn js-init-modal__form btn-default btn-white" data-sign="WVRveE5EcDdjem94TURvaVEwRkRTRVZmVkVsTlJTSTdjem8wT2lJek5qQXdJanR6T2pFd09pSkRRVU5JUlY5VVdWQkZJanR6T2pFNklrRWlPM002TVRNNklrWlBVazFmUWxST1gwOVFSVTRpTzNNNk1qazZJdENYMExEUXV0Q3cwTGZRc05HQzBZd2cwTGZRc3RDKzBMM1F2dEM2SWp0ek9qRTFPaUpHVDFKTlgwSlVUbDlUVlVKTlNWUWlPM002TVRnNkl0Q2UwWUxRdjlHQTBMRFFzdEM0MFlMUmpDSTdjem94TXpvaVJrOVNUVjlDVkU1ZlZGbFFSU0k3Y3pveU1Ub2lZblJ1TFdSbFptRjFiSFFnWW5SdUxYZG9hWFJsSWp0ek9qRXhPaUpHVDFKTlgwWkpSVXhFVXlJN1lUb3lPbnRwT2pBN2N6b3lPaUl5TkNJN2FUb3hPM002TWpvaU1qVWlPMzF6T2pFMk9pSkdUMUpOWDFCUFRFbFVTVU5mVlZKTUlqdHpPams2SWk5d2IyeHBkR2xqTHlJN2N6b3hOam9pUms5U1RWOVFVazlFVlVOVVgwRkVSQ0k3Y3pveE9pSk9JanR6T2pFMU9pSkdUMUpOWDFCU1QwUlZRMVJmU1VRaU8zTTZNRG9pSWp0ek9qSXdPaUpHVDFKTlgxSkZVVlZKVWtWRVgwWkpSVXhFVXlJN1lUb3lPbnRwT2pBN2N6b3lPaUl5TkNJN2FUb3hPM002TWpvaU1qVWlPMzF6T2pFd09pSkdUMUpOWDFSSlZFeEZJanR6T2pJNU9pTFFudEdCMFlMUXNOQ3kwWXpSZ3RDMUlOQzMwTERSajlDeTBMclJneUk3Y3pvNU9pSkpRa3hQUTB0ZlNVUWlPM002TWpvaU1UUWlPM002TVRFNklrbENURTlEUzE5VVdWQkZJanR6T2pVNkltWnZjbTF6SWp0ek9qRTRPaUpEVDAxUVQwNUZUbFJmVkVWTlVFeEJWRVVpTzNNNk9Eb2lMbVJsWm1GMWJIUWlPMzA9Ljg4Y2VmMTc0MjNlZTA0NWNkZDYwNWI3ZmIyZDhhMmE4M2M2NTQ4OTFjY2NlN2U1YjczYWMzZTM1ZWI4MTU4NjE%3D" data-modal="14">Заказать звонок</a>
                    </div>
                    <div class="footer-contact">
                        <div class="footer-contact__content">
                            <div class="footer-contact__name"><?$APPLICATION->IncludeFile("/include/".SITE_ID."/contact/email__title.php",[],["SHOW_BORDER"=>true,"MODE"=>"text"]);?></div>
                            <a class="footer-contact__link"
                               href="mailto:<?$APPLICATION->IncludeFile("/include/".SITE_ID."/contact/email.php",[],["SHOW_BORDER"=>false,"MODE"=>"text"]);?>">
                                <?$APPLICATION->IncludeFile("/include/".SITE_ID."/contact/email.php",[],["SHOW_BORDER"=>true,"MODE"=>"text"]);?></a>
                        </div>
                    </div>
                    <div class="footer-contact">
                        <div class="footer-contact__content">
                            <div class="footer-contact__name"><?$APPLICATION->IncludeFile("/include/".SITE_ID."/contact/address__title.php",[],["SHOW_BORDER"=>true,"MODE"=>"text"]);?></div>
                            <a class="footer-contact__link"
                               href="<?=SITE_DIR?>contacts/"><?$APPLICATION->IncludeFile("/include/".SITE_ID."/contact/address.php", [],["SHOW_BORDER"=>true,"MODE" =>"text"]);?></a>
                        </div>
                    </div>
                    <div class="col footer-search footer-search">
                        <form class="search__form" method="get" action="/search/">
    <span class="icon__search"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
  <defs>
    <style>
      .cls-1 {
          fill: #aaa9ad;
          fill-rule: evenodd;
      }
    </style>
  </defs>
  <path id="search" class="cls-1" d="M641.35,102.389l-2.861,2.865c-0.1.1-.194,0.192-0.289,0.289a0.536,0.536,0,1,1-.753-0.734c0.723-.719,1.442-1.444,2.167-2.16,0.326-.323.663-0.633,1.027-0.979a5.738,5.738,0,0,1-1.125-5.246,5.566,5.566,0,0,1,2.338-3.232,5.743,5.743,0,0,1,7.551,8.517A5.817,5.817,0,0,1,641.35,102.389Zm3.69,0.256A4.7,4.7,0,1,0,640.355,98,4.7,4.7,0,0,0,645.04,102.645ZM637.725,106h0a0.7,0.7,0,0,1-.51-0.245,0.717,0.717,0,0,1,.092-1.089l0.868-.867q0.648-.65,1.3-1.3c0.225-.222.452-0.436,0.692-0.661l0.206-.194a5.926,5.926,0,0,1-1.049-5.277,5.761,5.761,0,0,1,2.421-3.349,5.947,5.947,0,0,1,7.82,8.818,5.983,5.983,0,0,1-8.189.817l-2.84,2.843-0.185.185A0.885,0.885,0,0,1,637.725,106Zm7.328-13.592a5.5,5.5,0,0,0-3.084.953,5.365,5.365,0,0,0-2.256,3.117,5.5,5.5,0,0,0,1.09,5.069l0.112,0.146-0.133.126-0.34.321c-0.238.224-.464,0.436-0.684,0.654q-0.651.645-1.3,1.293-0.433.435-.868,0.868c-0.3.3-.159,0.441-0.085,0.518a0.313,0.313,0,0,0,.217.119h0a0.523,0.523,0,0,0,.329-0.191c0.062-.064.126-0.126,0.189-0.188l0.1-.1,2.987-2.992,0.142,0.107A5.555,5.555,0,1,0,645.053,92.407Zm-0.024,10.442a4.9,4.9,0,0,1,.035-9.8h0.028a4.9,4.9,0,0,1,3.453,8.349,4.922,4.922,0,0,1-3.5,1.452h-0.011Zm0.063-9.393h-0.026A4.492,4.492,0,0,0,640.56,98a4.4,4.4,0,0,0,1.311,3.137,4.45,4.45,0,0,0,3.158,1.308h0.01a4.528,4.528,0,0,0,3.217-1.332,4.458,4.458,0,0,0-.049-6.347A4.421,4.421,0,0,0,645.092,93.456Z" transform="translate(-637 -92)"></path>
</svg>
</span>
                            <input class="inp inp-search" name="q" id="qT1ptvd" autocomplete="off" placeholder="Поиск по сайту" size="20">
                            <button class="btn-search" type="submit" title="Поиск">
                                <svg xmlns="http://www.w3.org/2000/svg" width="8.44" height="14.438" viewBox="0 0 8.44 14.438">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill: #fff;
                                                fill-rule: evenodd;
                                            }
                                        </style>
                                    </defs>
                                    <path id="arrow_small_right" class="cls-1" d="M1046.71,99.707l-7,7-1.42-1.415,5.8-5.792-5.8-5.793,1.42-1.414,7,7-0.21.207Z" transform="translate(-1038.28 -92.281)"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row justify-content-sm-between align-items-center">
                <div class="col-12 col-md-4 copyright">
                    <?$APPLICATION->IncludeFile("/include/".SITE_ID."/copyright.php", [], ["SHOW_BORDER" => true, "MODE" => "text"]);?>
                </div>
                <div class="col-12 col-md-4 socicons">
                    <a href="#">
                        <?=GetContentSvgIcon('vk');?>
                    </a>
                    <a href="#">
                        <?=GetContentSvgIcon('fb');?>
                    </a>
                    <a href="#">
                        <?=GetContentSvgIcon('ig');?>
                    </a>
                    <a href="#">
                        <?=GetContentSvgIcon('tw');?>
                    </a>
                </div>
                <div class="col-12 col-md-4 developer">
                    <a rel="nofollow" href="http://website96.ru/" target="_blank" title="Разработано Website96"><?=GetContentSvgIcon('website96')?></a>
                </div>
            </div>
        </div>
    </div>
</footer>