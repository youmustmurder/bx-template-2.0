<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

global $arCurrentSetting,
       $arFilial;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/script.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');

?>


<div class="header__responsive">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <nav class="col-md col-sm-2 col-3 head-nav">
                <button class="head-nav__button js-init__menu"></button>
                <div class="head-nav__modal" style="display: none;">
                    <div class="container">
                        <div class="head-nav__content">
                            <div class="head-nav__menu menu__catalog">
                                <?$APPLICATION->IncludeFile(
                                    "/include/" . SITE_ID . "/blocks/menu/catalog_top.php",
                                    array(),
                                    array(
                                        "SHOW_BORDER" => false,
                                        "MODE" => "php"
                                    )
                                );?>
                            </div>
                            <div class="head-nav__menu menu__top">
                                <?$APPLICATION->IncludeFile(
                                    "/include/" . SITE_ID . "/blocks/menu/top.php",
                                    array(),
                                    array(
                                        "SHOW_BORDER" => false,
                                        "MODE" => "php"
                                    )
                                );?>
                            </div>
                            <div class="head-nav__links">
                                <a class="nav__link" href="tel:+7 (343) 372-57-75">
                                    <span class="icon__svg icon__phone">
                                        <?=GetContentSvgIcon('phone');?></span>
                                    <span>342                </span>
                                </a>
                                <a class="nav__link" href="/contacts/">
                                    <span class="icon__svg icon__address"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 12 14">
  <defs>
    <style>
      .cls-1 {
    fill: #333;
    fill-rule: evenodd;
      }
    </style>
  </defs>
  <path id="geo" class="cls-1" d="M1267.03,18.215a5.773,5.773,0,0,1,5.72,6.264,6.571,6.571,0,0,1-1.22,3.051,16.534,16.534,0,0,1-4.23,4.142,0.449,0.449,0,0,1-.56.023,15.064,15.064,0,0,1-4.82-5.1,5.6,5.6,0,0,1,3.52-8.106C1265.96,18.346,1266.5,18.3,1267.03,18.215Zm-0.04,12.656c0.17-.13.31-0.232,0.45-0.338a14.635,14.635,0,0,0,3.67-3.918,4.831,4.831,0,0,0-4.78-7.474,4.8,4.8,0,0,0-3.96,6.391C1263.27,27.829,1265.08,29.38,1266.99,30.871ZM1267,32a0.653,0.653,0,0,1-.39-0.129,15.145,15.145,0,0,1-4.89-5.18,5.733,5.733,0,0,1-.23-5.083,5.993,5.993,0,0,1,3.89-3.33,9.419,9.419,0,0,1,1.11-.2c0.17-.022.34-0.046,0.5-0.073l0.02,0h0.02a6.232,6.232,0,0,1,4.46,2.022,5.806,5.806,0,0,1,1.48,4.477,6.632,6.632,0,0,1-1.26,3.151,16.655,16.655,0,0,1-4.28,4.2A0.743,0.743,0,0,1,1267,32Zm0.04-13.568c-0.16.027-.33,0.049-0.49,0.072a8.369,8.369,0,0,0-1.05.189,5.577,5.577,0,0,0-3.61,3.087,5.292,5.292,0,0,0,.22,4.71,14.69,14.69,0,0,0,4.76,5.031,0.224,0.224,0,0,0,.3-0.023,16.374,16.374,0,0,0,4.18-4.088,6.39,6.39,0,0,0,1.19-2.951,5.415,5.415,0,0,0-1.38-4.15A5.781,5.781,0,0,0,1267.04,18.431Zm-0.05,12.713-0.14-.105c-1.94-1.519-3.76-3.077-4.68-5.429a4.788,4.788,0,0,1,.41-4.283,5.047,5.047,0,0,1,3.72-2.4,5.325,5.325,0,0,1,3.93,1.059,5.063,5.063,0,0,1,1.91,3.478,5.117,5.117,0,0,1-.84,3.26,14.471,14.471,0,0,1-3.72,3.977c-0.1.073-.19,0.141-0.29,0.219-0.06.038-.11,0.078-0.17,0.121Zm-0.01-11.825a5.3,5.3,0,0,0-.63.037,4.606,4.606,0,0,0-3.39,2.194,4.368,4.368,0,0,0-.38,3.905c0.86,2.2,2.57,3.694,4.41,5.142l0.03-.02c0.1-.077.19-0.143,0.28-0.213a14,14,0,0,0,3.62-3.859,4.719,4.719,0,0,0,.79-2.995,4.652,4.652,0,0,0-1.76-3.186A4.792,4.792,0,0,0,1266.98,19.319Zm1.44,4.649a1.424,1.424,0,0,1-1.43,1.375A1.39,1.39,0,1,1,1268.42,23.968Zm-1.41,1.592h-0.03a1.652,1.652,0,0,1-1.15-.5,1.528,1.528,0,0,1-.46-1.128A1.634,1.634,0,1,1,1267.01,25.56ZM1267,22.779a1.186,1.186,0,0,0-1.19,1.162,1.123,1.123,0,0,0,.33.822,1.22,1.22,0,0,0,.85.365,1.207,1.207,0,0,0,1.21-1.162h0a1.2,1.2,0,0,0-1.18-1.187H1267Z" transform="translate(-1261 -18)"></path>
