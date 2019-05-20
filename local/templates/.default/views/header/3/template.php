<?php

global $arCurrentSetting,
       $arFilial;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/script.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');

?>
<header class="header">
    <nav class="header__top">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="header__block header__menu">
                    <button class="header__hamburger">
                        <span></span>
                    </button>
                    <div class="head-nav__modal--desktop" style="display: none;">
                        <div class="container">
                            <div class="head-nav__content head-nav__content--desktop">
                                <?$APPLICATION->IncludeFile(
                                    "/include/" . SITE_ID . "/blocks/menu/catalog_top.php",
                                    array(),
                                    array(
                                        "SHOW_BORDER" => false,
                                        "MODE" => "php"
                                    )
                                );?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center header__logo header-logo--desc">
                    <a href="<?=SITE_DIR?>">
                        <?$APPLICATION->IncludeFile(
                            "/include/" . SITE_ID . "/logo.php",
                            array(),
                            array(
                                "SHOW_BORDER" => true,
                                "MODE" => "html"
                            )
                        );?>
                    </a>
                    <div class="header__desc">
                        <p><?$APPLICATION->IncludeFile(
                                "/include/" . SITE_ID . "/slogan.php",
                                array(),
                                array(
                                    "SHOW_BORDER" => true,
                                    "MODE" => "text"
                                )
                            );?></p>
                    </div>
                </div>
                
                <div class="header__block header__address">
                    <?if ($arFilial['CITY'] || $arFilial['ADDRESS']) {?>
                        <div class="header__pic">
                            <?=GetContentSvgIcon('address');?>
                        </div>
                        <div class="header__text"  id="header-text">
                            <?=$arFilial['CITY'] ? '<span>' . $arFilial['CITY'] . '</span>' : ''?>
                            <?=$arFilial['ADDRESS'] ? '<span>' . $arFilial['ADDRESS'] . '</span>' : ''?>
                        </div>
                    <?}?>
                </div>
                
                <div class="header__block header__phone">
                    <?if ($arFilial['PHONE']) {?>
                        <div class="header__pic">
                            <?=GetContentSvgIcon('phone');?>
                        </div>
                        <div class="header__text">
                            <a class="header__number"
                               href="tel:<?=preg_replace('~[^0-9]+~', '', $arFilial['PHONE']);?>"><?=$arFilial['PHONE']?></a>
                            <?$APPLICATION->IncludeComponent(
                                "website96:web.forms",
                                ".default",
                                array(
                                    "COMPONENT_TEMPLATE" => ".default",
                                    "IBLOCK_TYPE" => "forms",
                                    "IBLOCK_ID" => "14",
                                    "FORM_PRODUCT_ADD" => "N",
                                    "FORM_BTN_TYPE" => "btn__link",
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
                    <?}?>
                </div>
                
                <div class="header__block header__search header__search--desktop">
                    <div class="header__loupe">
                        <button class="header__loupe-pic">
                            <?=GetContentSvgIcon('search-big');?>
                        </button>
                        <button class="header__loupe-crest">
                            <?=GetContentSvgIcon('crest-big');?>
                        </button>
                    </div>
                </div>
                <div class="header__search-panel header__search-panel">
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
    </nav>
</header>