<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

global $arCurrentSetting;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/script.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');
?>

<div class="about about_grey">
	<div class="about__wrap">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="about__blocks">
						<div class="about__block about-block about-block_info">
							<div class="about-block__inner">
								<div class="about__numbers about-numbers">
									<span class="about-numbers__value">234</span>
									<span class="about-numbers__text">города</span>
								</div>
								<p class="about__text">Наша компания представлена в 234 городах 16-ти стран на двух континентах</p>
								<a href="#" class="link link_success link_icon-right about__link-company">
									Перейти к странице о компании
									<?=GetContentSvgIcon('arrow_right');?>
								</a>
								<button class="about__btn-refresh about-btn-refresh">
									<span class="btn btn_circle-min btn_success about-btn-refresh__icon">
										<?=GetContentSvgIcon('refresh');?>
									</span>
									<span class="about-btn-refresh__text">еще факты</span>
								</button>
							</div>
						</div>
						<div class="about__block about-block">
							<div class="about-block__inner">
								<div class="about-block__header">
									<span class="h4">Новости</span>
									<a href="#" class="link link_success link_icon-right about__link-all-news">
										Показать все новости
										<?=GetContentSvgIcon('arrow_right');?>
									</a>
								</div>
								<ul class="about__news about-news">
									<li class="about-news__item about-news-item">
										<div class="about-news-item__date">28 апреля, 2019</div>
										<a href="#" class="about-news-item__title">Премию Hublot Design Award 2018 получил Дози Каноэ</a>
										<p class="about-news-item__desc">
											BOYARD поддержал европейский тренд на чёрную фурнитуру
										</p>
										<a href="#" class="link link_success">
											Подробнее
										</a>
									</li>
									<li class="about-news__item about-news-item">
										<div class="about-news-item__date">28 апреля, 2019</div>
										<a href="#" class="about-news-item__title">SECRET — новый тренд в производстве мебели</a>
										<p class="about-news-item__desc">
											Новинка МДМ-Комплект
										</p>
										<a href="#" class="link link_success">
											Подробнее
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="about__back" style="background-image: url(<?=GetCurDir(__DIR__)?>/uploads/about_back.png);" alt="website96"></div>
	</div>
</div>