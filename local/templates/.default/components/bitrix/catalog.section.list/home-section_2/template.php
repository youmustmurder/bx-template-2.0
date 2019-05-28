<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['SECTIONS']) {?>
<div class="best-categories">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="best-categories__header">
					<h2 class="best-categories__title"><?=$arParams['SECTION_TITLE'] ?: Loc::getMessage('CATEGORIES_SECTION_TITLE_DEFAULT')?></h2>
					<a href="<?=SITE_DIR?>catalog/" class="btn__link btn__link--bold btn__link--green btn__link--icon-r best-categories__link-all">
                        <?=$arParams['SECTION_LINK'] ?: Loc::getMessage('CATEGORIES_SECTION_LINK_DEFAULT')?>
						<svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 6C0 5.44772 0.447716 5 1 5H14.17L11.2935 2.11549C10.9048 1.7257 10.9053 1.09474 11.2945 0.705492C11.6841 0.315859 12.3159 0.315859 12.7055 0.705492L18 6L12.7055 11.2945C12.3159 11.6841 11.6841 11.6841 11.2945 11.2945C10.9053 10.9053 10.9048 10.2743 11.2935 9.88451L14.17 7H0.999998C0.447714 7 0 6.55228 0 6Z"/></svg>
					</a>
				</div>
				<ul class="best-categories__cards best-categories-cards">
					<?foreach ($arResult['SECTIONS'] as $k => $arSection) {?>
						<li class="best-categories-cards__item best-categories-card">
							<a href="<?=$arSection['SECTION_PAGE_URL']?>" class="best-categories-card__link">
								<div class="best-categories-card__img">
									<img src="<?=$arSection['PICTURE']['SRC']?>"
										alt="<?=$arSection['PICTURE']['ALT']?>">
								</div>
								<div class="best-categories-card__info">
									<div class="best-categories-card__quantity">
										<?=$arSection['COUNT_ELEMENTS']?>
										<?=NumPluralForm($arSection['COUNT_ELEMENTS'], array(
												Loc::getMessage('CATEGORIES_SECTION_COUNT_ELEMENT_1'),
												Loc::getMessage('CATEGORIES_SECTION_COUNT_ELEMENT_2'),
												Loc::getMessage('CATEGORIES_SECTION_COUNT_ELEMENT_3')
										))?>
									</div>
									<div class="best-categories-card__title"><?=$arSection['NAME']?></div>
									<div class="best-categories-card__price"><?=$arSection['PRICE']?></div>
								</div>
							</a>
						</li>
                    <?}?>
				</ul>
			</div>
		</div>
	</div>
</div>
<?}?>