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
                        <span class="link__icon"><?=GetContentSvgIcon('arrow_right');?></span>
                    </a>
					<div class="products__grid row justify-content-start">
						<?foreach ($arResult['ITEMS'] as $key => $arItem) {
                            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                            ?>
							<div class="col-lg-3 col-md-4 col-sm-6 col-12" >
                                <div class="products__item products-item" id="<?=$this->GetEditAreaId($arItem['ID']); ?>">
                                    <?if ($arItem['PROPERTIES']['PRODUCT_LABEL']['VALUE'] || $arItem['PROPERTIES']['PRODUCT_DISCOUNT']['VALUE']) {?>
                                        <ul class="products-item__labels">
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
										<img src="<?=GetNoPhoto()?>"
											 class="lazy-image"
											 lazy-image="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
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
                                               class="products-item__category"><?=$arItem['PARENT_SECTION']['NAME']?></a>
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
							</div>
						<?}?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?}?>