<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

global $arCurrentSetting;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/bundle.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');
?>

<div class="slider-big">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="slider-big__slides slider-big-slides">
					<div class="slider-big__slide slider-big-slide">
						<div class="slider-big-slide__name">Apple iPhone 8</div>
						<p class="slider-big-slide__desc">
							Без кучи документов, поездок в банк и талончиков с номером очереди
						</p>
						<div class="slider-big-slide__info">
							<a href="#" class="btn btn--success btn--square btn--big slider-big-slide__link">Перейти в магазин</a>
							<span class="slider-big-slide__price">от 39 990 ₽</span>
						</div>
						<img class="slider-big-slide__img" src="<?=GetCurDir(__DIR__)?>/uploads/product_preview4.png" alt="">
					</div>
					<div class="slider-big__slide slider-big-slide">
						<div class="slider-big-slide__name">Apple iPhone 8</div>
						<p class="slider-big-slide__desc">
							Без кучи документов, поездок в банк и талончиков с номером очереди
						</p>
						<div class="slider-big-slide__info">
							<a href="#" class="btn btn--success btn--square btn--big slider-big-slide__link">Перейти в магазин</a>
							<span class="slider-big-slide__price">от 39 990 ₽</span>
						</div>
						<img class="slider-big-slide__img" src="<?=GetCurDir(__DIR__)?>/uploads/product_preview4.png" alt="">
					</div>
					<div class="slider-big__slide slider-big-slide">
						<div class="slider-big-slide__name">Apple iPhone 8</div>
						<p class="slider-big-slide__desc">
							Без кучи документов, поездок в банк и талончиков с номером очереди
						</p>
						<div class="slider-big-slide__info">
							<a href="#" class="btn btn--success btn--square btn--big slider-big-slide__link">Перейти в магазин</a>
							<span class="slider-big-slide__price">от 39 990 ₽</span>
						</div>
						<img class="slider-big-slide__img" src="<?=GetCurDir(__DIR__)?>/uploads/product_preview4.png" alt="">
					</div>
				</div>
				<div class="slider-big__previews">
					<div class="slider-big__preview slider-big-preview slider-big-preview--active" indexSlide="0">
						<img class="slider-big-preview__img" src="<?=GetCurDir(__DIR__)?>/uploads/product_preview1.png" alt="">
						<div class="slider-big-preview__name">Apple Watch</div>
						<div class="slider-big-preview__price">255 ₽</div>
					</div>
					<div class="slider-big__preview slider-big-preview" indexSlide="1">
						<img class="slider-big-preview__img" src="<?=GetCurDir(__DIR__)?>/uploads/product_preview2.png" alt="">
						<div class="slider-big-preview__name">Apple Watch</div>
						<div class="slider-big-preview__price">255 ₽</div>
					</div>
					<div class="slider-big__preview slider-big-preview" indexSlide="2">
						<img class="slider-big-preview__img" src="<?=GetCurDir(__DIR__)?>/uploads/product_preview3.png" alt="">
						<div class="slider-big-preview__name">Apple Watch</div>
						<div class="slider-big-preview__price">255 ₽</div>
					</div>
				</div>
				<div class="slide-big__nav">
					<button class="btn btn--icon btn--icon-big btn--stock slider-big__prev">
						<svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M14.1641 6H1.91406L7.16406 0.74994L6.49976 0L-0.000137329 6.5L6.49986 13L7.16406 12.25L1.91406 7H14.1641V6Z" fill="#95A5A6"/></svg>
					</button>
					<button class="btn btn--icon btn--icon-big btn--success slider-big__next">
						<svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M0 6H12.25L7 0.74994L7.6643 0L14.1642 6.5L7.6642 13L7 12.25L12.25 7H0V6Z" fill="white"/></svg>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>