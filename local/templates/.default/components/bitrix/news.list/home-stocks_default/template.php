<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

global $arCurrentSetting;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/script.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');
?>

<section class="section-stocks">
    <?if($arResult['ITEMS']){?>
        <div class="slider-stocks__slider"
             data-dots="<?=count($arResult['ITEMS']) > 0 ? 'true':'false'?>"
             data-arrows="<?=$arParams['SLIDER_ARROWS'] == 'N' ? 'false' : 'true'?>"
             data-speed="<?=$arParams['SLIDER_TIME'] > 0 ? $arParams['SLIDER_TIME'] : '0'?>"
             data-autoplay="<?=$arParams['SLIDER_AUTOPLAY'] == 'Y' ? 'true' : 'false'?>">
            <?foreach ($arResult['ITEMS'] as $k => $arSlide){
                $this->AddEditAction($arSlide['ID'], $arSlide['EDIT_LINK'], CIBlock::GetArrayByID($arSlide["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arSlide['ID'], $arSlide['DELETE_LINK'], CIBlock::GetArrayByID($arSlide["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="section-stocks__slide section-stocks-slide" style="background-image: url(<?=$arSlide['PREVIEW_PICTURE']['SRC']?>);" id="<?=$this->GetEditAreaId($arSlide['ID']);?>">
					<div class="section-stocks-slide__wrap">
						<?if($arSlide['PROPERTIES']['STOCK_FIRST_TEXT']['VALUE']){?>
							<h2 class="section-stocks-slide__title"><?=$arSlide['PROPERTIES']['STOCK_FIRST_TEXT']['VALUE']?>
								<?if($arSlide['PROPERTIES']['STOCK_PERCENT']['VALUE']){?>
									<span class="section-stocks-slide__percent"><?=$arSlide['PROPERTIES']['STOCK_PERCENT']['VALUE']?>%</span>
								<?}?>
							</h2>
						<?}?>
						<?if($arSlide['PROPERTIES']['STOCK_TWO_TEXT']['VALUE']){?>
							<h3 class="section-stocks-slide__subtitle"><?=$arSlide['PROPERTIES']['STOCK_TWO_TEXT']['VALUE']?></h3>
						<?}?>
						<a href="<?=$arSlide['DETAIL_PAGE_URL']?>" class="btn btn_mid btn_round btn_primary section-stocks-slide__link"><?=GetMessage('LINK_TO_CATALOG')?></a>
					</div>
				</div>
            <?}?>
        </div>
		<?if(count($arResult['ITEMS']) > 1){?>
			<div class="section-stocks__arrow-wrap">
				<button class="btn btn_circle-default btn_light btn_light_to-success section-stocks__arrow_prev">
					<?=GetContentSvgIcon('arrow_left');?>
				</button>
				<button class="btn btn_circle-default btn_light btn_light_to-success section-stocks__arrow_next">
					<?=GetContentSvgIcon('arrow_right');?>
				</button>
			</div>
            <div class="section-stocks__dots section-stocks-dots">
				<?foreach ($arResult['ITEMS'] as $k => $arSlide){?>
					<span class="section-stocks-dots__dot"></span>
				<?}?>
            </div>
        <?}?>
    <?}?>
</section>