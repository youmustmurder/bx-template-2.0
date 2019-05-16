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
    <div class="slider-big__slides slider-big-slides">
        <div class="slider-big__slide slider-slide">
			<div class="slider-slider__inner">
				<h2 class="slider-slide__title">Откройте счёт и начните работать уже сегодня</h2>
				<p class="slider-slide__text">Без кучи документов, поездок в банс и талончиков с номером очереди</p>
				<a href="" class="btn btn--success btn--circle btn--mid slider-slide__btn">Начать работу</a>
				<ul class="slider-slide__numbers slider-slide-numbers">
					<li class="slider-slide-numbers__num slider-slide-num">
						<span class="slider-slide-num__value">16</span>
						<span class="slider-slide-num__text">Стран</span>
					</li>
					<li class="slider-slide-numbers__num slider-slide-num">
						<span class="slider-slide-num__value">232</span>
						<span class="slider-slide-num__text">Города</span>
					</li>
					<li class="slider-slide-numbers__num slider-slide-num">
						<span class="slider-slide-num__value">89 000</span>
						<span class="slider-slide-num__text">Клиентов в месяц</span>
					</li>
				</ul>
			</div>
            <img class="slider-slide__img" src="<?=GetCurDir(__DIR__)?>/img_slider.jpg" alt="website96">
        </div>
        <div class="slider-big-slides__slide">
            <img src="<?=GetCurDir(__DIR__)?>/img_slider.jpg" alt="website96">
        </div>
        <div class="slider-big-slides__slide">
            <img src="<?=GetCurDir(__DIR__)?>/img_slider.jpg" alt="website96">
        </div>
	</div>
	<div class="slide-big__nav">
		<button class="btn btn--default btn--icon btn--icon-big slide-big__prev">
			<svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M14.1641 6H1.91406L7.16406 0.74994L6.49976 0L-0.000137329 6.5L6.49986 13L7.16406 12.25L1.91406 7H14.1641V6Z" fill="#95A5A6"/></svg>
		</button>
		<button class="btn btn--default btn--icon btn--icon-big slide-big__next">
			<svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M0 6H12.25L7 0.74994L7.6643 0L14.1642 6.5L7.6642 13L7 12.25L12.25 7H0V6Z" fill="white"/></svg>
		</button>
	</div>
</div>