<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>
<?if($arResult['ITEMS']){?>
<section class="section-news section-news__catalog"
    <?if ($arParams['BLOCK_IMAGE']) {?>
	    style="background-image: url('<?=$arParams['BLOCK_IMAGE']?>');"
    <?}?>>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section-news__header">
						<h2 class="section-news__title"><?=$arParams['BLOCK_TITLE'] ?: Loc::getMessage('HOME_NEWS_DEFAULT_BLOCK_TITLE')?></h2>
						<a href="<?=$arParams['SECTION_LINK'] ?: Loc::getMessage('HOME_NEWS_DEFAULT_SECTION_LINK_DEFAULT', array('#SITE_DIR#' => SITE_DIR))?>"
                           class="link link_light link_icon-right section-news__link-all">
                            <?=$arParams['SECTION_LINK_NAME'] ?: Loc::getMessage('HOME_NEWS_DEFAULT_SECTION_LINK_NAME')?>
							<span class="link__icon"><?=GetContentSvgIcon('arrow_right');?></span>
						</a>
					</div>
					<div class="section-news__list section-news-list">
						<?foreach ($arResult['ITEMS'] as $k => $arItem){
							$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
							$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
							?>
							<div class="section-news-list__item section-news__item section-news-item">
								<a href="<?=$arItem['DETAIL_PAGE_URL']?>"
                                   class="section-news-item__link"
                                   id="<?=$this->GetEditAreaId($arItem['ID']);?>">
									<div class="section-news-item__date">
										<span class="section-news-item__day"><?=$arItem['DATE_NEWS'][0]?></span>
										<span class="section-news-item__mounth"><?=$arItem['DATE_NEWS'][1]?> <?=$arItem['DATE_NEWS'][2]?></span>
									</div>
									<div class="section-news-item__name">
										<span><?=$arItem['NAME']?></span>
									</div>
								</a>
							</div>
						<?}?>
					</div>
				</div>
			</div>
		</div>
</section>
<?}?>