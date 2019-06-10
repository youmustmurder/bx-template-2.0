<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['ITEMS']) {?>
<div class="slider-big"
	 data-arrows="<?=$arParams['SLIDER_ARROWS'] == 'N' ? 'false' : 'true'?>"
     data-autoplay="<?=$arParams['SLIDER_AUTOPLAY'] == 'N' ? 'false' : 'true'?>"
     data-speed="<?=$arParams['SLIDER_TIME'] ?: 0?>">
    <div class="slider-big__slides slider-big-slides">
        <?foreach ($arResult['ITEMS'] as $arItem) {
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => Loc::getMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="slider-big__slide slider-big-slide"
                 id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div class="slider-big-slide__inner">
                    <h2 class="slider-big-slide__title"><?=$arItem['NAME']?></h2>
                    <p class="slider-big-slide__text"><?=$arItem['PREVIEW_TEXT']?></p>
                    <?if ($arItem['PROPERTIES']['LINK_SECTION']['VALUE']) {?>
                        <a href="<?=$arItem['PROPERTIES']['LINK_SECTION']['VALUE']?>"
                           class="btn btn_mid btn_round btn_success slider-big-slide__btn"><?=$arItem['PROPERTIES']['LINK_BUTTON_NAME']['VALUE'] ?: Loc::getMessage('SLIDE_MORE')?></a>
                    <?}?>
                    <?if ($arItem['PROPERTIES']['ADVANTAGE']['VALUE']) {?>
                        <ul class="slider-big-slide__numbers slider-big-slide-numbers">
                            <?foreach ($arItem['PROPERTIES']['ADVANTAGE']['VALUE'] as $k => $item) {?>
                                <li class="slider-big-slide-numbers__num slider-big-slide-num">
                                    <span class="slider-big-slide-num__value"><?=$item?></span>
                                    <span class="slider-big-slide-num__text"><?=$arItem['PROPERTIES']['ADVANTAGE']['DESCRIPTION'][$k]?></span>
                                </li>
                            <?}?>
                        </ul>
                    <?}?>
                </div>
				<img src="<?=GetNoPhoto()?>"
					 class="slider-big-slide__img lazy-image"
					 lazy-image="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                     alt="<?=$arItem['PREVIEW_PICTURE']['SRC']?>">
            </div>
        <?}?>
	</div>
    <?if (count($arResult['ITEMS']) > 1 && $arParams['SLIDER_ARROWS'] == 'Y') {?>
        <div class="slide-big__nav">
            <button class="btn btn_circle-default btn_light btn_light_to-success slider-big__prev">
				<?=GetContentSvgIcon('arrow_left');?>
            </button>
            <button class="btn btn_circle-default btn_light btn_light_to-success slider-big__next">
				<?=GetContentSvgIcon('arrow_right');?>
            </button>
        </div>
    <?}?>
</div>
<?}?>