<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

global $arCurrentSetting;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/script.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');
?>

<section class="products products--grey">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="products__header">
					<h2 class="products__title">Популярные товары</h2>
					<a href="#" class="btn__link btn__link--bold btn__link--green btn__link--icon-r products__link-all">
						Перейти в каталог
						<svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 6C0 5.44772 0.447716 5 1 5H14.17L11.2935 2.11549C10.9048 1.7257 10.9053 1.09474 11.2945 0.705492C11.6841 0.315859 12.3159 0.315859 12.7055 0.705492L18 6L12.7055 11.2945C12.3159 11.6841 11.6841 11.6841 11.2945 11.2945C10.9053 10.9053 10.9048 10.2743 11.2935 9.88451L14.17 7H0.999998C0.447714 7 0 6.55228 0 6Z"/></svg>
					</a>
				</div>
				<div class="products__grid-wrap">
					<div class="grid grid--3column">
						<div class="grid__item grid__item--big">
							<div class="product product--big">
								<div class="product__btns">
									<ul class="products__label">
										<li class="label label--blue">Хит продаж</li>
									</ul>
									<button class="product__btn" aria-label="В избранное">
										<?=GetContentSvgIcon('heart');?>
									</button>
									<button class="product__btn" aria-label="Купить">
									<?=GetContentSvgIcon('cart');?>
									</button>
								</div>
								<div class="product__img">
									<img class="" src="<?=GetCurDir(__DIR__)?>/uploads/product1.png" alt="молоко простоквашино">
								</div>
								<a href="#" class="product__name">молоко простоквашино</a>
								<div class="product__rating">
									<svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M15.5915 17.6955L10.006 14.3393L4.41647 17.6978L5.88232 11.3485L0.960938 7.0705L7.45245 6.50252L10.0004 0.5L12.5465 6.4983L19.0426 7.0666L14.1247 11.3417L15.5915 17.6955Z" fill="#EFA32A"/></svg>
								</div>
								<div class="product__subtitle">1,5 литра</div>
								<div class="products__price">54 ₽</div>
								<p class="products__text">Без кучи документов, поездок в банк и талончиков  с номером очереди</p>
							</div>
						</div>
						<div class="grid__item">
							<div class="product">
								<ul class="products__label">
									<li class="label label--yellow">Новинка</li>
									<li class="label label--green">-12%</li>
								</ul>
								<div class="product__img">
									<img src="<?=GetCurDir(__DIR__)?>/uploads/product2.png" alt="молоко простоквашино">
								</div>
								<a href="#" class="product__name">молоко простоквашино</a>
								<div class="product__subtitle">1,5 литра</div>
								<div class="product__btns">
									<button class="product__btn" aria-label="В избранное">
										<?=GetContentSvgIcon('heart');?>
									</button>
									<button class="product__btn" aria-label="Купить">
										<?=GetContentSvgIcon('cart');?>
									</button>
								</div>
								<div class="products__price">54 ₽</div>
							</div>
						</div>
						<div class="grid__item">
							<div class="product">
								<div class="product__img">
									<img src="<?=GetCurDir(__DIR__)?>/uploads/product3.png" alt="молоко простоквашино">
								</div>
								<a href="#" class="product__name">молоко простоквашино</a>
								<div class="product__subtitle">1,5 литра</div>
								<div class="product__btns">
									<button class="product__btn" aria-label="В избранное">
										<?=GetContentSvgIcon('heart');?>
									</button>
									<button class="product__btn" aria-label="Купить">
										<?=GetContentSvgIcon('cart');?>
									</button>
								</div>
								<div class="products__price">54 ₽</div>
							</div>
						</div>
						<div class="grid__item">
							<div class="product">
								<div class="product__img">
									<img src="<?=GetCurDir(__DIR__)?>/uploads/product4.png" alt="молоко простоквашино">
								</div>
								<a href="#" class="product__name">молоко простоквашино</a>
								<div class="product__subtitle">1,5 литра</div>
								<div class="product__btns">
									<button class="product__btn" aria-label="В избранное">
										<?=GetContentSvgIcon('heart');?>
									</button>
									<button class="product__btn" aria-label="Купить">
										<?=GetContentSvgIcon('cart');?>
									</button>
								</div>
								<div class="products__price">54 ₽</div>
							</div>
						</div>
						<div class="grid__item">
							<div class="product">
								<div class="product__img">
									<img src="<?=GetCurDir(__DIR__)?>/uploads/product5.png" alt="молоко простоквашино">
								</div>
								<a href="#" class="product__name">молоко простоквашино</a>
								<div class="product__subtitle">1,5 литра</div>
								<div class="product__btns">
									<button class="product__btn" aria-label="В избранное">
										<?=GetContentSvgIcon('heart');?>
									</button>
									<button class="product__btn" aria-label="Купить">
										<?=GetContentSvgIcon('cart');?>
									</button>
								</div>
								<div class="products__price">54 ₽</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>