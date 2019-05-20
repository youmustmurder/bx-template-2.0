<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

global $arCurrentSetting;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/bundle.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');
?>

<section class="news">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="news__inner">
					<h2 class="news__title">Последние новости</h2>
					<a href="#" class="btn__link btn__link--bold btn__link--white btn__link--icon-r news__link-all-news">
						Показать все новости
						<?=GetContentSvgIcon('arrow_right_bold');?>
					</a>
					<div class="news__slides-inner">
						<div class="news__slides">
						<div class="news__slide news-slide">
							<div class="news-slide__theme">Мебель</div>
							<a href="#" class="news-slide__title">SECRET — новый тренд в производстве мебели</a>
							<div class="news-slide__date">28 апреля, 2019</div>
						</div>
						<div class="news__slide news-slide">
							<div class="news-slide__theme">Мебель</div>
							<a href="#" class="news-slide__title">SECRET — новый тренд в производстве мебели</a>
							<div class="news-slide__date">28 апреля, 2019</div>
						</div>
						<div class="news__slide news-slide">
							<div class="news-slide__theme">Мебель</div>
							<a href="#" class="news-slide__title">SECRET — новый тренд в производстве мебели</a>
							<div class="news-slide__date">28 апреля, 2019</div>
						</div>
						<div class="news__slide news-slide">
							<div class="news-slide__theme">Мебель</div>
							<a href="#" class="news-slide__title">SECRET — новый тренд в производстве мебели</a>
							<div class="news-slide__date">28 апреля, 2019</div>
						</div>
					</div>
					</div>
					<button class="btn btn--icon btn--border-white news__nav news__nav--prev">
						<?=GetContentSvgIcon('arrow_left');?>
					</button>
					<button class="btn btn--icon btn--border-white news__nav news__nav--next">
						<?=GetContentSvgIcon('arrow_right');?>
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="news__dots news-dots">
		<span class="news-dots__item"></span>
		<span class="news-dots__item"></span>
	</div>
</section>