<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);
?>

<div class="col">
    <?if($arParams["DISPLAY_TOP_PAGER"]){?>
        <?=$arResult["NAV_STRING"]?>
    <?}?>
	<ul class="news-list">
        <?foreach ($arResult['ITEMS'] as $arItem) {
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <li class="news-list__item news-list-item">
                <a href="<?=$arItem['DETAIL_PAGE_URL']?>">
                    <div class="news-list-item__image">
                        <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                             title="<?=$arItem['PREVIEW_PICTURE']['TITLE'] ? $arItem['PREVIEW_PICTURE']['TITLE'] : $arItem['NAME']?>"
                             alt="<?=$arItem['PREVIEW_PICTURE']['ALT'] ? $arItem['PREVIEW_PICTURE']['ALT'] : $arItem['NAME']?>">
                    </div>
                    <div class="news-list-item__info">
                        <?if ($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]) {
                            $arItem['DATE_NEWS'] = explode(' ', $arItem['DISPLAY_ACTIVE_FROM']);?>
                            <div class="news-list-item__date">
                                <div class="news-list-item__day"><?=$arItem['DATE_NEWS'][0]?></div>
                                <div class="news-list-item__all-date"><?=$arItem['DATE_NEWS'][1]?> <?=$arItem['DATE_NEWS'][2]?></div>
                            </div>
                        <?}?>
                        <div class="news-list-item__name"><?=$arItem['NAME']?></div>
                        <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]){?>
                            <div class="news-list-item__desc">
                                <?=$arItem["PREVIEW_TEXT"]?>
                            </div>
                        <?}?>
                    </div>
                </a>
            </li>
        <?}?>
	</ul>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]){?>
        <?=$arResult["NAV_STRING"]?>
    <?}?>
</div>