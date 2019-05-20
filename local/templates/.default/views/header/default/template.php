<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

global $arCurrentSetting;

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
                        <span class="address-value"><span>г. Екатеринбург</span>
						<span>ул. Генеральская, д. 3, оф. 206</span></span>
					</a>
                </address>
            </div>
        </div>
    </nav>
    <div class="header-middle">
        <div class="container">
            <div class="row">
				<div class="col d-flex justify-content-between align-items-center">
					<div class="d-flex align-items-center header-logo">
						<a href="/" class="d-flex align-items-center"><?=GetContentSvgIcon('logo');?></a>
					</div>
					<div class="header-search">
						<form class="search__form" method="get" action="/search/">
							<span class="icon__search"><?=GetContentSvgIcon('search');?></span>
							<input class="inp inp-search" name="q" id="qplSKIW" autocomplete="off" placeholder="Поиск по сайту" size="20">
							<button class="btn-search" type="submit" title="Поиск">
								<?=GetContentSvgIcon('arrow_small_right');?>
							</button>
						</form>
					</div>
					<div class="header__contact">
						<div class="header__phone">
							<?=GetContentSvgIcon('phone');?>
							<a href="tel:+7 (343) 372-57-75">+7 (343) 372-57-75</a>
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
        </div>
    </div>
    <nav class="header-bottom">
        <div class="container">
            <div class="row row-line">
                <div class="catalog__menu">
                    <ul>
                        <li>
                            <a href="/catalog/elektronika/">Электроника</a>
                        </li>
                        <li>
                            <a href="/catalog/mebel/">Мебель</a>
                        </li>
                        <li>
                            <a href="/catalog/odezhda/">Одежда</a>
                        </li>
                        <li>
                            <a href="/catalog/krasota-i-zdorove/">Красота и здоровье</a>
                        </li>
                        <li>
                            <a href="/catalog/sport-i-turizm/">Спорт и туризм</a>
                        </li>
                        <li class="more__menu">
                            <a href="#" class="js-init_more_menu"><span class="menu__dots"></span>Еще</a>
                            <ul>
                                <li>
                                    <a href="/catalog/uslugi/">Услуги</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>