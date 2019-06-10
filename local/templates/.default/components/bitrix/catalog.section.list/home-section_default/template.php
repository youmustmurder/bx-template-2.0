<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['SECTIONS']) {?>
    <section class="best-categories">
		<div class="container">
			<div class="row">
				<div class="col">
					<?if($APPLICATION->GetCurPage(false) === '/'){?>
                        <div class="best-categories__header">
                            <h2 class="best-categories__title"><?=$arParams['SECTION_TITLE'] ?: Loc::getMessage('CATEGORIES_SECTION_TITLE_DEFAULT')?></h2>
                            <a href="<?=$arParams['SECTION_LINK'] ?: Loc::getMessage('CATEGORIES_SECTION_LINK_DEFAULT', array('#SITE_DIR#' => SITE_DIR))?>"
                               class="link link_success link_icon-right best-categories__link-all">
                                <?=$arParams['SECTION_LINK_NAME'] ?: Loc::getMessage('CATEGORIES_SECTION_LINK_NAME_DEFAULT')?>
                                <span class="link__icon"><?=GetContentSvgIcon('arrow_right');?></span>
                            </a>
                        </div>
					<?}?>
					<div class="best-categories__grid best-categories-grid">
						<?$i = 1;
						foreach ($arResult['SECTIONS'] as $arSection){
                            $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT"));
                            $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
                            ?>
							<li class="best-categories-grid__card best-categories-grid-card best-categories-grid-card_<?=$i?>" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
								<a href="<?=$arSection['SECTION_PAGE_URL']?>">
									<img src="<?=GetNoPhoto()?>"
										 lazy-image="<?=$arSection['PICTURE']['SRC']?>"
										 class="best-categories-grid-card__image lazy-image"
										 alt="<?=$arSection['PICTURE']['ALT'] ? $arSection['PICTURE']['ALT'] : $arSection['NAME']?>"
										 title="<?=$arSection['PICTURE']['TITLE'] ? $arSection['PICTURE']['TITLE'] : $arSection['NAME']?>">
									<div class="best-categories-grid-card__name"><?=$arSection['NAME']?></div>
								</a>
							</li>
						<?$i++;
						}?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?}?>