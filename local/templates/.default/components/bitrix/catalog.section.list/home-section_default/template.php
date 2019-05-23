<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['SECTIONS']) {?>
    <section class="section-home section-categories section-categories__1">
    <?if ($arResult['SECTIONS']) {?>
        <?if($APPLICATION->GetCurPage(false) === '/'){?>
            <div class="section-title">
                <div class="container">
                    <div class="row justify-content-md-between justify-content-sm-start align-items-end align-items-md-center">
                        <div class="col-auto">
                            <h2><?=$arParams['SECTION_TITLE'] ?: Loc::getMessage('CATEGORIES_SECTION_TITLE_DEFAULT')?></h2>
                        </div>
                        <div class="col-auto">
                            <a href="<?=SITE_DIR?>catalog/" class="btn btn-link">
                                <?=$arParams['SECTION_LINK'] ?: Loc::getMessage('CATEGORIES_SECTION_LINK_DEFAULT')?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?}?>
        <div class="container">
            <div class="container-section container-section--popular">
                <?$i = 1;
                foreach ($arResult['SECTIONS'] as $arSection){?>
                    <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="section-item item-<?=$i?>" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
                        <div class="section-item__image">
                            <img
                                src="<?=$arSection['PICTURE']['SRC']?>"
                                alt="<?=$arSection['PICTURE']['ALT'] ? $arSection['PICTURE']['ALT'] : $arSection['NAME']?>"
                                title="<?=$arSection['PICTURE']['TITLE'] ? $arSection['PICTURE']['TITLE'] : $arSection['NAME']?>">
                        </div>
                        <div class="section-item__name"><?=$arSection['NAME']?></div>
                    </a>
                <?$i++;
                }?>
            </div>
        </div>
    <?}?>
</section>
<?}?>