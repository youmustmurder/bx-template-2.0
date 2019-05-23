<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

global $arCurrentSetting;

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>

<div class="slider-big">
	<div class="slider-big__slides">
        <?foreach ($arResult['ITEMS'] as $k => $arItem) {?>
            <div class="slider-big__slide slider-big-slide">
                <div class="slider-big-slide__wrap">
                    <?if ($arItem['PROPERTIES']['SUBTITLE']['VALUE']) {?>
                        <div class="slider-big-slide__subtitle"><?=$arItem['PROPERTIES']['SUBTITLE']['VALUE']?></div>
                    <?}?>
                    <div class="slider-big-slide__title"><?=$arItem['NAME']?></div>
                    <div class="slider-big-slide__desc"><?=$arItem['PREVIEW_TEXT']?></div>
                    <?if ($arItem['PROPERTIES']['LINK_SECTION']['VALUE']) {?>
                        <a href="<?=$arItem['PROPERTIES']['LINK_SECTION']['VALUE']?>"
                           class="btn btn--success btn--square btn--mid btn--icon-right">
                            <?=$arItem['PROPERTIES']['LINK_BUTTON_NAME']['VALUE'] ?: Loc::getMessage('SLIDE_MORE')?>
                            <?=GetContentSvgIcon('cart');?>
                        </a>
                    <?}?>
                </div>
                <img class="slider-big-slide__img"
                     src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                     alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>">
            </div>
        <?}?>
	</div>
    <?if (count($arResult['ITEMS']) > 1) {?>
        <div class="slide-big__nav">
            <button class="btn btn--icon btn--icon-big btn--stock slider-big__prev">
                <?=GetContentSvgIcon('arrow_left');?>
            </button>
            <button class="btn btn--icon btn--icon-big btn--stock slider-big__next">
                <?=GetContentSvgIcon('arrow_right');?>
            </button>
        </div>
    <?}?>
	<div class="slide-big__dots slide-big-dots">
		<div class="slide-big-dots__item"></div>
		<div class="slide-big-dots__item"></div>
	</div>
</div>