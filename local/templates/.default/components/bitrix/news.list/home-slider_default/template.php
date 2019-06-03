<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['ITEMS']) {?>
    <div class="slider-big">
        <div class="slider-big__slides"
             data-arrows="<?=$arParams['SLIDER_ARROWS'] == 'N' ? 'false' : 'true'?>"
             data-autoplay="<?=$arParams['SLIDER_AUTOPLAY'] == 'N' ? 'false' : 'true'?>"
             data-speed="<?=$arParams['SLIDER_TIME'] ?: 0?>">
            <?foreach ($arResult['ITEMS'] as $k => $arItem) {
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => Loc::getMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="slider-big__slide slider-big-slide<?=$arItem['PROPERTIES']['SLIDE_SHADOW']['VALUE_XML_ID'] == 'Y' ? ' slider-big__shadow' : ''?>"
                     id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="slider-big-slide__wrap">
                        <?if ($arItem['PROPERTIES']['SUBTITLE']['VALUE']) {?>
                            <div class="slider-big-slide__subtitle"><?=$arItem['PROPERTIES']['SUBTITLE']['VALUE']?></div>
                        <?}?>
                        <div class="slider-big-slide__title"><?=$arItem['NAME']?></div>
                        <div class="slider-big-slide__desc">
                            <?=$arItem['PREVIEW_TEXT']?>
                        </div>
                        <?if ($arItem['PROPERTIES']['LINK_SECTION']['VALUE']) {?>
                            <a href="<?=$arItem['PROPERTIES']['LINK_SECTION']['VALUE']?>"
                               class="btn btn_big btn_round btn_success"><?=$arItem['PROPERTIES']['LINK_BUTTON_NAME']['VALUE'] ?: Loc::getMessage('SLIDE_MORE')?></a>
                        <?}?>
                    </div>
                    <img class="slider-big-slide__img"
                         src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                         alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>">
                </div>
            <?}?>
        </div>
        <div class="slider-big__wrap-nav">
            <?if (count($arResult['ITEMS']) > 1 && $arParams['SLIDER_ARROWS'] == 'Y') {?>
                <div class="slide-big__nav">
                    <button class="btn btn_circle-default btn_outline-light slider-big__prev">
                        <?=GetContentSvgIcon('arrow_left');?>
                    </button>
                    <button class="btn btn_circle-default btn_outline-light slider-big__next">
                        <?=GetContentSvgIcon('arrow_right');?>
                    </button>
                </div>
            <?}?>
            <div class="slide-big__dots slide-big-dots">
                <?foreach ($arResult['ITEMS'] as $arItem) {?>
                    <div class="slide-big-dots__item"></div>
                <?}?>
            </div>
        </div>
    </div>
<?}?>