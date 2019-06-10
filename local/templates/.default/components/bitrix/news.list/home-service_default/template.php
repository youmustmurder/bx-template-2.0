<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

global $arCurrentSetting;

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
				<ul class="services__list service-list">
                    <?foreach ($arResult['ITEMS'] as $k => $arItem) {
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
                        ?>
                        <li class="service-list__item service-list-item <?=$k == 0 || $k == 1 ? 'service-list-item_middle' : ''?>" >
                            <a href="<?=$arItem['DETAIL_PAGE_URL']?>"
                               id="<?=$this->GetEditAreaId($arItem['ID']);?>"
                               class="service<?=$k == 0 || $k == 1 ? ' service_middle' : ''?><?=$k == 0 ? ' service_left' : ''?><?=$k == 1 ? ' service_right' : ''?><?=$arItem['PROPERTIES']['DISPLAY_MODE']['VALUE_XML_ID'] != 'dark' ? ' service_dark' : ''?>">
                                <div class="service__inner">
                                    <div class="service__title"><?=$arItem['NAME']?></div>
                                    <?if ($arItem['PREVIEW_TEXT']) {?>
                                        <div class="service__text"><?=$arItem['PREVIEW_TEXT']?></div>
                                    <?}?>
                                </div>
								<img src="<?=GetNoPhoto()?>"
									 class="service__img"
									 lazy-image="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                                     alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>">
                            </a>
                        </li>
                    <?}?>
				</ul>
			</div>
		</div>
	</div>
</section>
<?}?>