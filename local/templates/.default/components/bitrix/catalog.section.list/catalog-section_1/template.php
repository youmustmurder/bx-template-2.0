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
                    <ul class="best-categories__grid best-categories-grid">
                        <?foreach ($arResult['SECTIONS'] as $k => $arSection) {
                            $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT"));
                            $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
                            switch ($k){
                                case '1':?>
                                    <li class="best-categories-grid__card best-categories-card best-categories-card_sale" id="<?=$this->GetEditAreaId($arSection['ID']); ?>">
                                        <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="best-categories-grid__inner">
                                            <?if ($arSection['UF_SECTION_PERCENT'] || (intval($arSection['UF_SECTION_PERCENT']) > 0)) {?>
                                                <div class="best-categories-card__label best-categories-card-label">
                                                    <span class="best-categories-card-label__number">-<?=$arSection['UF_SECTION_PERCENT']?></span>
                                                    <span class="best-categories-card-label__percent">%</span>
                                                </div>
                                            <?}?>
                                            <div class="best-categories-card__inner-desc">
                                                <div class="best-categories-card__title"><?=$arSection['NAME']?></div>
                                                <div class="best-categories-card__subtitle"><?=$arSection['SUBTITLE']?></div>
                                            </div>
                                            <img class="best-categories-card__img lazy-image"
                                                 lazy-image="<?=$arSection['PICTURE']['SRC']?>"
                                                 alt="<?=$arSection['PICTURE']['ALT']?>">
                                        </a>
                                    </li>
                                    <?break;
                                case '3':?>
                                    <li class="best-categories-grid__card best-categories-card best-categories-card_with-desc" id="<?=$this->GetEditAreaId($arSection['ID']); ?>">
                                        <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="best-categories-grid__inner">
                                            <div class="best-categories-card__inner-desc">
                                                <div class="best-categories-card__title"><?=$arSection['NAME']?></div>
                                                <div class="best-categories-card__subtitle"><?=$arSection['SUBTITLE']?></div>
                                            </div>
                                            <img class="best-categories-card__img lazy-image"
												 lazy-image="<?=$arSection['PICTURE']['SRC']?>"
                                                 alt="<?=$arSection['PICTURE']['ALT']?>">
                                            <?if ($arSection['UF_ANONS']) {?>
                                                <p class="best-categories-card__text"><?=$arSection['UF_ANONS']?></p>
                                            <?}?>
                                        </a>
                                    </li>
                                    <?break;
                                default:?>
                                    <li class="best-categories-grid__card best-categories-card" id="<?=$this->GetEditAreaId($arSection['ID']); ?>">
                                        <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="best-categories-grid__inner">
                                            <div class="best-categories-card__title"><?=$arSection['NAME']?></div>
                                            <img class="best-categories-card__img lazy-image"
												 lazy-image="<?=$arSection['PICTURE']['SRC']?>"
                                                 alt="<?=$arSection['PICTURE']['ALT']?>">
                                            <div class="best-categories-card__subtitle"><?=$arSection['SUBTITLE']?></div>
                                        </a>
                                    </li>
                            <?}?>
                        <?}?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?}?>