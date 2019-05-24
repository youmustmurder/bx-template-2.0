<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

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
			</div>
		</div>
        <div class="row">
            <?foreach ($arResult['ITEMS'] as $k => $arItem) {?>
                <div class="col-12 col-md-6 col-lg-4 services__item">
                    <div class="services__item-pic">
                        <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                             alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>">
                    </div>
                    <div class="services__item-title"><?=$arItem['NAME']?></div>
                    <?if ($arItem['PREVIEW_TEXT']) {?>
                        <div class="services__item-text"><?=$arItem['PREVIEW_TEXT']?></div>
                    <?}?>
                </div>
            <?}?>
        </div>
	</div>
</section>
<?}?>