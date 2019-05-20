<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

global $arCurrentSetting,
       $arFilial;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/script.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');
?>
<header class="header">
    <nav class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="header-top__navbar">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            ".default",
                            array(
                                "COMPONENT_TEMPLATE" => ".default",
                                "ROOT_MENU_TYPE" => "top",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "MENU_CACHE_GET_VARS" => array(
                                ),
                                "MAX_LEVEL" => "2",
                                "CHILD_MENU_TYPE" => "left",
                                "USE_EXT" => "Y",
                                "DELAY" => "N",
                                "ALLOW_MULTI_SELECT" => "N"
                            ),
                            false
                        );?>
                    </div>
                </div>
                <address class="col-lg-5 header__address d-flex align-items-center justify-content-end">
                    <a href="/contacts/" class="address__link d-flex">
                        <span class="icon__geo"><?=GetContentSvgIcon('address');?></span>
                        <?if ($arFilial['ADDRESS']) {?>
                            <span class="address-value">
                                <?=$arFilial['ADDRESS']?>
                            </span>
                        <?}?>
                    </a>
                </address>
            </div>
        </div>
    </nav>
    <div class="header-middle">
        <div class="container">
                    <a href="<?=SITE_DIR?>" class="d-flex align-items-center">
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
                <div class="header-search">
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
                        <input class="inp inp-search" name="q" id="qplSKIW" autocomplete="off" placeholder="Поиск по сайту" size="20">
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
                    </form>                </div>
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
                                "FORM_BTN_TYPE" => "btn--default",
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
            <div class="row">
				<div class="col d-flex justify-content-between align-items-center">
            </div>
        </div>
    </div>
    <nav class="header-bottom">
        <div class="container">
            <div class="row row-line">
                <div class="catalog__menu">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        ".default",
                        array(
                            "COMPONENT_TEMPLATE" => ".default",
                            "ROOT_MENU_TYPE" => "catalog_top",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MAX_LEVEL" => "2",
                            "CHILD_MENU_TYPE" => "left",
                            "USE_EXT" => "Y",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "N"
                        ),
                        false
                    );?>
                </div>
            </div>
        </div>
    </nav>
</header>