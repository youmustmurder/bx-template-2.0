<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['ITEMS']) {?>
<section class="reviews">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="reviews__inner">
					<h2 class="reviews__title"><?=$arParams['BLOCK_TITLE'] ?: Loc::getMessage('HOME_REVIEWS_DEFAULT_BLOCK_TITLE')?></h2>
					<a href="#" class="link link_bold link_success link_icon-right reviews__link-all">
                        <?=$arParams['SECTION_LINK_NAME'] ?: Loc::getMessage('HOME_REVIEWS_3_SECTION_LINK_NAME')?>
						<span class="link__icon"><?=GetContentSvgIcon('arrow_right');?></span>
					</a>
					<ul class="reviews__list reviews-list">
                        <?foreach ($arResult['ITEMS'] as $arItem) {?>
                            <li class="reviews-list__item reviews-list-item">
                                <div class="reviews-list-item__wrap">
                                    <div class="reviews-list-item__text"><?=$arItem['NAME']?></div>
                                    <div class="reviews-list-item__author-wrap">
                                        <div class="reviews-list-item__author">АЛЕКСАНДР ДУКАЛИС</div>
                                        <div class="reviews-list-item__proff">Маркетинг-директор «Газпром»</div>
                                        <div class="reviews-list-item__img">
                                            <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                                                 alt="<?=Loc::getMessage('HOME_REVIEWS_DEFAULT_REVIEW_IMAGE_ALT')?>">
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?}?>
						<li class="reviews-list__item reviews-list-item">
							<div class="reviews-list-item__wrap">
								<div class="reviews-list-item__text">«Отличный ассортимент, позволяющий заказать нужные вещи в одном месте, хорошие акции, возможность оплатить часть заказа бонусами "Спасибо" от Сбербанка»</div>
								<div class="reviews-list-item__author-wrap">
									<div class="reviews-list-item__author">АЛЕКСАНДР ДУКАЛИС</div>
									<div class="reviews-list-item__proff">Маркетинг-директор «Газпром»</div>
									<div class="reviews-list-item__img">
										<img src="<?=GetCurDir(__DIR__)?>/uploads/author1.png" alt="АЛЕКСАНДР ДУКАЛИС">
									</div>
								</div>
							</div>
						</li>
						<li class="reviews-list__item reviews-list-item">
							<div class="reviews-list-item__wrap">
								<div class="reviews-list-item__text">«Отличный ассортимент, позволяющий заказать нужные вещи в одном месте, хорошие акции, возможность оплатить часть заказа бонусами "Спасибо" от Сбербанка»</div>
								<div class="reviews-list-item__author-wrap">
									<div class="reviews-list-item__author">АЛЕКСАНДР ДУКАЛИС</div>
									<div class="reviews-list-item__proff">Маркетинг-директор «Газпром»</div>
									<div class="reviews-list-item__img">
										<img src="<?=GetCurDir(__DIR__)?>/uploads/author1.png" alt="АЛЕКСАНДР ДУКАЛИС">
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<?}?>