<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['ITEMS']) {?>
<section class="reviews">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="reviews__inner">
					<h2 class="reviews__title"><?=$arParams['BLOCK_TITLE'] ?: Loc::getMessage('HOME_REVIEWS_1_BLOCK_TITLE')?></h2>
					<div class="reviews__logos-wrap">
						<div class="reviews__logos reviews-logos">
							<?foreach ($arResult['ITEMS'] as $k => $arItem) {?>
								<div class="reviews-logos__item" indexDesc="<?=$k?>">
                                    <?if ($arItem['PROPERTIES']['REVIEW_CLIENT_LOGO']['SRC']) {?>
										<img class="lazy-image"
											lazy-image="<?=$arItem['PROPERTIES']['REVIEW_CLIENT_LOGO']['SRC']?>"
                                            alt="<?=Loc::getMessage('HOME_REVIEWS_1_REVIEW_IMAGE_ALT')?>">
                                    <?}?>
								</div>
							<?}?>
						</div>
					</div>
					<div class="reviews__desc reviews-desc">
                        <?foreach ($arResult['ITEMS'] as $k => $arItem) {?>
                            <div class="reviews-desc__item reviews-desc-item" indexDesc="<?=$k?>">
                                <p class="reviews-desc-item__text"><?=$arItem['PREVIEW_TEXT']?></p>
                                <div class="reviews-desc-item__title"><?=$arItem['NAME']?></div>
                                <?if ($arItem['PROPERTIES']['REVIEW_CLIENT_DATE']['VALUE']) {?>
                                    <div class="reviews-desc-item__date"><?=$arItem['PROPERTIES']['REVIEW_CLIENT_DATE']['VALUE']?></div>
                                <?}?>
                                <a href="<?=$arParams['SECTION_LINK'] ?: Loc::getMessage('HOME_REVIEWS_1_SECTION_LINK_DEFAULT', array('#SITE_DIR#' => SITE_DIR))?>"
                                   class="link link_light link_icon-right reviews-desc-item__link">
                                    <?=$arParams['SECTION_LINK_NAME'] ?: Loc::getMessage('HOME_REVIEWS_1_SECTION_LINK_NAME')?>
                                    <span class="link__icon"><?=GetContentSvgIcon('arrow_right');?></span>
                                </a>
                            </div>
                        <?}?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?}?>