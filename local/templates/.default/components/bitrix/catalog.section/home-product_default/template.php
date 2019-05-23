<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

?>

<section class="section-home section-products section-products__1">
<?if($arResult['ITEMS']){?>
<div class="section-title">
	<div class="container">
		<div class="row justify-content-md-between justify-content-sm-start align-items-end align-items-md-center">
			<div class="col-auto">
				<h2><?=$arParams['SECTION_TITLE'] ? $arParams['SECTION_TITLE'] : GetMessage('SECTION_TITLE_DEFAULT')?></h2>
			</div>
			<div class="col-auto">
				<a href="/catalog/" class="btn btn-link"><?=$arParams['SECTION_LINK'] ? $arParams['SECTION_LINK'] : GetMessage('SECTION_LINK_DEFAULT')?></a>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row justify-content-start">
		<?foreach ($arResult['ITEMS'] as $key => $arProduct){
			$this->AddEditAction($arProduct['ID'], $arProduct['EDIT_LINK'], CIBlock::GetArrayByID($arProduct["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arProduct['ID'], $arProduct['DELETE_LINK'], CIBlock::GetArrayByID($arProduct["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

			$labelProduct = is_array($arProduct['PROPERTIES']['PRODUCT_LABEL']['VALUE_XML_ID']) ? 'label__' . $arProduct['PROPERTIES']['PRODUCT_LABEL']['VALUE_XML_ID'][0] : false;
			?>
			<div class="product__item col-lg-3 col-md-4 col-sm-6 col-12 <?=$arProduct['PRODUCT_LABEL']?>" id="<?=$this->GetEditAreaId($arProduct['ID']);?>">
				<div class="product__item-image">
					<a href="<?=$arProduct['DETAIL_PAGE_URL']?>" class="product__item-link">
						<img lazy-images="<?=$arProduct['PREVIEW_PICTURE']['SRC']?>"
							 alt="<?=$arProduct['PREVIEW_PICTURE']['ALT'] ? $arProduct['PREVIEW_PICTURE']['ALT'] : $arProduct['NAME']?>"
							 title="<?=$arProduct['PREVIEW_PICTURE']['TITLE'] ? $arProduct['PREVIEW_PICTURE']['TITLE'] : $arProduct['NAME']?>">
					</a>
				</div>
				<div class="product__item-desc">
					<a href="<?=$arProduct['DETAIL_PAGE_URL']?>" class="product__item-name"><?=$arProduct['NAME']?></a>
					<?if(is_array($arProduct['PARENT_SECTION'])){?>
						<a href="<?=$arProduct['PARENT_SECTION']['SECTION_PAGE_URL']?>" class="product__item-category"><?=$arProduct['PARENT_SECTION']['NAME']?></a>
					<?}?>
				</div>

				<?if(strlen($arProduct['PROPERTIES']['PRODUCT_PRICE']['VALUE']) > 0){?>
					<div class="product__item-price">
						<div class="product-price price__new"><?=number_format($arProduct['PROPERTIES']['PRODUCT_PRICE']['VALUE'], 0, '', ' ')?></div>

						<?if(strlen($arProduct['PROPERTIES']['PRODUCT_OLD_PRICE']['VALUE']) > 0){?>
							<div class="product-price price__old"><?=number_format($arProduct['PROPERTIES']['PRODUCT_OLD_PRICE']['VALUE'], 0, '', ' ')?></div>
						<?}?>
					</div>
				<?}?>
			</div>
		<?}?>
	</div>
</div>
<?}?>
</section>