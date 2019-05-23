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
                        <a href="#" class="btn__link btn__link--bold btn__link--green btn__link--icon-r best-categories__link-all">
                            <?=$arParams['SECTION_LINK'] ?: Loc::getMessage('CATEGORIES_SECTION_LINK_DEFAULT')?>
                            <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 6C0 5.44772 0.447716 5 1 5H14.17L11.2935 2.11549C10.9048 1.7257 10.9053 1.09474 11.2945 0.705492C11.6841 0.315859 12.3159 0.315859 12.7055 0.705492L18 6L12.7055 11.2945C12.3159 11.6841 11.6841 11.6841 11.2945 11.2945C10.9053 10.9053 10.9048 10.2743 11.2935 9.88451L14.17 7H0.999998C0.447714 7 0 6.55228 0 6Z"/></svg>
                        </a>
                    </div>
                    <ul class="best-categories__grid best-categories-grid">
                        <?foreach ($arResult['SECTIONS'] as $k => $arSection) {
                            switch ($k){
                                case '1':?>
                                    <li class="best-categories-grid__card best-categories-card best-categories-card--sale">
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
                                            <img class="best-categories-card__img"
                                                 src="<?=$arSection['PICTURE']['SRC']?>"
                                                 alt="<?=$arSection['PICTURE']['ALT']?>">
                                        </a>
                                    </li>
                                    <?break;
                                case '3':?>
                                    <li class="best-categories-grid__card best-categories-card best-categories-card--with-desc">
                                        <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="best-categories-grid__inner">
                                            <div class="best-categories-card__inner-desc">
                                                <div class="best-categories-card__title"><?=$arSection['NAME']?></div>
                                                <div class="best-categories-card__subtitle"><?=$arSection['SUBTITLE']?></div>
                                            </div>
                                            <img class="best-categories-card__img"
                                                 src="<?=$arSection['PICTURE']['SRC']?>"
                                                 alt="<?=$arSection['PICTURE']['ALT']?>">
                                            <?/*
                                            <p class="best-categories-card__text">Без кучи документов, поездок в банк и талончиков с номером очереди</p>
                                            */?>
                                        </a>
                                    </li>
                                    <?break;
                                default:?>
                                    <li class="best-categories-grid__card best-categories-card">
                                        <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="best-categories-grid__inner">
                                            <div class="best-categories-card__title"><?=$arSection['NAME']?></div>
                                            <img class="best-categories-card__img"
                                                 src="<?=$arSection['PICTURE']['SRC']?>"
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