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
						Без кучи документов, поездок в банк и талончиков с номером очереди
					</p>
				</div>
			</div>
		</div>
        <div class="row">
            <?foreach ($arResult['ITEMS'] as $k => $arItem) {?>
                <div class="col-12 col-md-6 col-lg-4 services__item service-item">
                    <div class="service-item__pic">
                        <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
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