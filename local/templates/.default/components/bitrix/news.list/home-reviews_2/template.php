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
					<a href="<?=$arParams['SECTION_LINK'] ?: Loc::getMessage('HOME_REVIEWS_2_SECTION_LINK_DEFAULT', array('#SITE_DIR#' => SITE_DIR))?>"
                       class="link link_success link_icon-right reviews__link-all">
                        <?=$arParams['SECTION_LINK_NAME'] ?: Loc::getMessage('HOME_REVIEWS_2_SECTION_LINK_NAME')?>
						<span class="link__icon"><?=GetContentSvgIcon('arrow_right');?></span>
					</a>
					<ul class="reviews__list reviews-list">
                        <?foreach ($arResult['ITEMS'] as $arItem) {
                            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                            ?>
                            <li class="reviews-list__item reviews-list-item">
                                <div class="reviews-list-item__wrap" id="<?= $this->GetEditAreaId($arItem['ID'])?>">
                                    <div class="reviews-list-item__text"><?=$arItem['PREVIEW_TEXT']?></div>
                                    <div class="reviews-list-item__author-wrap">
                                        <div class="reviews-list-item__author"><?=$arItem['NAME']?></div>
                                        <?if ($arItem['PROPERTIES']['REVIEW_CLIENT_ADD_OPTION']) {?>
                                            <div class="reviews-list-item__proff"><?=$arItem['PROPERTIES']['REVIEW_CLIENT_ADD_OPTION']['VALUE']?></div>
                                        <?}?>
                                        <div class="reviews-list-item__img">
                                            <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                                                 alt="<?=Loc::getMessage('HOME_REVIEWS_2_REVIEW_IMAGE_ALT')?>">
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?}?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<?}?>