<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['ITEMS']) {?>
	<section class="reviews">
		<div class="container">
			<div class="row justified-content-between">
				<div class="col-lg-3 reviews__title">
					<h2><?=$arParams['BLOCK_TITLE'] ?: Loc::getMessage('HOME_REVIEWS_DEFAULT_BLOCK_TITLE')?></h2>
				</div>
				<div class="col-lg-7 offset-lg-2 reviews-content">
					<div class="reviews__photo-list-wrap">
						<div class="reviews__photo-list reviews-photo-list">
							<?foreach ($arResult['ITEMS'] as $key => $arReview){?>
								<div class="reviews-photo-list__item reviews-photo-list-item" data-index="<?=$key?>">
									<div class="reviews-photo-list-item__inner">
										<div class="reviews-photo-list-item__image">
											<img class="lazy-image"
												 lazy-image="<?=$arReview['PREVIEW_PICTURE']['SRC']?>"
                                                 alt="<?=Loc::getMessage('HOME_REVIEWS_DEFAULT_REVIEW_IMAGE_ALT')?>"/>
										</div>
									</div>
								</div>
							<?}?>
						</div>
					</div>
					<button class="reviews__arrow reviews__arrow_prev">
						<?=GetContentSvgIcon('arrow_left');?>
					</button>
					<button class="reviews__arrow reviews__arrow_next">
						<?=GetContentSvgIcon('arrow_right');?>
					</button>
					<div class="reviews-main__list-wrap">
						<div class="reviews-main__list reviews-main-list">
							<?foreach ($arResult['ITEMS'] as $key => $arItem){
                                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                                ?>
								<div class="reviews-main-list__item reviews-main-list-item"
                                     id="<?=$this->GetEditAreaId($arItem['ID'])?>"
                                     data-index="<?=$key?>">
									<div class="reviews-main-list-item__desc"><?=$arItem['PREVIEW_TEXT']?></div>
									<div class="reviews-main-list-item__client">
										<div class="review-client__name"><?=$arItem['NAME']?></div>
										<?if($arItem['PROPERTIES']['REVIEW_CLIENT_ADD_OPTION']){?>
											<div class="review-client__optional"><?=$arItem['PROPERTIES']['REVIEW_CLIENT_ADD_OPTION']['VALUE']?></div>
										<?}?>
										<a href="<?=$arParams['SECTION_LINK'] ?: Loc::getMessage('HOME_REVIEWS_DEFAULT_SECTION_LINK_DEFAULT', array('#SITE_DIR#' => SITE_DIR))?>"
                                           class="btn btn_mid btn_round btn_primary review-client__all"><?=$arParams['SECTION_LINK_NAME'] ?: Loc::getMessage('HOME_REVIEWS_DEFAULT_SECTION_LINK_NAME')?></a>
									</div>
								</div>
							<?}?>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
<?}?>