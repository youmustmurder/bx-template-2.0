<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['ITEMS']) {?>
<section class="news">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="news__inner">
					<h2 class="news__title"><?=$arParams['BLOCK_TITLE'] ?: Loc::getMessage('HOME_NEWS_1_BLOCK_TITLE')?></h2>
					<a href="<?=$arParams['SECTION_LINK'] ?: Loc::getMessage('HOME_NEWS_1_SECTION_LINK_DEFAULT', array('#SITE_DIR#' => SITE_DIR))?>"
                       class="link link_light link_icon-right news__link-all-news">
                        <?=$arParams['SECTION_LINK_NAME'] ?: Loc::getMessage('HOME_NEWS_1_SECTION_LINK_NAME')?>
						<span class="link__icon"><?=GetContentSvgIcon('arrow_right');?></span>
					</a>
					<div class="news__slides-inner">
						<div class="news__slides">
                            <?foreach ($arResult['ITEMS'] as $arItem) {
                                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                                ?>
                                <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="news__slide news-slide" id="<?=$this->GetEditAreaId($arItem['ID'])?>">
                                    <?/*
                                    <div class="news-slide__theme"></div>
                                    */?>
                                    <div class="news-slide__title"><?=$arItem['NAME']?></div>
                                    <div class="news-slide__date"><?=$arItem['DISPLAY_ACTIVE_FROM']?></div>
								</a>
                            <?}?>
					    </div>
					</div>
					<button class="btn btn_circle-default btn_outline-light news__nav news__nav_prev">
						<?=GetContentSvgIcon('arrow_left');?>
					</button>
					<button class="btn btn_circle-default btn_outline-light news__nav news__nav_next">
						<?=GetContentSvgIcon('arrow_right');?>
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="news__dots news-dots">
        <?foreach ($arResult['ITEMS'] as $arItem) {?>
		    <span class="news-dots__item"></span>
        <?}?>
	</div>
</section>
<?}?>