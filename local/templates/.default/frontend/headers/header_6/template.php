<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
\Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/views/modules/header/' . $arParams['SETTING']['HEADER'] . '/style.css');
?>
<header class="header">
    <nav class="header__top">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-auto header__block header__menu">
                    <button class="js-init__menu--desktop header__hamburger">
                        <span></span>
                    </button>
                    <div class="head-nav__modal--desktop" style="display: none;">
                        <div class="container">
                            <div class="head-nav__content head-nav__content--desktop">
                                <div class="head-nav__col">
                                    <div class="head-nav__category-name">Электроника</div>
                                    <ul class="head-nav__category-list">
                                        <li><a href="#">Мебель</a></li>
                                        <li><a href="#">Одежда</a></li>
                                        <li><a href="#">Красота и здоровье</a></li>
                                        <li><a href="#">Спорт и туризм</a></li>
                                        <li><a href="#">Услуги</a></li>
                                    </ul>
                                </div>
                                <div class="head-nav__col">
                                    <div class="head-nav__category-name">Электроника</div>
                                    <ul class="head-nav__category-list">
                                        <li><a href="#">Мебель</a></li>
                                        <li><a href="#">Одежда</a></li>
                                        <li><a href="#">Красота и здоровье</a></li>
                                        <li><a href="#">Спорт и туризм</a></li>
                                        <li><a href="#">Услуги</a></li>
                                    </ul>
                                </div>
                                <div class="head-nav__col">
                                    <div class="head-nav__category-name">Электроника</div>
                                    <ul class="head-nav__category-list">
                                        <li><a href="#">Мебель</a></li>
                                        <li><a href="#">Одежда</a></li>
                                        <li><a href="#">Красота и здоровье</a></li>
                                        <li><a href="#">Спорт и туризм</a></li>
                                        <li><a href="#">Услуги</a></li>
                                    </ul>
                                </div>
                                <div class="head-nav__col">
                                    <div class="head-nav__category-name">Электроника</div>
                                    <ul class="head-nav__category-list">
                                        <li><a href="#">Мебель</a></li>
                                        <li><a href="#">Одежда</a></li>
                                        <li><a href="#">Красота и здоровье</a></li>
                                        <li><a href="#">Спорт и туризм</a></li>
                                        <li><a href="#">Услуги</a></li>
                                    </ul>
                                </div>
                                <div class="head-nav__col">
                                    <div class="head-nav__category-name">Электроника</div>
                                    <ul class="head-nav__category-list">
                                        <li><a href="#">Мебель</a></li>
                                        <li><a href="#">Одежда</a></li>
                                        <li><a href="#">Красота и здоровье</a></li>
                                        <li><a href="#">Спорт и туризм</a></li>
                                        <li><a href="#">Услуги</a></li>
                                    </ul>
                                </div>
                                <div class="head-nav__col">
                                    <div class="head-nav__category-name">Электроника</div>
                                    <ul class="head-nav__category-list">
                                        <li><a href="#">Мебель</a></li>
                                        <li><a href="#">Одежда</a></li>
                                        <li><a href="#">Красота и здоровье</a></li>
                                        <li><a href="#">Спорт и туризм</a></li>
                                        <li><a href="#">Услуги</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-auto header__block header__phone">
                    <div class="header__pic">
                        <?=GetContentSvgIcon('phone')?>
                    </div>
                    <div class="header__text">
                        <a class="header__number" href="tel:<?$APPLICATION->IncludeFile(
                            "include/".SITE_ID."/contact/phone.php",
                            array(), array(
                                "SHOW_BORDER" => false,
                                "MODE" => "text"
                            )
                        );?>"><?$APPLICATION->IncludeFile(
                                "include/".SITE_ID."/contact/phone.php",
                                array(), array(
                                    "SHOW_BORDER" => true,
                                    "MODE" => "text"
                                )
                            );?></a>
                        <?$APPLICATION->IncludeComponent(
                            "website96:forms",
                            ".default",
                            array(
                                "CACHE_TIME" => "3600",
                                "CACHE_TYPE" => "A",
                                "FORM_BTN_OPEN" => "Заказать звонок",
                                "FORM_BTN_SUBMIT" => "Отправить",
                                "FORM_BTN_TYPE" => "header__modal",
                                "FORM_FIELDS" => array(
                                    0 => "24",
                                    1 => "25",
                                ),
                                "FORM_POLITIC_URL" => "/politic/",
                                "FORM_PRODUCT_ADD" => "N",
                                "FORM_PRODUCT_ID" => "",
                                "FORM_REQUIRED_FIELDS" => array(
                                    0 => "24",
                                    1 => "25",
                                ),
                                "FORM_TITLE" => "Оставьте заявку",
                                "IBLOCK_ID" => "14",
                                "IBLOCK_TYPE" => "forms",
                                "COMPONENT_TEMPLATE" => ".default"
                            ),
                            false
                        );?>
                    </div>
                </div>
                <div class="col-lg-auto d-flex align-items-center header__logo header-logo--desc">
                    <a href="<?=SITE_DIR?>">
                        <?$APPLICATION->IncludeFile('include/'.SITE_ID.'/logo.php',
                            ['SETTING' => $arParams['SETTING']],
                            ['SHOW_BORDER' => false, 'MODE' => 'php']
                        );?>
                    </a>
                </div>
                <div class="col-lg-auto header__block header__address">
                    <div class="header__pic">
                        <?=GetContentSvgIcon('address')?>
                    </div>
                    <div class="header__text">
                        <div>г. Екатеринбург, ул.</div>
                        <div>Генеральская, 3, оф.208</div>
                    </div>
                </div>
                <div class="col-lg-auto header__block header__search header__search--desktop">
                    <div class="header__loupe">
                        <button class="header__loupe-pic">
                            <?=GetContentSvgIcon('search-big')?>
                        </button>
                        <button class="header__loupe-crest">
                            <?=GetContentSvgIcon('crest-big')?>
                        </button>
                    </div>
                </div>
                <div class="header__search-panel header__search-panel">
                    <form method="get" action="/search/">
                        <input class="inp inp-search inp-search--desktop" name="q" id="qplSKIW" autocomplete="off" placeholder="Поиск">
                        <button class="btn-search--desktop" type="submit" title="Поиск">
                            <?=GetContentSvgIcon('search-grey')?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</header>