<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

global $arCurrentSetting;

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['ITEMS']) {?>
<section class="services services--grey">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="services__header">
					<h2 class="services__title"><?=$arParams['SECTION_TITLE'] ?: Loc::getMessage('SERVICES_SECTION_TITLE_DEFAULT')?></h2>
					<p class="services__text">
						Без кучи документов, поездок в банк и талончиков с номером очереди
					</p>
				</div>
				<ul class="grid grid--3column">
                    <?foreach ($arResult['ITEMS'] as $k => $arItem) {
                        ?>
                        <li class="grid__item <?=$k == 0 || $k == 1 ? 'grid__item--middle' : ''?>">
                            <a href="<?=$arItem['DETAIL_PAGE_URL']?>"
                               class="service<?=$k == 0 || $k == 1 ? ' service--middle' : ''?><?=$k == 0 ? ' service--left' : ''?><?=$k == 1 ? ' service--right' : ''?><?=$arItem['PROPERTIES']['DISPLAY_MODE']['VALUE_XML_ID'] == 'light' ? ' service--dark' : ''?>">
                                <div class="service__inner">
                                    <div class="service__title"><?=$arItem['NAME']?></div>
                                    <?if ($arItem['PREVIEW_TEXT']) {?>
                                        <div class="service__text"><?=$arItem['PREVIEW_TEXT']?></div>
                                    <?}?>
                                </div>
                                <img class="service__img"
                                     src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
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