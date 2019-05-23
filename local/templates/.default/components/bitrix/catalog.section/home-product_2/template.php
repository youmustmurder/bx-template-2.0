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
					<a href="#" class="link link_success link_icon-right products__link-all">
                        <?=$arParams['SECTION_LINK'] ?: Loc::getMessage('PRODUCTS_SECTION_LINK_DEFAULT')?>
						<svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 6C0 5.44772 0.447716 5 1 5H14.17L11.2935 2.11549C10.9048 1.7257 10.9053 1.09474 11.2945 0.705492C11.6841 0.315859 12.3159 0.315859 12.7055 0.705492L18 6L12.7055 11.2945C12.3159 11.6841 11.6841 11.6841 11.2945 11.2945C10.9053 10.9053 10.9048 10.2743 11.2935 9.88451L14.17 7H0.999998C0.447714 7 0 6.55228 0 6Z"/></svg>
					</a>
				</div>
				<div class="products__grid-wrap">
					<div class="grid grid-3column">
                        <?foreach ($arResult['ITEMS'] as $k => $arItem) {
                            switch ($k) {
                                case '0':?>
                                    <div class="grid__item grid__item-big">
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
                                                            <?foreach ($arItem['PROPERTIES']['PRODUCT_LABEL']['VALUE_XML_ID'] as $k => $XML_ID) {?>
                                                                <li class="label <?=$XML_ID == 'NEW' ? 'label_yellow' : 'label_blue'?>">
                                                                    <?=$arItem['PROPERTIES']['PRODUCT_LABEL']['VALUE'][$k]?></li>
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
                                            <a href="<??>" class="product__img">
                                                <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                                                     alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>">
                                            </a>
                                            <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="product__name"><?=$arItem['NAME']?></a>
                                            <div class="product__rating">
                                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M15.5915 17.6955L10.006 14.3393L4.41647 17.6978L5.88232 11.3485L0.960938 7.0705L7.45245 6.50252L10.0004 0.5L12.5465 6.4983L19.0426 7.0666L14.1247 11.3417L15.5915 17.6955Z" fill="#EFA32A"/></svg>
                                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M15.5915 17.6955L10.006 14.3393L4.41647 17.6978L5.88232 11.3485L0.960938 7.0705L7.45245 6.50252L10.0004 0.5L12.5465 6.4983L19.0426 7.0666L14.1247 11.3417L15.5915 17.6955Z" fill="#EFA32A"/></svg>
                                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M15.5915 17.6955L10.006 14.3393L4.41647 17.6978L5.88232 11.3485L0.960938 7.0705L7.45245 6.50252L10.0004 0.5L12.5465 6.4983L19.0426 7.0666L14.1247 11.3417L15.5915 17.6955Z" fill="#EFA32A"/></svg>
                                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M15.5915 17.6955L10.006 14.3393L4.41647 17.6978L5.88232 11.3485L0.960938 7.0705L7.45245 6.50252L10.0004 0.5L12.5465 6.4983L19.0426 7.0666L14.1247 11.3417L15.5915 17.6955Z" fill="#EFA32A"/></svg>
                                            </div>
                                            <?if ($arItem['CATEGORY']) {?>
                                                <div class="product__subtitle"><?=$arItem['CATEGORY']?></div>
                                            <?}?>
                                            <div class="products__price"><?=$arItem['PRICE']?><?=$arItem['CURRENCY'] ? ' ₽' : ''?></div>
                                            <?if ($arItem['PREVIEW_TEXT']) {?>
                                                <p class="products__text"><?=$arItem['PREVIEW_TEXT']?></p>
                                            <?}?>
                                        </div>
                                    </div>
                                    <?break;
                                default:?>
                                    <div class="grid__item">
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
                                                        <?foreach ($arItem['PROPERTIES']['PRODUCT_LABEL']['VALUE_XML_ID'] as $k => $XML_ID) {?>
                                                            <li class="label <?=$XML_ID == 'NEW' ? 'label_yellow' : 'label_blue'?>">
                                                                <?=$arItem['PROPERTIES']['PRODUCT_LABEL']['VALUE'][$k]?></li>
                                                        <?}?>
                                                    <?}?>
                                                </ul>
                                            <?}?>
                                            <div class="product__img">
                                                <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                                                     alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>">
											</div>
											<div class="product__info-wrap">
												<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="product__name"><?=$arItem['NAME']?></a>
												<?if ($arItem['CATEGORY']) {?>
													<div class="product__subtitle"><?=$arItem['CATEGORY']?></div>
												<?}?>
											</div>
                                            <div class="product__btns">
                                                <button class="product__btn" aria-label="<?=Loc::getMessage('PRODUCTS_SECTION_ADD_TO_FAVORITES')?>">
                                                    <?=GetContentSvgIcon('heart');?>
                                                </button>
                                                <button class="product__btn" aria-label="<?=Loc::getMessage('PRODUCTS_SECTION_ADD_TO_CART')?>">
                                                    <?=GetContentSvgIcon('cart');?>
                                                </button>
                                            </div>
                                            <div class="products__price"><?=$arItem['PRICE']?><?=$arItem['CURRENCY'] == 'Y' ? ' ₽' : ''?></div>
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