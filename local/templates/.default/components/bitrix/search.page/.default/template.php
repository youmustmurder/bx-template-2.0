<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>

<div class="col">
	<form class="search-form" method="get" action="<?=$arResult["FORM_ACTION"]?>">
		<span class="search-form__icon"><?=GetContentSvgIcon('search');?></span>
		<input class="search-form__input"
			name="q"
			autocomplete="off"
			placeholder="<?=Loc::getMessage('SEARCH_PLACEHOLDER')?>"
			size="20">
		<button class="search-form__button" type="submit" title="Поиск"><?=GetContentSvgIcon('arrow_small_right');?></button>
	</form>
	<ul class="search-results">
		<li class="search-results__item search-results-item">
			<a href="#" class="link link_secondary search-results-item__link"><b>APPLE</b> iPad Wi-Fi 32GB Space Gray 2018 (MR7F2RU/A</a>
			<div class="search-results-item__prev">
				<b>Apple</b> iPad Wi-Fi 32GB Space Gray — такой мощный, что справляется с любыми задачами как полноценный компьютер, и, настолько компактный, чтобы было удобно ...
			</div>
		</li>
		<li class="search-results__item search-results-item">
			<a href="#" class="link link_secondary search-results-item__link"><b>APPLE</b> iPad Wi-Fi 32GB Space Gray 2018 (MR7F2RU/A</a>
			<div class="search-results-item__prev">
				<b>Apple</b> iPad Wi-Fi 32GB Space Gray — такой мощный, что справляется с любыми задачами как полноценный компьютер, и, настолько компактный, чтобы было удобно ...
			</div>
		</li>
		<li class="search-results__item search-results-item">
			<a href="#" class="link link_secondary search-results-item__link"><b>APPLE</b> iPad Wi-Fi 32GB Space Gray 2018 (MR7F2RU/A</a>
			<div class="search-results-item__prev">
				<b>Apple</b> iPad Wi-Fi 32GB Space Gray — такой мощный, что справляется с любыми задачами как полноценный компьютер, и, настолько компактный, чтобы было удобно ...
			</div>
		</li>
	</ul>
</div>

<?/*
<div class="search__page">
    <div class="search__page-panel">
        <?$APPLICATION->IncludeComponent(
            "bitrix:search.suggest.input",
            "",
            array(
                "NAME" => "q",
                "VALUE" => $arResult["REQUEST"]["~QUERY"],
                "INPUT_SIZE" => 40,
                "DROPDOWN_SIZE" => 10,
                "FILTER_MD5" => $arResult["FILTER_MD5"],
            ),
            $component, array("HIDE_ICONS" => "Y")
        );?>
    </div>
    <?if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])){?>
        <span class="search__notice">
            <?=Loc::getMessage("CT_BSP_KEYBOARD_WARNING", array("#query#"=>'<a href="'.$arResult["ORIGINAL_QUERY_URL"].'">'.$arResult["REQUEST"]["ORIGINAL_QUERY"].'</a>'))?>
        </span>
    <?}

    if($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false){
        if($arResult["ERROR_CODE"]!=0){?>
            <span class="search__notice"><?=GetMessage("SEARCH_ERROR")?></span>
            <?if(is_array($arResult["ERROR_TEXT"])){
                foreach ($arResult["ERROR_TEXT"] as $MESS){?>
                    <span class="search__notice search__notice-error"><?=$MESS?></span>
                <?}
            }
        }?>
        <span class="search__notice"><?=Loc::getMessage("SEARCH_CORRECT_AND_CONTINUE")?></span>
        <span class="search__notice"><?=Loc::getMessage("SEARCH_SINTAX")?><strong><?=Loc::getMessage("SEARCH_LOGIC")?></strong></span>
        <table border="0" cellpadding="5">
            <tr>
                <td align="center" valign="top"><?=Loc::getMessage("SEARCH_OPERATOR")?></td><td valign="top"><?=Loc::getMessage("SEARCH_SYNONIM")?></td>
                <td><?=Loc::getMessage("SEARCH_DESCRIPTION")?></td>
            </tr>
            <tr>
                <td align="center" valign="top"><?=Loc::getMessage("SEARCH_AND")?></td><td valign="top">and, &amp;, +</td>
                <td><?=Loc::getMessage("SEARCH_AND_ALT")?></td>
            </tr>
            <tr>
                <td align="center" valign="top"><?=Loc::getMessage("SEARCH_OR")?></td><td valign="top">or, |</td>
                <td><?=Loc::getMessage("SEARCH_OR_ALT")?></td>
            </tr>
            <tr>
                <td align="center" valign="top"><?=Loc::getMessage("SEARCH_NOT")?></td><td valign="top">not, ~</td>
                <td><?=Loc::getMessage("SEARCH_NOT_ALT")?></td>
            </tr>
            <tr>
                <td align="center" valign="top">( )</td>
                <td valign="top">&nbsp;</td>
                <td><?=Loc::getMessage("SEARCH_BRACKETS_ALT")?></td>
            </tr>
        </table>
    <?} elseif(count($arResult["SEARCH"]) > 0) {?>
        <div class="search__items-list">
            <?foreach($arResult["SEARCH"] as $arItem){?>
                <div class="search__item">
                    <a href="<?=$arItem["URL"]?>" class="search__item-name"><?=$arItem["TITLE_FORMATED"]?></a>
                    <div class="search__item-anons"><?=$arItem["BODY_FORMATED"]?></div>
                </div>
            <?}?>
        </div>
        <?if($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"]?>
    <?} else {?>
        <span class="search__notice"><?=Loc::getMessage("SEARCH_NOTHING_TO_FOUND");?></span>
    <?}?>
</div>