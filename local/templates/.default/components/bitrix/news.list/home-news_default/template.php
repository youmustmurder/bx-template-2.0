<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

global $arCurrentSetting;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/script.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');
?>

<section class="section-news section-news_about"
	style="background-image: url('<?=GetCurDir(__DIR__)?>/uploads/about_back.png');">
	<?if($arResult['ITEMS']){?>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section-news__header">
						<h2 class="section-news__title">Последние новости</h2>
						<a href="#" class="link link_light link_icon-right section-news__link-all">
							Посмотреть все
							<span class="link__icon"><?=GetContentSvgIcon('arrow_right');?></span>
						</a>
					</div>
					<div class="section-news__list section-news-list">
						<?foreach ($arResult['ITEMS'] as $k => $arItem){?>
							<?
							$arItem['DATE_NEWS'] = explode(' ', $arItem['DISPLAY_ACTIVE_FROM']);

							$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
							$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
							?>
							<div class="section-news-list__item section-news__item section-news-item">
								<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="section-news-item__link" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
									<div class="section-news-item__date">
										<span class="section-news-item__day"><?=$arItem['DATE_NEWS'][0]?></span>
										<span class="section-news-item__mounth"><?=$arItem['DATE_NEWS'][1]?> <?=$arItem['DATE_NEWS'][2]?></span>
									</div>
									<div class="section-news-item__name">
										<span><?=$arItem['NAME']?></span>
									</div>
								</a>
							</div>
						<?}?>
					</div>
				</div>
			</div>
		</div>
    <?}?>
</section>