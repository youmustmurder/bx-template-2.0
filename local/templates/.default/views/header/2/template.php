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
                <div class="d-flex align-items-center header__logo header__logo-desc">
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
                <div class="header-search">
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
                <div class="header__block header__contacts">
                    <div class="header__phone">
                        <?if ($arFilial['PHONE']) {?>
                            <?=GetContentSvgIcon('phone');?>
                            <a href="tel:<?=preg_replace('~[^0-9]+~', '', $arFilial['PHONE']);?>"><?=$arFilial['PHONE']?></a>
                        <?}?>
                    </div>
                    <div class="header__call">
                        <?$APPLICATION->IncludeComponent(
                            "website96:web.forms",
                            ".default",
                            array(
                                "COMPONENT_TEMPLATE" => ".default",
                                "IBLOCK_TYPE" => "forms",
                                "IBLOCK_ID" => "14",
                                "FORM_PRODUCT_ADD" => "N",
                                "FORM_BTN_TYPE" => "btn--primary",
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
            </div>
        </div>
    </nav>
    <nav class="header__bottom">
        <div class="container">
            <div class="row row-line">
                <div class="col-12">
                    <div class="header__list">
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
    </nav>
</header>