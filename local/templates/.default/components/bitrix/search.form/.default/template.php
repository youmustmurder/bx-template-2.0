<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>

<form class="search__form" method="get" action="<?=$arResult["FORM_ACTION"]?>">
    <span class="icon__search"><?=GetContentSvgIcon('search');?></span>
    <input class="inp inp-search"
           name="q"
           autocomplete="off"
           placeholder="<?=Loc::getMessage('SEARCH_PLACEHOLDER')?>"
           size="20">
    <button class="btn-search" type="submit" title="Поиск"><?=GetContentSvgIcon('arrow_small_right');?></button>
</form>