<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

?>

<?if($arResult['ITEMS']){?>
<section class="products products_grey">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="products__header">
					<h2 class="products__title"><?=$arParams['SECTION_TITLE'] ? $arParams['SECTION_TITLE'] : GetMessage('SECTION_TITLE_DEFAULT')?></h2>
					<a href="#" class="btn__link btn__link--bold btn__link--green btn__link--icon-r products__link-all">
						<?=$arParams['SECTION_LINK'] ?: Loc::getMessage('CATEGORIES_SECTION_LINK_DEFAULT')?>
						<svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 6C0 5.44772 0.447716 5 1 5H14.17L11.2935 2.11549C10.9048 1.7257 10.9053 1.09474 11.2945 0.705492C11.6841 0.315859 12.3159 0.315859 12.7055 0.705492L18 6L12.7055 11.2945C12.3159 11.6841 11.6841 11.6841 11.2945 11.2945C10.9053 10.9053 10.9048 10.2743 11.2935 9.88451L14.17 7H0.999998C0.447714 7 0 6.55228 0 6Z"/></svg>
					</a>
				</div>
				<div class="products__grid row justify-content-start">
					<?foreach ($arResult['ITEMS'] as $key => $arProduct){
						$this->AddEditAction($arProduct['ID'], $arProduct['EDIT_LINK'], CIBlock::GetArrayByID($arProduct["IBLOCK_ID"], "ELEMENT_EDIT"));
						$this->AddDeleteAction($arProduct['ID'], $arProduct['DELETE_LINK'], CIBlock::GetArrayByID($arProduct["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
						$labelProduct = is_array($arProduct['PROPERTIES']['PRODUCT_LABEL']['VALUE_XML_ID']) ? 'label__' . $arProduct['PROPERTIES']['PRODUCT_LABEL']['VALUE_XML_ID'][0] : false;
						?>
						<div class="products__item products-item col-lg-3 col-md-4 col-sm-6 col-12 <?=$arProduct['PRODUCT_LABEL']?>" id="<?=$this->GetEditAreaId($arProduct['ID']);?>">
							<a href="<?=$arProduct['DETAIL_PAGE_URL']?>" class="products-item__image">
								<img src="<?=$arProduct['PREVIEW_PICTURE']['SRC']?>"
										alt="<?=$arProduct['PREVIEW_PICTURE']['ALT'] ? $arProduct['PREVIEW_PICTURE']['ALT'] : $arProduct['NAME']?>"
										title="<?=$arProduct['PREVIEW_PICTURE']['TITLE'] ? $arProduct['PREVIEW_PICTURE']['TITLE'] : $arProduct['NAME']?>">
								<button class="btn btn_mid btn_round btn_primary products-item__link">Подробнее</button>
							</a>
							<div class="products-item__desc">
								<a href="<?=$arProduct['DETAIL_PAGE_URL']?>" class="products-item__name"><?=$arProduct['NAME']?></a>
								<?if(is_array($arProduct['PARENT_SECTION'])){?>
									<a href="<?=$arProduct['PARENT_SECTION']['SECTION_PAGE_URL']?>" class="product__item-category"><?=$arProduct['PARENT_SECTION']['NAME']?></a>
								<?}?>
							</div>
							<?if(strlen($arProduct['PROPERTIES']['PRODUCT_PRICE']['VALUE']) > 0){?>
								<div class="products-item__price-wrap">
									<div class="products-item__price products-item__price_new"><?=number_format($arProduct['PROPERTIES']['PRODUCT_PRICE']['VALUE'], 0, '', ' ')?></div>
									<?if(strlen($arProduct['PROPERTIES']['PRODUCT_OLD_PRICE']['VALUE']) > 0){?>
										<div class="products-item__price products-item__price_old"><?=number_format($arProduct['PROPERTIES']['PRODUCT_OLD_PRICE']['VALUE'], 0, '', ' ')?></div>
									<?}?>
								</div>
							<?}?>
						</div>
					<?}?>
				</div>
			</div>
		</div>
	</div>
</section>
<?}?>