<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

if (is_array($arResult) && !empty($arResult)) {?>
    <ul>
        <?foreach ($arResult as $i => $arItem) {?>
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
    </ul>
<?}?>