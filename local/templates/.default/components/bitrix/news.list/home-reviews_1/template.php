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
					<a href="<?=$arParams['SECTION_LINK'] ?: Loc::getMessage('HOME_REVIEWS_1_SECTION_LINK_DEFAULT', array('#SITE_DIR#' => SITE_DIR))?>"
                       class="btn__link btn__link--bold btn__link--green btn__link--icon-r reviews__link-all">
                        <?=$arParams['BLOCK_TITLE'] ?: Loc::getMessage('HOME_REVIEWS_1_SECTION_LINK_NAME')?>
						<svg width="18" height="12" viewBox="0 0 18 12" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 6C0 5.44772 0.447716 5 1 5H14.17L11.2935 2.11549C10.9048 1.7257 10.9053 1.09474 11.2945 0.705492C11.6841 0.315859 12.3159 0.315859 12.7055 0.705492L18 6L12.7055 11.2945C12.3159 11.6841 11.6841 11.6841 11.2945 11.2945C10.9053 10.9053 10.9048 10.2743 11.2935 9.88451L14.17 7H0.999998C0.447714 7 0 6.55228 0 6Z"></path></svg>
					</a>
					<div class="grid grid--3column">
                        <?foreach ($arResult['ITEMS'] as $k => $arItem) {?>
                            <div class="grid__item">
                                <div class="reviews__post reviews-post">
                                    <p class="reviews-post__text"><?=$arItem['PREVIEW_TEXT']?></p>
                                    <div class="reviews-post__author-wrap">
                                        <div class="reviews-post__author__fullname"><?=$arItem['NAME']?></div>
                                        <?if ($arItem['PROPERTIES']['REVIEW_CLIENT_ADD_OPTION']['VALUE']) {?>
                                            <div class="reviews-post__author__proff"><?=$arItem['PROPERTIES']['REVIEW_CLIENT_ADD_OPTION']['VALUE']?></div>
                                        <?}?>
                                        <div class="reviews-post__author__img">
                                            <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                                                 alt="<?=Loc::getMessage('HOME_REVIEWS_1_REVIEW_IMAGE_ALT')?>">
                                        </div>
                                    </div>
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