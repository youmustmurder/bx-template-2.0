<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['SECTIONS']) {?>
<div class="best-categories">
	<div class="container">
		<div class="row">
			<div class="col">
                <div class="best-categories__header">
                    <h2 class="best-categories__title"><?=$arParams['SECTION_TITLE'] ?: Loc::getMessage('CATEGORIES_SECTION_TITLE_DEFAULT')?></h2>
                    <a href="<?=$arParams['SECTION_LINK'] ?: Loc::getMessage('CATEGORIES_SECTION_LINK_DEFAULT', array('#SITE_DIR#' => SITE_DIR))?>"
                       class="link link_success link_icon-right best-categories__link-all">
                        <?=$arParams['SECTION_LINK_NAME'] ?: Loc::getMessage('CATEGORIES_SECTION_LINK_NAME_DEFAULT')?>
                        <span class="link__icon"><?=GetContentSvgIcon('arrow_right');?></span>
                    </a>
                </div>
				<ul class="best-categories__cards best-categories-cards">
					<?foreach ($arResult['SECTIONS'] as $k => $arSection) {
                        $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT"));
                        $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
                        ?>
						<li class="best-categories-cards__item best-categories-card" id="<?=$this->GetEditAreaId($arSection['ID']); ?>">
							<a href="<?=$arSection['SECTION_PAGE_URL']?>" class="best-categories-card__link">
								<div class="best-categories-card__img">
									<img src="<?=$arSection['PICTURE']['SRC']?>"
										alt="<?=$arSection['PICTURE']['ALT']?>">
								</div>
								<div class="best-categories-card__info">
									<div class="best-categories-card__quantity">
										<?=$arSection['COUNT_ELEMENTS']?>
										<?=NumPluralForm($arSection['COUNT_ELEMENTS'], array(
												Loc::getMessage('CATEGORIES_SECTION_COUNT_ELEMENT_1'),
												Loc::getMessage('CATEGORIES_SECTION_COUNT_ELEMENT_2'),
												Loc::getMessage('CATEGORIES_SECTION_COUNT_ELEMENT_3')
										))?>
									</div>
									<div class="best-categories-card__title"><?=$arSection['NAME']?></div>
									<div class="best-categories-card__price"><?=$arSection['PRICE']?></div>
								</div>
							</a>
						</li>
                    <?}?>
				</ul>
			</div>
		</div>
	</div>
</div>
<?}?>