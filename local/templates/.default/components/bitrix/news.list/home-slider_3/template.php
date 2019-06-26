<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['ITEMS']) {?>
<div class="slider-big">
	<div class="slider-big__slides">
        <?foreach ($arResult['ITEMS'] as $k => $arItem) {?>
            <div class="slider-big__slide slider-big-slide slider-big-slide slider-big-slide_shadow">
                <div class="slider-big-slide__wrap">
                    <?if ($arItem['PROPERTIES']['SUBTITLE']['VALUE']) {?>
                        <div class="slider-big-slide__subtitle"><?=$arItem['PROPERTIES']['SUBTITLE']['VALUE']?></div>
                    <?}?>
                    <div class="slider-big-slide__title"><?=$arItem['NAME']?></div>
                    <div class="slider-big-slide__desc"><?=$arItem['PREVIEW_TEXT']?></div>
                    <?if ($arItem['PROPERTIES']['LINK_SECTION']['VALUE']) {?>
                        <a href="<?=$arItem['PROPERTIES']['LINK_SECTION']['VALUE']?>" class="btn btn_mid btn_round btn_success btn_icon-right">
                            <?=$arItem['PROPERTIES']['LINK_BUTTON_NAME']['VALUE'] ?: Loc::getMessage('SLIDE_MORE')?>
                        </a>
                    <?}?>
                </div>
				<img src="<?=GetNoPhoto()?>"
					 class="slider-big-slide__img lazy-image"
					 lazy-image="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                     alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>">
            </div>
        <?}?>
	</div>
    <?if (count($arResult['ITEMS']) > 1) {?>
        <div class="slide-big__nav">
            <button class="btn btn_circle-default btn_light btn_light_to-success slider-big__prev">
                <?=GetContentSvgIcon('arrow_left');?>
            </button>
            <button class="btn btn_circle-default btn_light btn_light_to-success slider-big__next">
                <?=GetContentSvgIcon('arrow_right');?>
            </button>
        </div>
    <?}?>
	<div class="slide-big__dots slide-big-dots">
        <?foreach ($arResult['ITEMS'] as $item) {?>
		    <div class="slide-big-dots__item"></div>
        <?}?>
	</div>
</div>
<?}?>