</svg>
</span>
                                    <span><span>г. Екатеринбург</span>
<span>ул. Генеральская, д. 3, оф. 206</span>                        </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="col-md-3 col-sm-6 col-6 head-logo d-flex align-items-center">
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
            <div class="col-md-4 col-sm-2 col-3 head-phone d-md-block d-none">
                <div class="row align-items-center">
                    <div class="col-12 head-phone__content">
                        <span class="head-phone__icon">
                            <?=GetContentSvgIcon('phone');?>
                        </span>
                        <?if ($arFilial['PHONE']) {?>
                            <a class="head-phone__value" href="tel:<?=preg_replace('~[^0-9]+~', '', $arFilial['PHONE']);?>"><?=$arFilial['PHONE']?></a>
                        <?}?>
                    </div>
                </div>
            </div>
            <div class="col-sm-auto head-callback d-md-block d-none">
                    <a href="#" class="btn js-init-modal__form btn-primary" data-sign="%3D" data-modal="14">Заказать звонок</a>
            </div>

            <div class="col-sm-2 col-3 head-modal__icon d-md-none">
                <a href="#" class="btn js-init-modal__form btn__default btn__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: #ff223d;
                                    fill-rule: evenodd;
                                }
                            </style>
                        </defs>
                        <path id="phone" class="cls-1" d="M1159.5,98.6a8.638,8.638,0,0,0,3.98,3.948,12.181,12.181,0,0,1,1.07-1.169,0.932,0.932,0,0,1,1.43-.1c0.79,0.484,1.58.989,2.39,1.446a1.158,1.158,0,0,1,.62,1.038,3.074,3.074,0,0,1-2.53,3.11,5.893,5.893,0,0,1-3.51-.352,12.653,12.653,0,0,1-7.64-8.121,4.611,4.611,0,0,1,.31-4,2.862,2.862,0,0,1,2.79-1.374,1.025,1.025,0,0,1,.78.531c0.52,0.877,1.05,1.749,1.6,2.6a0.785,0.785,0,0,1,0,1.028C1160.4,97.66,1159.97,98.09,1159.5,98.6Zm0.19-1.8c-0.52-.836-0.97-1.53-1.38-2.246a0.457,0.457,0,0,0-.64-0.23,1.931,1.931,0,0,0-1.27,1.5,4.914,4.914,0,0,0,.35,2.956,11.844,11.844,0,0,0,5.71,6.152,6.225,6.225,0,0,0,3.16.785,2.163,2.163,0,0,0,2.07-1.356,0.506,0.506,0,0,0-.25-0.712c-0.54-.294-1.06-0.634-1.59-0.955-0.59-.362-0.71-0.334-1.06.288a1.355,1.355,0,0,0-.16.377c-0.21.685-.47,0.867-1.12,0.551a14.306,14.306,0,0,1-2.43-1.422,8.614,8.614,0,0,1-3.03-4.136,0.658,0.658,0,0,1,.47-0.925A11.334,11.334,0,0,0,1159.69,96.793Z" transform="translate(-1155 -93)"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>