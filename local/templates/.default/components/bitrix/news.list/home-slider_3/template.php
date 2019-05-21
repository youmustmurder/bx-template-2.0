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
	<div class="slider-big__slides">
		<div class="slider-big__slide slider-big-slide">
			<div class="slider-big-slide__wrap">
				<div class="slider-big-slide__subtitle">Мужская одежда</div>
				<div class="slider-big-slide__title">Новая коллекция базовых вещей</div>
				<div class="slider-big-slide__desc">
					Без кучи документов, поездок в банк и талончиков с номером очереди
				</div>
				<a href="#" class="btn btn--success btn--square btn--big">Перейти в магазин</a>
			</div>
			<img class="slider-big-slide__img" src="<?=GetCurDir(__DIR__)?>/uploads/slider1.png" alt="Электроника">
		</div>
		<div class="slider-big__slide slider-big-slide">
			<div class="slider-big-slide__wrap">
				<div class="slider-big-slide__subtitle">Мужская одежда</div>
				<div class="slider-big-slide__title">Новая коллекция базовых вещей</div>
				<div class="slider-big-slide__desc">
					Без кучи документов, поездок в банк и талончиков с номером очереди
				</div>
				<a href="#" class="btn btn--success btn--square btn--big">Перейти в магазин</a>
			</div>
			<img class="slider-big-slide__img" src="<?=GetCurDir(__DIR__)?>/uploads/slider1.png" alt="Электроника">
		</div>
	</div>
	<div class="slider-big__wrap-nav">
		<div class="slide-big__nav">
			<button class="btn btn--icon btn--icon-big btn--stock slider-big__prev">
				<?=GetContentSvgIcon('arrow_left');?>
			</button>
			<button class="btn btn--icon btn--icon-big btn--stock slider-big__next">
				<?=GetContentSvgIcon('arrow_right');?>
			</button>
		</div>
		<div class="slide-big__dots slide-big-dots">
			<div class="slide-big-dots__item"></div>
			<div class="slide-big-dots__item"></div>
		</div>
	</div>
</div>