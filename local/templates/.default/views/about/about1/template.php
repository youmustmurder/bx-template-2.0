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
				<div class="about__block-inner">
					<div class="about__block about-block about-block--info">
						<div class="about__numbers about-numbers">
							<span class="about-numbers__value">234</span>
							<span class="about-numbers__text">города</span>
						</div>
						<p class="about__text">Наша компания представлена в 234 городах 16-ти стран на двух континентах</p>
						<a href="#" class="btn__link btn__link--bold btn__link--green btn__link--icon-r about__link-company">
							Перейти к странице о компании
							<svg width="18" height="12" viewBox="0 0 18 12" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 6C0 5.44772 0.447716 5 1 5H14.17L11.2935 2.11549C10.9048 1.7257 10.9053 1.09474 11.2945 0.705492C11.6841 0.315859 12.3159 0.315859 12.7055 0.705492L18 6L12.7055 11.2945C12.3159 11.6841 11.6841 11.6841 11.2945 11.2945C10.9053 10.9053 10.9048 10.2743 11.2935 9.88451L14.17 7H0.999998C0.447714 7 0 6.55228 0 6Z"></path></svg>
						</a>
						<button class="about__btn-refresh about-btn-refresh">
							<span class="btn btn--success btn--icon about-btn-refresh__icon">
								<svg width="16" height="22" viewBox="0 0 16 22" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path fill-rule="evenodd" clip-rule="evenodd" d="M8 3V0L4 4L8 8V5C11.31 5 14 7.69 14 11C14 12.01 13.75 12.97 13.3 13.8L14.76 15.26C15.54 14.03 16 12.57 16 11C16 6.58 12.42 3 8 3ZM8 17C4.69 17 2 14.31 2 11C2 9.99 2.25 9.03 2.7 8.2L1.24 6.74C0.46 7.97 0 9.43 0 11C0 15.42 3.58 19 8 19V22L12 18L8 14V17Z"/></svg>
							</span>
							<span class="about-btn-refresh__text">еще факты</span>
						</button>
					</div>
					<div class="about__block about-block">
						<div class="about-block__header">
							<span class="h4">Новости</span>
							<a href="#" class="btn__link btn__link--bold btn__link--green btn__link--icon-r">
								Показать все новости
								<svg width="18" height="12" viewBox="0 0 18 12" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 6C0 5.44772 0.447716 5 1 5H14.17L11.2935 2.11549C10.9048 1.7257 10.9053 1.09474 11.2945 0.705492C11.6841 0.315859 12.3159 0.315859 12.7055 0.705492L18 6L12.7055 11.2945C12.3159 11.6841 11.6841 11.6841 11.2945 11.2945C10.9053 10.9053 10.9048 10.2743 11.2935 9.88451L14.17 7H0.999998C0.447714 7 0 6.55228 0 6Z"></path></svg>
							</a>
						</div>
						<ul class="about__news about-news">
							<li class="about-news__item about-new-item">
								<div class="about-new-item__date">28 апреля, 2019</div>
								<a href="#" class="about-new-item__title">Премию Hublot Design Award 2018 получил Дози Каноэ</a>
								<p class="about-new-item__desc">
									BOYARD поддержал европейский тренд на чёрную фурнитуру
								</p>
								<a href="#" class="btn__link btn__link--bold btn__link--green">
									Подробнее
								</a>
							</li>
							<li class="about-news__item about-new-item">
								<div class="about-new-item__date">28 апреля, 2019</div>
								<a href="#" class="about-new-item__title">SECRET — новый тренд в производстве мебели</a>
								<p class="about-new-item__desc">
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
	<div class="about__back" style="background: url(<?=GetCurDir(__DIR__)?>/uploads/about_back.png);" alt="website96"></div>
</div>