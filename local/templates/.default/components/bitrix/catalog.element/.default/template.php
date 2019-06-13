<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$APPLICATION->SetPageProperty('PAGE_LAYOUT', 'default');


?>
<div class="col">
	<div class="row product-detain-wrap">
		<div class="col-lg-5 col-md-7">
            <?if ($arResult['MORE_IMAGES']) {?>
                <div class="product-slider">
                    <div class="product-slider__previews-inner">
                        <div class="product-slider__previews product-slider-previews">
                            <?foreach ($arResult['MORE_IMAGES'] as $k => $arImage) {?>
                                <div class="product-slider-previews__slide product-slider-previews-slide" data-index="<?=$k?>">
									<div class="product-slider-previews-slide__wrap"><img src="<?=$arImage['RESIZE_SRC']?>" alt=""></div>
                                </div>
                            <?}?>
                        </div>
                    </div>
                    <div class="product-slider__big-inner">
                        <div class="product-slider__big">
                            <?foreach ($arResult['MORE_IMAGES'] as $k => $arImage) {?>
                                <div class="product-slider__big__slide product-slider__big-slide" data-index="<?=$k?>">
                                    <img src="<?=$arImage['SRC']?>" alt="">
                                </div>
                            <?}?>
                        </div>
                    </div>
                </div>
            <?}?>
		</div>

		<div class="col-lg-6 offset-lg-1 col-md-5">
            <?if ($arResult['PROPERTIES']['PRODUCT_LABEL']['VALUE_XML_ID'] || $arResult['PROPERTIES']['PRODUCT_DISCOUNT']['VALUE']) {?>
                <ul class="product-labels">
                    <?foreach ($arResult['PROPERTIES']['PRODUCT_LABEL']['VALUE'] as $k => $value) {?>
                        <li class="label <?=$arResult['PROPERTIES']['PRODUCT_LABEL']['VALUE_XML_ID'][$k] == 'HITS' ? 'label_blue' : 'label_green'?>"><?=$value?></li>
                    <?}?>
                    <?if ($arResult['PROPERTIES']['PRODUCT_DISCOUNT']['VALUE']) {?>
                        <li class="label label_yellow">-<?=$arResult['PROPERTIES']['PRODUCT_DISCOUNT']['VALUE']?>%</li>
                    <?}?>
                </ul>
            <?}?>
			<div class="product-info">
				<div class="product-info__col">
                    <?if ($arResult['PRICE'] || $arResult['OLD_PRICE']) {?>
                        <div class="product-info__price product-info-price">
                            <?if ($arResult['PRICE']) {?>
                                <span class="product-info-price__item"><?=$arResult['PRICE']['VALUE']?><?=$arResult['PRICE']['CURRENCY'] == 'Y' ? ' ₽' : ''?></span>
                            <?}?>
                            <?if ($arResult['OLD_PRICE']) {?>
                                <span class="product-info-price__item product-info-price__item_old"><?=$arResult['OLD_PRICE']['VALUE']?><?=$arResult['OLD_PRICE']['CURRENCY'] == 'Y' ? ' ₽' : ''?></span>
                            <?}?>
                        </div>
                    <?}?>
					<div class="product-info__presence product-info-presence <?=$arResult['PRODUCT_STATUS']['CLASS']?>">
						<span class="product-info-presence__icon"><?=GetContentSvgIcon('check');?></span>
						<span class="product-info-presence__value"><?=$arResult['PRODUCT_STATUS']['VALUE']?></span>
					</div>
				</div>
				<div class="product-info__col product-info__col_buttons">
                    <?$APPLICATION->IncludeComponent(
                        "website96:web.forms",
                        ".default",
                        array(
                            "COMPONENT_TEMPLATE" => ".default",
                            "IBLOCK_TYPE" => "forms",
                            "IBLOCK_ID" => "14",
                            "FORM_PRODUCT_ID" => $arResult['ID'],
                            "FORM_PRODUCT_ADD" => "Y",
                            "FORM_BTN_TYPE" => "btn_round",
                            "FORM_FIELDS" => array(
                                0 => "24",
                                1 => "25",
                            ),
                            "FORM_REQUIRED_FIELDS" => array(
                                0 => "25",
                            ),
                            "FORM_TITLE" => "Форма заказа",
                            "FORM_BTN_OPEN" => "Быстрый заказ",
                            "FORM_BTN_SUBMIT" => "Заказать",
                            "FORM_POLITIC_URL" => "/politic/",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "3600",
                            "FORM_BTN_STYLE" => "btn_outline-primary",
                            "FORM_BTN_SIZE" => "btn_mid",
                            "FORM_LINK_TYPE" => "btn"
                        ),
                        false
                    );?>
				</div>
			</div>
            <?if ($arResult['PREVIEW_TEXT']) {?>
                <div class="product-block">
                    <div class="product-block__title"><?=Loc::getMessage('PRODUCT_DEFAULT_PREVIEW_TEXT_TITLE')?></div>
                    <a href="#desc" class="link link_success link_icon-right product-block__link">
                        <?=Loc::getMessage('PRODUCT_DEFAULT_DETAIL_TEXT_TITLE')?>
                        <span class="link__icon"><?=GetContentSvgIcon('arrow_bottom');?></span>
                    </a>
                    <div class="product-block__body">
                        <?=$arResult['PREVIEW_TEXT']?>
                    </div>
                </div>
            <?}?>
            <?if ($arResult['PROPERTIES']['PRODUCT_OPTIONS']['VALUE']) {?>
                <div class="product-block">
                    <div class="product-block__title"></div>
                    <a href="#desc" class="link link_success link_icon-right product-block__link">
                        <?=Loc::getMessage('PRODUCT_DEFAULT_OPTIONS_ALL_TITLE')?>
                        <span class="link__icon"><?=GetContentSvgIcon('arrow_bottom');?></span>
                    </a>
                    <div class="product-block__body">
                        <ul class="specifications">
                            <?
                            $i = 0;
                            foreach ($arResult['PROPERTIES']['PRODUCT_OPTIONS']['VALUE'] as $k => $option) {?>
                                <li class="specifications__item specifications-item">
                                    <span class="specifications-item__name"><?=$option?></span>
                                    <span class="specifications-item__value"><?=$arResult['PROPERTIES']['PRODUCT_OPTIONS']['DESCRIPTION'][$k]?></span>
                                </li>
                                <?if ($i == 4) {
                                    break;
                                } else {
                                    $i++;
                                }?>
                            <?}?>
                        </ul>
                    </div>
                </div>
            <?}?>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="product-tabs tabs tabs_big tabs_underline">
				<ul class="tabs__toggles">
                    <?if ($arResult['DETAIL_TEXT']) {?>
                        <li class="tabs__toggle tabs__toggle_active">
                            <button data-toggle="collapse"
                                    data-target="#desc"
                                    aria-expanded="true"
                                    aria-controls="desc"><?=Loc::getMessage('PRODUCT_DEFAULT_PREVIEW_TEXT_TITLE')?></button>
                        </li>
                    <?}?>
                    <?if ($arResult['PROPERTIES']['PRODUCT_OPTIONS']['VALUE']) {?>
                        <li class="tabs__toggle">
                            <button data-toggle="collapse"
                                    data-target="#char"
                                    aria-expanded="true"
                                    aria-controls="char"><?=Loc::getMessage('PRODUCT_DEFAULT_OPTIONS_TITLE')?></button>
                        </li>
                    <?}?>
				</ul>
				<div class="tabs__contents">
                    <?if ($arResult['DETAIL_TEXT']) {?>
                        <div class="tabs__content tabs__content_active text" id="desc">
                           <?=$arResult['DETAIL_TEXT']?>
                        </div>
                    <?}?>
                    <?if ($arResult['PROPERTIES']['PRODUCT_OPTIONS']['VALUE']) {?>
                        <div class="tabs__content" id="char">
                            <ul class="specifications">
                                <?foreach ($arResult['PROPERTIES']['PRODUCT_OPTIONS']['VALUE'] as $k => $option) {?>
                                    <li class="specifications__item specifications-item">
                                        <span class="specifications-item__name"><?=$option?></span>
                                        <span class="specifications-item__value"><?=$arResult['PROPERTIES']['PRODUCT_OPTIONS']['DESCRIPTION'][$k]?></span>
                                    </li>
                                <?}?>
                            </ul>
                        </div>
                    <?}?>
				</div>
			</div>
            <?if ($arResult['PROPERTIES']['PRODUCT_DESCRIPTION']['VALUE']) {?>
                <div class="text product-desc">
                    <?=htmlspecialchars($arResult['PROPERTIES']['PRODUCT_DESCRIPTION']['VALUE']['TEXT'])?>
                </div>
            <?}?>
		</div>
	</div>
</div>