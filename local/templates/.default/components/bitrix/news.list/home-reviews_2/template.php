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
					<h2 class="reviews__title"><?=$arParams['BLOCK_TITLE'] ?: Loc::getMessage('HOME_REVIEWS_2_BLOCK_TITLE')?></h2>
					<div class="reviews__logos reviews-logos">
                        <?foreach ($arResult['ITEMS'] as $k => $arItem) {?>
                            <div class="reviews-logos__item" indexDesc="<?=$k?>">
                                <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                                     alt="<?=Loc::getMessage('HOME_REVIEWS_2_REVIEW_IMAGE_ALT')?>">
                            </div>
                        <?}?>
					</div>
					<div class="reviews__desc reviews-desc">
                        <?foreach ($arResult['ITEMS'] as $k => $arItem) {?>
                            <div class="reviews-desc__item reviews-desc-item" indexDesc="<?=$k?>">
                                <p class="reviews-desc-item__text"><?=$arItem['PREVIEW_TEXT']?></p>
                                <div class="reviews-desc-item__title"><?=$arItem['NAME']?></div>
                                <?if ($arItem['PROPERTIES']['REVIEW_CLIENT_DATE']['VALUE']) {?>
                                    <div class="reviews-desc-item__date"><?=$arItem['PROPERTIES']['REVIEW_CLIENT_DATE']['VALUE']?></div>
                                <?}?>
                                <a href="<?=$arParams['SECTION_LINK'] ?: Loc::getMessage('HOME_REVIEWS_2_SECTION_LINK_DEFAULT', array('#SITE_DIR#' => SITE_DIR))?>"
                                   class="btn__link btn__link--bold btn__link--white btn__link--icon-r reviews-desc-item__link">
                                    <?=$arParams['SECTION_LINK_NAME'] ?: Loc::getMessage('HOME_REVIEWS_2_SECTION_LINK_NAME')?>
                                    <?=GetContentSvgIcon('arrow-right');?>
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