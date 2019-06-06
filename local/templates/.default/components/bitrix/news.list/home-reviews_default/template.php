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
					<? /*<h2><?=$arParams['SECTION_TITLE'] ? $arParams['SECTION_TITLE'] : GetMessage('REVIEWS_SECTION_TITLE_DEFAULT')?></h2>*/?>
					<h2>Отзывы наших клиентов</h2>
				</div>
				<div class="col-lg-7 offset-lg-2 reviews-content">
					<div class="reviews__photo-list-wrap">
						<div class="reviews__photo-list reviews-photo-list">
							<?foreach ($arResult['ITEMS'] as $key => $arReview){?>
								<div class="reviews-photo-list__item reviews-photo-list-item" data-index="<?=$key?>">
									<div class="reviews-photo-list-item__inner">
										<div class="reviews-photo-list-item__image">
											<img src="<?=$arReview['PREVIEW_PICTURE']['SRC']?>" />
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
							<?foreach ($arResult['ITEMS'] as $key => $arReview){?>
								<div class="reviews-main-list__item reviews-main-list-item" data-index="<?=$key?>">
									<div class="reviews-main-list-item__desc"><?=$arReview['PREVIEW_TEXT']?></div>
									<div class="reviews-main-list-item__client">
										<div class="review-client__name"><?=$arReview['NAME']?></div>
										<?if($arReview['PROPERTIES']['REVIEW_CLIENT_ADD_OPTION']){?>
											<div class="review-client__optional"><?=$arReview['PROPERTIES']['REVIEW_CLIENT_ADD_OPTION']['VALUE']?></div>
										<?}?>
										<a href="/reviews/" class="btn btn_mid btn_round btn_primary review-client__all">Все отзывы</a>
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