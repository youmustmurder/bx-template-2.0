<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['ITEMS']) {?>
<section class="products products-grey">
	<div class="container">
		<div class="row">
			<div class="col">
                <div class="products__header">
                    <h2 class="products__title"><?=$arParams['SECTION_TITLE'] ?: Loc::getMessage('PRODUCTS_SECTION_TITLE_DEFAULT')?></h2>
                    <a href="<?=SITE_DIR?>catalog/" class="link link_success link_icon-right products__link-all">
                        <?=$arParams['SECTION_LINK'] ?: Loc::getMessage('PRODUCTS_SECTION_LINK_DEFAULT')?>
                        <span class="link__icon"><?=GetContentSvgIcon('arrow-more');?></span>
                    </a>
                </div>
				<div class="products__grid-wrap">
					<div class="grid grid_4column">
                        <?foreach ($arResult['ITEMS'] as $k => $arItem) {
                            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                            switch ($k) {
                                case '0':?>
                                    <div class="grid__item grid__item-big" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                                        <div class="product product-big">
                                            <div class="product__btns">
                                                <?if ($arItem['PROPERTIES']['PRODUCT_LABEL']['VALUE'] || $arItem['PROPERTIES']['PRODUCT_DISCOUNT']['VALUE']) {?>
                                                    <ul class="products__label">
                                                        <?if ($arItem['PROPERTIES']['PRODUCT_DISCOUNT']['VALUE']) {?>
                                                            <li class="label label_green">
                                                                <?=intval($arItem['PROPERTIES']['PRODUCT_DISCOUNT']['VALUE']) > 0 ?
                                                                    '-' . $arItem['PROPERTIES']['PRODUCT_DISCOUNT']['VALUE'] . '%' :
                                                                    $arItem['PROPERTIES']['PRODUCT_DISCOUNT']['VALUE']?>
                                                            </li>
                                                        <?}?>
                                                        <?if ($arItem['PROPERTIES']['PRODUCT_LABEL']['VALUE_XML_ID']) {?>
                                                            <?foreach ($arItem['PROPERTIES']['PRODUCT_LABEL']['VALUE_XML_ID'] as $i => $XML_ID) {?>
                                                                <li class="label <?=$XML_ID == 'NEW' ? 'label_yellow' : 'label_blue'?>">
                                                                    <?=$arItem['PROPERTIES']['PRODUCT_LABEL']['VALUE'][$i]?></li>
                                                            <?}?>
                                                        <?}?>
                                                    </ul>
                                                <?}?>
                                                <button class="product__btn" aria-label="<?=Loc::getMessage('PRODUCTS_SECTION_ADD_TO_FAVORITES')?>">
                                                    <?=GetContentSvgIcon('heart');?>
                                                </button>
                                                <button class="product__btn" aria-label="<?=Loc::getMessage('PRODUCTS_SECTION_ADD_TO_CART')?>">
                                                    <?=GetContentSvgIcon('cart');?>
                                                </button>
                                            </div>
                                            <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="product__img">
												<img class="lazy-image"
													 src="<?=GetNoPhoto()?>"
													 lazy-image="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                                                     alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>">
                                            </a>
                                            <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="product__name"><?=$arItem['NAME']?></a>
                                            <div class="product__rating">
                                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M15.5915 17.6955L10.006 14.3393L4.41647 17.6978L5.88232 11.3485L0.960938 7.0705L7.45245 6.50252L10.0004 0.5L12.5465 6.4983L19.0426 7.0666L14.1247 11.3417L15.5915 17.6955Z" fill="#EFA32A"/></svg>
                                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M15.5915 17.6955L10.006 14.3393L4.41647 17.6978L5.88232 11.3485L0.960938 7.0705L7.45245 6.50252L10.0004 0.5L12.5465 6.4983L19.0426 7.0666L14.1247 11.3417L15.5915 17.6955Z" fill="#EFA32A"/></svg>
                                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M15.5915 17.6955L10.006 14.3393L4.41647 17.6978L5.88232 11.3485L0.960938 7.0705L7.45245 6.50252L10.0004 0.5L12.5465 6.4983L19.0426 7.0666L14.1247 11.3417L15.5915 17.6955Z" fill="#EFA32A"/></svg>
                                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M15.5915 17.6955L10.006 14.3393L4.41647 17.6978L5.88232 11.3485L0.960938 7.0705L7.45245 6.50252L10.0004 0.5L12.5465 6.4983L19.0426 7.0666L14.1247 11.3417L15.5915 17.6955Z" fill="#EFA32A"/></svg>
                                            </div>
                                            <?if ($arItem['PARENT_SECTION']) {?>
                                                <div class="product__subtitle"><?=$arItem['PARENT_SECTION']['NAME']?></div>
                                            <?}?>
											<?if ($arItem['PRICE'] || $arItem['OLD_PRICE']){?>
												<div class="products__price-wrap">
													<div class="products__price products__price_new">
														<?=$arItem['PRICE']['VALUE']?><?=$arItem['PRICE']['CURRENCY'] == 'Y' ? ' ₽' : ''?>
													</div>
													<?if ($arItem['OLD_PRICE']){?>
														<div class="products__price products__price_old">
															<?=$arItem['OLD_PRICE']['VALUE']?><?=$arItem['OLD_PRICE']['CURRENCY'] == 'Y' ? ' ₽' : ''?>
														</div>
													<?}?>
												</div>
											<?}?>
                                            <?if ($arItem['PREVIEW_TEXT']) {?>
                                                <p class="products__text"><?=$arItem['PREVIEW_TEXT']?></p>
                                            <?}?>
                                        </div>
                                    </div>
                                    <?break;
                                default:?>
                                    <div class="grid__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                                        <div class="product">
                                            <?if ($arItem['PROPERTIES']['PRODUCT_LABEL']['VALUE'] || $arItem['PROPERTIES']['PRODUCT_DISCOUNT']['VALUE']) {?>
                                                <ul class="products__label">
                                                    <?if ($arItem['PROPERTIES']['PRODUCT_DISCOUNT']['VALUE']) {?>
                                                        <li class="label label_green">
                                                            <?=intval($arItem['PROPERTIES']['PRODUCT_DISCOUNT']['VALUE']) > 0 ?
                                                                '-' . $arItem['PROPERTIES']['PRODUCT_DISCOUNT']['VALUE'] . '%' :
                                                                $arItem['PROPERTIES']['PRODUCT_DISCOUNT']['VALUE']?>
                                                        </li>
                                                    <?}?>
                                                    <?if ($arItem['PROPERTIES']['PRODUCT_LABEL']['VALUE_XML_ID']) {?>
                                                        <?foreach ($arItem['PROPERTIES']['PRODUCT_LABEL']['VALUE_XML_ID'] as $i => $XML_ID) {?>
                                                            <li class="label <?=$XML_ID == 'NEW' ? 'label_yellow' : 'label_blue'?>">
                                                                <?=$arItem['PROPERTIES']['PRODUCT_LABEL']['VALUE'][$i]?></li>
                                                        <?}?>
                                                    <?}?>
                                                </ul>
                                            <?}?>
                                            <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="product__img">
												<img src="<?=GetNoPhoto()?>"
													 class="lazy-image"
													 lazy-image="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                                                     alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>">
                                            </a>
											<div class="product__info-wrap">
												<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="product__name"><?=$arItem['NAME']?></a>
												<?if ($arItem['PARENT_SECTION']) {?>
													<div class="product__subtitle"><?=$arItem['PARENT_SECTION']['NAME']?></div>
												<?}?>
											</div>
											<div class="product__actions">
												<button class="product__btn" aria-label="<?=Loc::getMessage('PRODUCTS_SECTION_ADD_TO_FAVORITES')?>">
													<?=GetContentSvgIcon('heart');?>
												</button>
												<?if ($arItem['PRICE'] || $arItem['OLD_PRICE']){?>
													<div class="products__price-wrap">
														<div class="products__price products__price_new">
															<?=$arItem['PRICE']['VALUE']?><?=$arItem['PRICE']['CURRENCY'] == 'Y' ? ' ₽' : ''?>
														</div>
														<?if ($arItem['OLD_PRICE']){?>
															<div class="products__price products__price_old">
																<?=$arItem['OLD_PRICE']['VALUE']?><?=$arItem['OLD_PRICE']['CURRENCY'] == 'Y' ? ' ₽' : ''?>
															</div>
														<?}?>
													</div>
												<?}?>
												<button class="product__btn" aria-label="<?=Loc::getMessage('PRODUCTS_SECTION_ADD_TO_CART')?>">
													<?=GetContentSvgIcon('cart');?>
												</button>
											</div>
                                        </div>
                                    </div>
                            <?}?>
                        <?}?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?}?>