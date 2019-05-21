<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if (is_array($arResult) && !empty($arResult)) {?>
    <ul>
        <?foreach ($arResult['ITEMS'] as $i => $arItem) {?>
            <li>
                <a <?=$arItem['SELECTED'] ? 'class="active"' : ''?> href="<?=$arItem['LINK']?>"><?=$arItem['TEXT']?></a>
                <?if (is_array($arItem['ITEMS']) && !empty($arItem['ITEMS'])) {?>
                    <ul class="submenu">
                        <?foreach ($arItem['ITEMS'] as $item) {?>
                            <li>
                                <a <?=$item['SELECTED'] ? 'class="active"' : ''?> href="<?=$item['LINK']?>"><?=$item['TEXT']?></a>
                            </li>
                        <?}?>
                    </ul>
                <?}?>
            </li>
        <?}?>
        <?if($arResult['SUB_ITEMS']) {?>
            <li class="more__menu more-menu">
                <a href="#" class="more-menu__link"><span class="menu__dots"></span><?=Loc::getMessage('MORE_TITLE')?></a>
                <ul class="more-menu__submenu">
                    <?foreach ($arResult['SUB_ITEMS'] as $k => $arItem){?>
                        <?if($arItem['TEXT'] || $arItem['LINK']){?>
                            <li>
                                <a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
                            </li>
                        <?}?>
                    <?}?>
                </ul>
            </li>
        <?}?>
    </ul>
<?}?>