<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['ITEMS']) {?>
<div class="slider-big">
    <div class="slider-big__slides slider-big-slides"
         data-arrows="<?=$arParams['SLIDER_ARROWS'] == 'N' ? 'false' : 'true'?>"
         data-autoplay="<?=$arParams['SLIDER_AUTOPLAY'] == 'N' ? 'false' : 'true'?>"
         data-speed="<?=$arParams['SLIDER_TIME'] ?: 0?>">
        <?foreach ($arResult['ITEMS'] as $arItem) {?>
            <div class="slider-big__slide slider-slide">
                <div class="slider-slider__inner">
                    <h2 class="slider-slide__title"><?=$arItem['NAME']?></h2>
                    <p class="slider-slide__text"><?=$arItem['PREVIEW_TEXT']?></p>
                    <?if ($arItem['PROPERTIES']['LINK_SECTION']['VALUE']) {?>
                        <a href="<?=$arItem['PROPERTIES']['LINK_SECTION']['VALUE']?>"
                           class="btn btn--success btn--circle btn--mid slider-slide__btn"><?=$arItem['PROPERTIES']['LINK_BUTTON_NAME']['VALUE'] ?: Loc::getMessage('SLIDE_MORE')?></a>
                    <?}?>
                    <?if ($arItem['PROPERTIES']['ADVANTAGE']['VALUE']) {?>
                        <ul class="slider-slide__numbers slider-slide-numbers">
                            <?foreach ($arItem['PROPERTIES']['ADVANTAGE']['VALUE'] as $k => $item) {?>
                                <li class="slider-slide-numbers__num slider-slide-num">
                                    <span class="slider-slide-num__value"><?=$item?></span>
                                    <span class="slider-slide-num__text"><?=$arItem['PROPERTIES']['ADVANTAGE']['DESCRIPTION'][$k]?></span>
                                </li>
                            <?}?>
                        </ul>
                    <?}?>
                </div>
                <img class="slider-slide__img"
                     src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                     alt="<?=$arItem['PREVIEW_PICTURE']['SRC']?>">
            </div>
        <?}?>
	</div>
    <?if (count($arResult['ITEMS']) > 1 && $arParams['SLIDER_ARROWS'] == 'Y') {?>
        <div class="slide-big__nav">
            <button class="btn btn_circle-default btn_light btn_light_to-green slider-big__prev">
				<?=GetContentSvgIcon('arrow_left');?>
            </button>
            <button class="btn btn_circle-default btn_light btn_light_to-green slider-big__next">
				<?=GetContentSvgIcon('arrow_right');?>
            </button>
        </div>
    <?}?>
</div>
<?}?>