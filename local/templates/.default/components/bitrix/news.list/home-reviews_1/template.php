<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
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
					<h2 class="reviews__title"><?=$arParams['BLOCK_TITLE'] ?: Loc::getMessage('HOME_REVIEWS_3_BLOCK_TITLE')?></h2>
					<a href="<?=$arParams['SECTION_LINK'] ?: Loc::getMessage('HOME_REVIEWS_3_SECTION_LINK_DEFAULT', array('#SITE_DIR#' => SITE_DIR))?>"
                       class="btn__link btn__link--bold btn__link--green btn__link--icon-r reviews__link-all">
                        <?=$arParams['BLOCK_TITLE'] ?: Loc::getMessage('HOME_REVIEWS_3_SECTION_LINK_NAME')?>
                        <?=GetContentSvgIcon('arrow-more');?>
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