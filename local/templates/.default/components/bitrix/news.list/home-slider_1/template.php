<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
/*
echo '<pre>';
var_dump($arResult['ITEMS'][0]['PROPERTIES']['PRODUCT']);
echo '</pre>';*/
?>

<div class="slider-big">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="slider-big__slides slider-big-slides">
                    <?foreach ($arResult['ITEMS'] as $k => $arItem) {?>
                        <div class="slider-big__slide slider-big-slide">
                            <div class="slider-big-slide__name"><?=$arItem['NAME']?></div>
                            <p class="slider-big-slide__desc"><?=$arItem['PREVIEW_TEXT']?></p>
                            <div class="slider-big-slide__info">
                                <?if ($arItem['PROPERTIES']['LINK_SECTION']['VALUE'] || $arItem['PROPERTIES']['PRODUCT']['DETAIL_PAGE_URL']) {?>
                                    <a href="<?=$arItem['PROPERTIES']['LINK_SECTION']['VALUE'] ?: $arItem['PROPERTIES']['PRODUCT']['DETAIL_PAGE_URL']?>"
                                       class="btn btn--success btn--square btn--big slider-big-slide__link"><?=$arItem['PROPERTIES']['LINK_BUTTON_NAME']['VALUE'] ?: Loc::getMessage('SLIDE_MORE')?></a>
                                    <?if ($arItem['PROPERTIES']['PRODUCT']['PROPERTY_PRODUCT_PRICE_VALUE']) {?>
                                        <span class="slider-big-slide__price">
                                            <?=$arItem['PROPERTIES']['PRODUCT']['CURRENCY'] == 'Y' ?
                                                Loc::getMessage('FROM_PRICE') . $arItem['PROPERTIES']['PRODUCT']['PROPERTY_PRODUCT_PRICE_VALUE'] . ' ₽'  :
                                                $arItem['PROPERTIES']['PRODUCT']['PROPERTY_PRODUCT_PRICE_VALUE']?>
                                        </span>
                                    <?}?>
                                <?}?>
                            </div>
                            <img class="slider-big-slide__img"
                                 src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                                 alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>">
                        </div>
                    <?}?>
				</div>
				<div class="slider-big__previews">
                    <?foreach ($arResult['ITEMS'] as $k => $arItem) {?>
                        <div class="slider-big__preview slider-big-preview" indexSlide="<?=$k?>">
                            <?if ($arItem['PROPERTIES']['PRODUCT']['VALUE']) {?>
                                <?if ($arItem['PROPERTIES']['PRODUCT']['PREVIEW_PICTURE']) {?>
                                    <img class="slider-big-preview__img"
                                         src="<?=$arItem['PROPERTIES']['PRODUCT']['PREVIEW_PICTURE']?>"
                                         alt="<?=$arItem['PROPERTIES']['PRODUCT']['NAME']?>">
                                <?}?>
                                <div class="slider-big-preview__name"><?=$arItem['PROPERTIES']['PRODUCT']['NAME']?></div>
                                <?if ($arItem['PROPERTIES']['PRODUCT']['PROPERTY_PRODUCT_PRICE_VALUE']) {?>
                                    <div class="slider-big-preview__price">
                                        <?=$arItem['PROPERTIES']['PRODUCT']['PROPERTY_PRODUCT_PRICE_VALUE']?>
                                        <?=$arItem['PROPERTIES']['PRODUCT']['CURRENCY'] == 'Y' ? ' ₽' : ''?>
                                    </div>
                                <?}?>
                            <?}?>
                        </div>
                    <?}?>
				</div>
				<div class="slide-big__nav">
					<button class="btn btn--icon btn--icon-big btn--stock slider-big__prev">
						<?=GetContentSvgIcon('arrow_left');?>
					</button>
					<button class="btn btn--icon btn--icon-big btn--success slider-big__next">
						<?=GetContentSvgIcon('arrow_right');?>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>