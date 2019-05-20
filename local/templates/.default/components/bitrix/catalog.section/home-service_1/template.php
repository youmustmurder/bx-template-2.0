<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

global $arCurrentSetting;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/bundle.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');
?>

<section class="services services--grey">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="services__header">
					<h2 class="services__title">Наши услуги</h2>
					<p class="services__text">
						Без кучи документов, поездок в банк и талончиков с номером очереди
					</p>
				</div>
				<ul class="grid grid--3column">
					<li class="grid__item grid__item--middle">
						<a href="#" class="service service--middle service--left">
							<div class="service__inner">
								<div class="service__title">Доставка товаров из США и Канады</div>
								<div class="service__text">Сноудония и другие многочисленные национальные резерваты</div>
							</div>
							<img class="service__img" src="<?=GetCurDir(__DIR__)?>/uploads/service1.png" alt="Доставка товаров из США и Канады">
						</a>
					</li>
					<li class="grid__item grid__item--middle">
						<a href="#" class="service service--middle service--dark service--right">
							<div class="service__inner">
								<div class="service__title">Пошив изделий на заказ</div>
								<div class="service__text">Сноудония и другие многочисленные национальные резерваты </div>
							</div>
							<img class="service__img" src="<?=GetCurDir(__DIR__)?>/uploads/service2.png" alt="Доставка товаров из США и Канады">
						</a>
					</li>
					<li class="grid__item">
						<a href="#" class="service service--dark">
							<div class="service__inner">
								<div class="service__title">Проведение VR-игр и страйкбола</div>
								<div class="service__text">Сноудония и другие многочисленные национальные резерваты природы и парки</div>
							</div>
							<img class="service__img" src="<?=GetCurDir(__DIR__)?>/uploads/service3.png" alt="Доставка товаров из США и Канады">
						</a>
					</li>
					<li class="grid__item">
						<a href="#" class="service">
							<div class="service__inner">
								<div class="service__title">Обучение скейтбордингу</div>
								<div class="service__text">Сноудония и другие многочисленные национальные резерваты природы и парки</div>
							</div>
							<img class="service__img" src="<?=GetCurDir(__DIR__)?>/uploads/service4.png" alt="Доставка товаров из США и Канады">
						</a>
					</li>
					<li class="grid__item">
						<a href="#" class="service service--dark">
							<div class="service__inner">
								<div class="service__title">Туры в Норвегию и Нидерланды</div>
								<div class="service__text">Сноудония и другие многочисленные национальные резерваты природы и парки</div>
							</div>
							<img class="service__img" src="<?=GetCurDir(__DIR__)?>/uploads/service5.png" alt="Доставка товаров из США и Канады">
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>