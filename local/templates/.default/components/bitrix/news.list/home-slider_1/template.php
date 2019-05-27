<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['ITEMS']) {?>
<div class="slider-big">
    <div class="slider-big__slides slider-big-slides">
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
    <?if (count($arResult['ITEMS']) > 1) {?>
        <div class="slide-big__nav">
            <button class="btn btn--icon btn--icon-big btn--stock slider-big__prev">
                <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M14.1641 6H1.91406L7.16406 0.74994L6.49976 0L-0.000137329 6.5L6.49986 13L7.16406 12.25L1.91406 7H14.1641V6Z" fill="#95A5A6"/></svg>
            </button>
            <button class="btn btn--icon btn--icon-big btn--success slider-big__next">
                <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M0 6H12.25L7 0.74994L7.6643 0L14.1642 6.5L7.6642 13L7 12.25L12.25 7H0V6Z" fill="white"/></svg>
            </button>
        </div>
    <?}?>
</div>
<?}?>