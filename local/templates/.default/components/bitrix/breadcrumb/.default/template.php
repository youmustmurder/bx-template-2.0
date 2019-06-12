<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

if (empty($arResult)) {
    return;
}
ob_start();

if ($arResult) {?>
    <ul class="breadcrumbs">
        <?foreach ($arResult as $key => $arLink) { ?>
            <li class="breadcrumbs__item">
                <?
                if ($key == count($arResult) - 1) { ?>
                    <span><?= $arLink["TITLE"] ?></span>
                <? } else { ?>
                    <a href="<?= $arLink["LINK"] ?>"><?= $arLink["TITLE"] ?></a>
                <?
                } ?>
            </li>
        <?}?>
    </ul>
<?}
return ob_get_clean(); ?>
