<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['ITEMS']) {?>
<section class="services services_grey">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="services__header">
					<h2 class="services__title"><?=$arParams['SECTION_TITLE'] ?: Loc::getMessage('SERVICES_SECTION_TITLE_DEFAULT')?></h2>
					<p class="services__text">
                        <?$APPLICATION->IncludeFile(
                            "/include/" . SITE_ID . "/content/home/home-services_text.php",
                            array(),
                            array(
                                "SHOW_BORDER" => true,
                                "MODE" => "text"
                            )
                        );?>
					</p>
				</div>
			</div>
		</div>
        <div class="row">
            <?foreach ($arResult['ITEMS'] as $k => $arItem) {
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="col-12 col-md-6 col-lg-4 services__item service-item"
                     id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="service-item__pic">
						<img class="lazy-image"
							 lazy-image="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                             alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>">
                    </div>
                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="service-item__title"><?=$arItem['NAME']?></a>
                    <?if ($arItem['PREVIEW_TEXT']) {?>
                        <div class="service-item__text"><?=$arItem['PREVIEW_TEXT']?></div>
                    <?}?>
                </div>
            <?}?>
        </div>
	</div>
</section>
<?}?>