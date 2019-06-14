<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

use Bitrix\Main\Localization\Loc,
    Bitrix\Main\Page\Asset;

Loc::loadMessages(__FILE__);

Asset::getInstance()->addJs('https://api-maps.yandex.ru/2.1?apikey=01cee7eb-c376-474b-bdf2-37af3d596be3&lang=ru_RU');

if ($arResult['ITEMS']) {?>
    <div class="col">
		<div class="filials-page">
			<div id="filials-page__map"></div>
			<ul class="branches">
				<? foreach ($arResult["ITEMS"] as $k => $arItem) {
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					$Yandex = explode(",", $arItem["PROPERTIES"]["C_MAP"]["VALUE"]);
					$Yandex_X = $Yandex[0];
					$Yandex_Y = $Yandex[1];
					?>
					<li class="branches__item branch"
						data-index="<?=$k++?>"
						data-name="<?=$arItem["NAME"]?>"
                        <?if ($arItem["PROPERTIES"]["C_MAP"]["VALUE"]) {?>
						    data-yandex-x="<?=$Yandex_X?>"
						    data-yandex-y="<?=$Yandex_Y?>"
                        <?}?>
						data-address="<?=$arItem["PROPERTIES"]["C_ADDRESS"]["VALUE"]?>"
						data-email="<?=$arItem["PROPERTIES"]["C_EMAIL"]["VALUE"]?>"
						data-phone="<?=$arItem["PROPERTIES"]["C_PHONE"]["VALUE"]?>">
						    <div class="branch__name"><?=$arItem["NAME"]?></div>
                            <div class="branch__info-wrap">
                                <ul class="branch__info-list">
                                    <?if ($arItem["PROPERTIES"]["C_ADDRESS"]["VALUE"] || $arItem["PROPERTIES"]["C_CITY"]["VALUE"]) { ?>
                                        <li class="branch-info-list__item branch-info">
                                            <span class="branch-info__name"><?=Loc::getMessage('CONTACT_PAGE_ADDRESS_TITLE')?>:</span>
                                            <span class="branch-info__value"><?=$arItem["PROPERTIES"]["C_CITY"]["VALUE"] ? $arItem["PROPERTIES"]["C_CITY"]["VALUE"] . ', ' : ''?><?= $arItem["PROPERTIES"]["C_ADDRESS"]["VALUE"]; ?></span>
                                        </li>
                                    <?}?>
                                    <?if ($arItem["PROPERTIES"]["C_PHONE"]["VALUE"]) { ?>
                                        <li class="branch-info-list__item branch-info">
                                            <span class="branch-info__name"><?=Loc::getMessage('CONTACT_PAGE_MAIN_PHONE_TITLE')?>:</span>
                                            <span class="branch-info__value">
                                                <a href="tel:<?=preg_replace('~[^0-9]+~', '', $arItem["PROPERTIES"]["C_PHONE"]["VALUE"])?>"
                                                   class="branch-info__link"><?=$arItem["PROPERTIES"]["C_PHONE"]["VALUE"]?></a>
                                            </span>
                                        </li>
                                    <?}?>
                                    <?if ($arItem["PROPERTIES"]["C_PHONES"]["VALUE"]) { ?>
                                        <li class="branch-info-list__item branch-info">
                                            <span class="branch-info__name"><?=Loc::getMessage('CONTACT_PAGE_PHONES_TITLE')?>:</span>
                                            <?foreach ($arItem["PROPERTIES"]["C_PHONES"]["VALUE"] as $value) { ?>
                                                <span class="branch-info__value">
                                                    <a href="tel:<?=preg_replace('~[^0-9]+~', '', $value)?>"
                                                       class="branch-info__link"><?=$value?></a>
                                                </span>
                                            <?}?>
                                        </li>
                                    <?}?>
                                    <?if ($arItem["PROPERTIES"]["C_EMAIL"]["VALUE"]) { ?>
                                        <li class="branch-info-list__item branch-info">
                                            <span class="branch-info__name"><?=Loc::getMessage('CONTACT_PAGE_EMAIL_TITLE')?>:</span>
                                            <span class="branch-info__value">
                                                <a href="mailto:<?=$arItem["PROPERTIES"]["C_EMAIL"]["VALUE"]?>"
                                                   class="branch-info__link"><?=$arItem["PROPERTIES"]["C_EMAIL"]["VALUE"]?></a>
                                            </span>
                                        </li>
                                    <?}?>
                                    <?if ($arItem["PROPERTIES"]["C_OPENING_HOURS"]["VALUE"]) { ?>
                                        <li class="branch-info-list__item branch-info">
                                            <span class="branch-info__name"><?=Loc::getMessage('CONTACT_PAGE_OPENING_HOURS_TITLE')?>:</span>
                                            <?foreach ($arItem["PROPERTIES"]["C_OPENING_HOURS"]["VALUE"] as $value) {?>
                                                <span class="branch-info__value"><?=$value?></span>
                                            <?}?>
                                        </li>
                                    <?}?>
                                </ul>
                            </div>
					</li>
                <?}?>
			</ul>
		</div>
	</div>
<? } ?>