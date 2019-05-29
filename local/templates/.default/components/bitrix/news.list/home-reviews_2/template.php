<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['ITEMS']) {?>
<div class="rewards">
    <div class="container">
        <div class="row">
            <div class="col-12">
				<div class="rewards__wrap">
					<h2 class="rewards__title"><?=$arParams['BLOCK_TITLE'] ?: Loc::getMessage('HOME_REVIEWS_3_BLOCK_TITLE')?></h2>
					<a href="<?=$arParams['SECTION_LINK'] ?: Loc::getMessage('HOME_REVIEWS_3_SECTION_LINK_DEFAULT', array('#SITE_DIR#' => SITE_DIR))?>" class="link link_bold link_success link_icon-right reward__link-all">
						<?=$arParams['SECTION_LINK_NAME'] ?: Loc::getMessage('HOME_REVIEWS_3_SECTION_LINK_NAME')?>
						<?=GetContentSvgIcon('arrow_right');?>
					</a>
					<div class="rewards__items">
						<?foreach ($arResult['ITEMS'] as $k => $arItem) {?>
							<div class="rewards__item rewards-item">
								<div class="rewards-item__wrap">
									<?if ($arItem['PROPERTIES']['REVIEW_CLIENT_LOGO']['SRC']) {?>
										<div class="rewards-item__logo">
											<img src="<?=$arItem['PROPERTIES']['REVIEW_CLIENT_LOGO']['SRC']?>" alt="">
										</div>
									<?}?>
									<div class="rewards-item__letter" style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>);"></div>
									<div class="rewards-item__info">
										<div class="rewards-item__title"><?=$arItem['NAME']?></div>
										<?if ($arItem['PROPERTIES']['REVIEW_CLIENT_DATE']['VALUE']) {?>
											<div class="rewards-item__date"><?=$arItem['PROPERTIES']['REVIEW_CLIENT_DATE']['VALUE']?></div>
										<?}?>
									</div>
								</div>
							</div>
						<?}?>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<?}?>