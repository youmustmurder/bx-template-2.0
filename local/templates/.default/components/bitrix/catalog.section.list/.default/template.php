<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

if ($arResult['SECTIONS']) {?>
    <ul class="sub-category">
        <?foreach ($arResult['ITEMS'] as $k => $arItem) {?>
        <li class="sub-category__item sub-category-item">
            <a href="<?=$arItem['SECTION_PAGE_URL']?>">
                <div class="sub-category-item__image">
                    <img src="<?=GetNoPhoto()?>" lazy-image="<?=$arItem['PICTURE']['SRC']?>" alt="<?=$arItem['PICTURE']['ALT']?>">
                </div>
                <div class="sub-category-item__name"><?=$arItem['NAME']?></div>
            </a>
        </li>
        <?}?>
    </ul>
<?}?>