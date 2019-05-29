<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if($arResult['ITEMS']){?>
<section class="products products_grey">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="products__wrap">
					<h2 class="products__title"><?=$arParams['SECTION_TITLE'] ?: Loc::getMessage('PRODUCTS_SECTION_TITLE_DEFAULT')?></h2>
					<a href="<?=SITE_DIR?>catalog/" class="link link_success link_icon-right products__link-all">
						<?=$arParams['SECTION_LINK'] ?: Loc::getMessage('PRODUCTS_SECTION_LINK_DEFAULT')?>
						<svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 6C0 5.44772 0.447716 5 1 5H14.17L11.2935 2.11549C10.9048 1.7257 10.9053 1.09474 11.2945 0.705492C11.6841 0.315859 12.3159 0.315859 12.7055 0.705492L18 6L12.7055 11.2945C12.3159 11.6841 11.6841 11.6841 11.2945 11.2945C10.9053 10.9053 10.9048 10.2743 11.2935 9.88451L14.17 7H0.999998C0.447714 7 0 6.55228 0 6Z"/></svg>
					</a>
					<div class="products__grid row justify-content-start">
						<?foreach ($arResult['ITEMS'] as $key => $arItem) {?>
							<div class="products__item products-item col-lg-3 col-md-4 col-sm-6 col-12">
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
								<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="products-item__image">
									<img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
										alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>"
										title="<?=$arItem['PREVIEW_PICTURE']['TITLE']?>">
									<button class="btn btn_mid btn_round btn_primary products-item__link">
										<?=$arParams['MESS_BTN_DETAIL'] ?: Loc::getMessage('PRODUCTS_SECTION_READ_MORE')?>
									</button>
								</a>
								<div class="products-item__desc">
									<a href="<?=$arItem['DETAIL_PAGE_URL']?>"
									class="products-item__name"><?=$arItem['NAME']?></a>
									<?if ($arItem['PARENT_SECTION']) {?>
										<a href="<?=$arItem['PARENT_SECTION']['SECTION_PAGE_URL']?>"
										class="product__item-category"><?=$arItem['PARENT_SECTION']['NAME']?></a>
									<?}?>
								</div>
								<?if ($arItem['PRICE'] || $arItem['OLD_PRICE']){?>
									<div class="products-item__price-wrap">
										<div class="products-item__price products-item__price_new">
											<?=$arItem['PRICE']['VALUE']?><?=$arItem['PRICE']['CURRENCY'] == 'Y' ? ' ₽' : ''?>
										</div>
										<?if ($arItem['OLD_PRICE']){?>
											<div class="products-item__price products-item__price_old">
												<?=$arItem['OLD_PRICE']['VALUE']?><?=$arItem['OLD_PRICE']['CURRENCY'] == 'Y' ? ' ₽' : ''?>
											</div>
										<?}?>
									</div>
								<?}?>
							</div>
						<?}?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?}?>