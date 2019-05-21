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
                                <?if ($arFilial['PHONE']) {?>
                                    <a class="nav__link" href="tel:<?=preg_replace('~[^0-9]+~', '', $arFilial['PHONE']);?>">
                                        <span class="icon__svg icon__phone">
                                            <?=GetContentSvgIcon('phone');?>
                                        </span>
                                        <span><?=$arFilial['PHONE']?></span>
                                    </a>
                                <?}?>
                                <?if ($arFilial['CITY'] || $arFilial['ADDRESS']) {?>
                                    <a class="nav__link" href="/contacts/">
                                        <span class="icon__svg icon__address">
                                            <?=GetContentSvgIcon('address');?>
                                        </span>
                                        <span>
                                            <?=$arFilial['CITY'] ? '<span>' . $arFilial['CITY'] . '</span>' : ''?>
                                            <?=$arFilial['ADDRESS'] ? '<span>' . $arFilial['ADDRESS'] . '</span>' : ''?>
                                        </span>
                                    </a>
                                <?}?>
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