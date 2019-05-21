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
				<div class="best-categories__cards">
                    <a href='#' class="best-categories__card col-12 col-md-6 col-lg-3">
                        <div class="best-categories__img">
                            <img src="local/templates/.default/frontend/main/images/best-categories-img.png" alt="">
                        </div>
                        <div class="best-categories__info">
                            <div class="best-categories__quantity">110 товаров</div>
                            <div class="best-categories__item-title">Спорт и отдых</div>
                            <div class="best-categories__item-price">от <span class="best-categories__item-number">32 000</span> рублей</div>
                        </div>
                    </a>
                    <a href='#' class="best-categories__card col-12 col-md-6 col-lg-3">
                        <div class="best-categories__img">
                            <img src="local/templates/.default/frontend/main/images/best-categories-img.png" alt="">
                        </div>
                        <div class="best-categories__info">
                            <div class="best-categories__quantity">110 товаров</div>
                            <div class="best-categories__item-title">Спорт и отдых</div>
                            <div class="best-categories__item-price">от <span class="best-categories__item-number">32 000</span> рублей</div>
                        </div>
                    </a>
                    <a href='#' class="best-categories__card col-12 col-md-6 col-lg-3">
                        <div class="best-categories__img">
                            <img src="local/templates/.default/frontend/main/images/best-categories-img.png" alt="">
                        </div>
                        <div class="best-categories__info">
                            <div class="best-categories__quantity">110 товаров</div>
                            <div class="best-categories__item-title">Спорт и отдых</div>
                            <div class="best-categories__item-price">от <span class="best-categories__item-number">32 000</span> рублей</div>
                        </div>
                    </a>
                    <a href='#' class="best-categories__card col-12 col-md-6 col-lg-3">
                        <div class="best-categories__img">
                            <img src="local/templates/.default/frontend/main/images/best-categories-img.png" alt="">
                        </div>
                        <div class="best-categories__info">
                            <div class="best-categories__quantity">110 товаров</div>
                            <div class="best-categories__item-title">Спорт и отдых</div>
                            <div class="best-categories__item-price">от <span class="best-categories__item-number">32 000</span> рублей</div>
                        </div>
                    </a>
                </div>
			</div>
		</div>
	</div>
</div>