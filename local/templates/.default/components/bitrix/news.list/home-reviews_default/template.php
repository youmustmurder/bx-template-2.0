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
					<h2 class="reviews__title">Отзывы наших клиентов</h2>
					<a href="#" class="link link_success link_icon-right reviews__link-all">
						Показать все отзывы
						<?=GetContentSvgIcon('arrow_right');?>
					</a>
					<ul class="reviews__list reviews-list">
						<li class="reviews-list__item reviews-list-item">
							<div class="reviews-list-item__wrap">
								<p class="reviews-list-item__text">«Отличный ассортимент, позволяющий заказать нужные вещи в одном месте, хорошие акции, возможность оплатить часть заказа бонусами "Спасибо" от Сбербанка»</p>
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
								<p class="reviews-list-item__text">«Отличный ассортимент, позволяющий заказать нужные вещи в одном месте, хорошие акции, возможность оплатить часть заказа бонусами "Спасибо" от Сбербанка»</p>
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
								<p class="reviews-list-item__text">«Отличный ассортимент, позволяющий заказать нужные вещи в одном месте, хорошие акции, возможность оплатить часть заказа бонусами "Спасибо" от Сбербанка»</p>
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