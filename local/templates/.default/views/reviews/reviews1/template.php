<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

global $arCurrentSetting;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/bundle.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');
?>

<section class="reviews">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="reviews__header">
					<h2>Отзывы наших клиентов</h2>
					<a href="#" class="btn__link btn__link--bold btn__link--green btn__link--icon-r">
						Показать все отзывы
						<svg width="18" height="12" viewBox="0 0 18 12" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 6C0 5.44772 0.447716 5 1 5H14.17L11.2935 2.11549C10.9048 1.7257 10.9053 1.09474 11.2945 0.705492C11.6841 0.315859 12.3159 0.315859 12.7055 0.705492L18 6L12.7055 11.2945C12.3159 11.6841 11.6841 11.6841 11.2945 11.2945C10.9053 10.9053 10.9048 10.2743 11.2935 9.88451L14.17 7H0.999998C0.447714 7 0 6.55228 0 6Z"></path></svg>
					</a>
				</div>
				<div class="grid grid--3column">
					<div class="grid__item">
						<div class="reviews__post reviews-post">
							<p class="reviews-post__text">«Отличный ассортимент, позволяющий заказать нужные вещи в одном месте, хорошие акции, возможность оплатить часть заказа бонусами "Спасибо" от Сбербанка»</p>
							<div class="reviews-post__author-wrap">
								<div class="reviews-post__author__fullname">АЛЕКСАНДР ДУКАЛИС</div>
								<div class="reviews-post__author__proff">Маркетинг-директор «Газпром»</div>
								<div class="reviews-post__author__img">
									<img src="<?=GetCurDir(__DIR__)?>/uploads/author1.png" alt="АЛЕКСАНДР ДУКАЛИС">
								</div>
							</div>
						</div>
					</div>
					<div class="grid__item">
						<div class="reviews__post reviews-post">
							<p class="reviews-post__text">«Большой выбор товаров, интересные цены по акциям. Хорошо работает служба поддержки. Нет проблем с возвратом товара. С недавнего времени есть возможность заказывать товар хоть на 100 руб через их сеть боксов» </p>
							<div class="reviews-post__author-wrap">
								<div class="reviews-post__author__fullname">ЕЛЕНА ПИРОЖКОВА</div>
								<div class="reviews-post__author__proff">HR-менеджер «Deloitte»</div>
								<div class="reviews-post__author__img">
									<img src="<?=GetCurDir(__DIR__)?>/uploads/author1.png" alt="ЕЛЕНА ПИРОЖКОВА">
								</div>
							</div>
						</div>
					</div>
					<div class="grid__item">
						<div class="reviews__post reviews-post">
							<p class="reviews-post__text">«У вас есть почти всё, что меня интересует, хорошего и отличного качества, поэтому нет необходимости делать покупки в других интернет-магазинах»</p>
							<div class="reviews-post__author-wrap">
								<div class="reviews-post__author__fullname">ЕЛЕНА ПИРОЖКОВА</div>
								<div class="reviews-post__author__proff">Главный редактор Esquire</div>
								<div class="reviews-post__author__img">
									<img src="<?=GetCurDir(__DIR__)?>/uploads/author1.png" alt="ЕЛЕНА ПИРОЖКОВА">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>