<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['SECTIONS']) {?>
    <section class="best-categories">
		<div class="container">
			<div class="row">
				<div class="col">
					<?if($APPLICATION->GetCurPage(false) === '/'){?>
					<div class="best-categories__header">
							<h2 class="best-categories__title"><?=$arParams['SECTION_TITLE'] ? $arParams['SECTION_TITLE'] : GetMessage('CATEGORIES_SECTION_TITLE_DEFAULT')?></h2>
							<a href="#" class="link link_success link_icon-right best-categories__link-all">
								<?=$arParams['SECTION_LINK'] ? $arParams['SECTION_LINK'] : GetMessage('CATEGORIES_SECTION_LINK_DEFAULT')?>
							</a>
					</div>
					<?}?>
					<div class="best-categories__grid best-categories-grid">
						<?$i = 1;
						foreach ($arResult['SECTIONS'] as $arSection){?>
							<li class="best-categories-grid__card best-categories-grid-card best-categories-grid-card_<?=$i?>" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
								<a href="<?=$arSection['SECTION_PAGE_URL']?>">
									<div class="best-categories-grid-card__image-wrap">
										<img
											src="<?=$arSection['PICTURE']['SRC']?>"
											alt="<?=$arSection['PICTURE']['ALT'] ? $arSection['PICTURE']['ALT'] : $arSection['NAME']?>"
											title="<?=$arSection['PICTURE']['TITLE'] ? $arSection['PICTURE']['TITLE'] : $arSection['NAME']?>">
									</div>
									<div class="best-categories-grid-card__name"><?=$arSection['NAME']?></div>
								</a>
							</li>
						<?$i++;
						}?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?}?>