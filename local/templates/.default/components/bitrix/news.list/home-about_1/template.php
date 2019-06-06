<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>

<div class="around">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-7">
                <div class="around__info">
                    <h2 class="around__title"><?=$arParams['BLOCK_TITLE'] ?: Loc::getMessage('HOME_ABOUT_1_BLOCK_TITLE')?></h2>
                    <div class="around__text">
                        <?$APPLICATION->IncludeFile(
                            "/include/".SITE_ID."/content/home/home-about_text.php",
                            array(),
                            array(
                                "SHOW_BORDER" => true,
                                "MODE" => "html"
                            ));
                        ?>
                    </div>
                    <a href="<?=$arParams['SECTION_LINK'] ?: Loc::getMessage('HOME_ABOUT_1_SECTION_LINK_DEFAULT', array('#SITE_DIR#' => SITE_DIR))?>"
                       class="link link_success link_icon-right around__link-all">
                        <?=$arParams['SECTION_LINK_NAME'] ?: Loc::getMessage('HOME_ABOUT_1_SECTION_LINK_NAME')?>
                        <span class="link__icon"><?=GetContentSvgIcon('arrow_right');?></span>
                    </a>
                </div>
            </div>
            <div class="col-12 col-sm-5">
                <?if ($arResult['ITEMS']) {?>
                    <div class="around__blocks">
                        <?foreach ($arResult['ITEMS'] as $arItem) {
                            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT"));
                            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
                            ?>
                            <div class="around__block around-block"
                                 id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                                <div class="around__pic">
                                    <img src="<?=$arItem['PICTURE']?>" alt="<?=$arItem['NAME']?>">
                                </div>
                                <div class="around__desc">
                                    <div class="around__desc-title"><?=$arItem['NAME']?></div>
                                    <?if ($arItem['PREVIEW_TEXT']) {?>
                                        <div class="around__desc-text"><?=$arItem['PREVIEW_TEXT']?></div>
                                    <?}?>
                                </div>
                            </div>
                        <?}?>
                    </div>
                <?}?>
            </div>
        </div>
    </div>
</div>