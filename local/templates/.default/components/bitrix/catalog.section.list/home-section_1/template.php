<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

global $arCurrentSetting;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/script.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');
?>

<div class="best-categories">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="best-categories__header">
					<h2 class="best-categories__title">Популярные категории</h2>
					<a href="#" class="btn__link btn__link--bold btn__link--green btn__link--icon-r best-categories__link-all">
						Показать все категории
						<svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 6C0 5.44772 0.447716 5 1 5H14.17L11.2935 2.11549C10.9048 1.7257 10.9053 1.09474 11.2945 0.705492C11.6841 0.315859 12.3159 0.315859 12.7055 0.705492L18 6L12.7055 11.2945C12.3159 11.6841 11.6841 11.6841 11.2945 11.2945C10.9053 10.9053 10.9048 10.2743 11.2935 9.88451L14.17 7H0.999998C0.447714 7 0 6.55228 0 6Z"/></svg>
					</a>
				</div>
				<ul class="best-categories__grid best-categories-grid">
					<li class="best-categories-grid__card best-categories-card">
						<a href="#" class="best-categories-grid__inner">
							<div class="best-categories-card__title">Поло</div>
							<img class="best-categories-card__img" src="<?=GetCurDir(__DIR__)?>/uploads/category1.png" alt="Поло">
							<div class="best-categories-card__subtitle">от 5 000 рублей</div>
						</a>
					</li>
					<li class="best-categories-grid__card best-categories-card best-categories-card--sale">
						<a href="#" class="best-categories-grid__inner">
							<div class="best-categories-card__label best-categories-card-label">
								<span class="best-categories-card-label__number">-20</span>
								<span class="best-categories-card-label__percent">%</span>
							</div>
							<div class="best-categories-card__inner-desc">
								<div class="best-categories-card__title">ОГРАНИЧЕННАЯ СЕРИЯ lego bionicle</div>
								<div class="best-categories-card__subtitle">только до конца марта</div>
							</div>
							<img class="best-categories-card__img" src="<?=GetCurDir(__DIR__)?>/uploads/category2.png" alt="ОГРАНИЧЕННАЯ СЕРИЯ lego bionicle">
						</a>
					</li>
					<li class="best-categories-grid__card best-categories-card">
						<a href="#" class="best-categories-grid__inner">
							<div class="best-categories-card__title">АВТОМАГНИТОЛЫ KENWOOD</div>
							<img class="best-categories-card__img" src="<?=GetCurDir(__DIR__)?>/uploads/category3.png" alt="АВТОМАГНИТОЛЫ KENWOOD">
							<div class="best-categories-card__subtitle">от 2 990 рублей</div>
						</a>
					</li>
					<li class="best-categories-grid__card best-categories-card best-categories-card--with-desc">
						<a href="#" class="best-categories-grid__inner">
							<div class="best-categories-card__inner-desc">
								<div class="best-categories-card__title">Игровые станции</div>
								<div class="best-categories-card__subtitle">от 189 599 рублей</div>
							</div>
							<img class="best-categories-card__img" src="<?=GetCurDir(__DIR__)?>/uploads/category4.png" alt="Игровые станции">
							<p class="best-categories-card__text">Без кучи документов, поездок в банк и талончиков с номером очереди</p>
						</a>
					</li>
					<li class="best-categories-grid__card best-categories-card">
						<a href="#" class="best-categories-grid__inner">
							<div class="best-categories-card__title">УМНЫЙ ДОМ</div>
							<img class="best-categories-card__img" src="<?=GetCurDir(__DIR__)?>/uploads/category5.png" alt="УМНЫЙ ДОМ">
							<div class="best-categories-card__subtitle">от 24 990 рублей</div>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>