<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

global $arCurrentSetting;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/bundle.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');
?>

<div class="about about--grey">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="about__blocks">
					<div class="about__block about-block about-block--info">
						<div class="about-block__inner">
							<div class="about__numbers about-numbers">
								<span class="about-numbers__value">234</span>
								<span class="about-numbers__text">города</span>
							</div>
							<p class="about__text">Наша компания представлена в 234 городах 16-ти стран на двух континентах</p>
							<a href="#" class="btn__link btn__link--bold btn__link--green btn__link--icon-r about__link-company">
								Перейти к странице о компании
								<?=GetContentSvgIcon('arrow_right');?>
							</a>
							<button class="about__btn-refresh about-btn-refresh">
								<span class="btn btn--success btn--icon about-btn-refresh__icon">
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
								<a href="#" class="btn__link btn__link--bold btn__link--green btn__link--icon-r about__link-all-news">
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
									<a href="#" class="btn__link btn__link--bold btn__link--green">
										Подробнее
									</a>
								</li>
								<li class="about-news__item about-news-item">
									<div class="about-news-item__date">28 апреля, 2019</div>
									<a href="#" class="about-news-item__title">SECRET — новый тренд в производстве мебели</a>
									<p class="about-news-item__desc">
										Новинка МДМ-Комплект
									</p>
									<a href="#" class="btn__link btn__link--bold btn__link--green">
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
	<div class="about__back" style="background: url(<?=GetCurDir(__DIR__)?>/uploads/about_back.png);" alt="website96"></div>
</div>