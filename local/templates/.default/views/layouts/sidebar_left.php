<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */
?>

<main>
	<div class="container">
		<div class="row">
			<div class="col">
			<ul class="breadcrumbs">
				<li class="breadcrumbs__item">
					<a href="#">Главная</a>
				</li>
				<li class="breadcrumbs__item">
					<a href="#">Каталог</a>
				</li>
				<li class="breadcrumbs__item">
					<span>Электроника</span>
				</li>
			</ul>
			</div>
		</div>
	</div>
	<div class="page-header">
		<div class="container">
			<div class="row">
				<div class="col">
					<h1>Электроника</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="page">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-4 sidebar">
					<div class="catalog-menu sidebar__block">
						<ul>
							<li class="active">
								<a href="#">Элекстроника</a>
								<ul class="submenu">
									<li class="active">
										<a href="#">Ноутбуки</a>
									</li>
									<li>
										<a href="#">Ноутбуки</a>
									</li>
									<li>
										<a href="#">Ноутбуки</a>
									</li>
								</ul>
							</li>
								<li>
								<a href="#">Мебель</a>
							</li>
							<li>
								<a href="#">Одежда</a>
							</li>
							<li>
								<a href="#">Красота и здоровье</a>
							</li>
							<li>
								<a href="#">Спорт и туризм</a>
							</li>
						</ul>
					</div>
					<div class="sidebar-news sidebar__block">
						<div class="sidebar-news__title">Акции</div>
						<ul class="sidebar-news__list sidebar-news-list">
							<li class="sidebar-news-list__item sidebar-news-list-item">
								<a href="#">
									<div class="sidebar-news-list-item__date">20 сентября 2018</div>
									<span class="sidebar-news-list-item__name">Месяц ДИВАНОВ. Скидки до 40%</span>
								</a>
							</li>
							<li class="sidebar-news-list__item sidebar-news-list-item">
								<a href="#">
									<div class="sidebar-news-list-item__date">20 сентября 2018</div>
									<span class="sidebar-news-list-item__name">Месяц ДИВАНОВ. Скидки до 40%</span>
								</a>
							</li>
						</ul>
						<a href="#" class="link link_secondary link_icon-right sidebar-news__all-link">
							Все акции
							<span class="link__icon"><?=GetContentSvgIcon('arrow_right');?></span>
						</a>
					</div>
				</div>
				<div class="col-lg-9 col-md-8">
					<ul class="sub-category">
						<li class="sub-category__item sub-category-item">
							<a href="#">
								<div class="sub-category-item__image">
									<img src="<?=GetNoPhoto()?>" alt="">
								</div>
								<div class="sub-category-item__name">Ноутбуки</div>
							</a>
						</li>
						<li class="sub-category__item sub-category-item">
							<a href="#">
								<div class="sub-category-item__image">
									<img src="<?=GetNoPhoto()?>" alt="">
								</div>
								<div class="sub-category-item__name">Ноутбуки</div>
							</a>
						</li>
						<li class="sub-category__item sub-category-item">
							<a href="#">
								<div class="sub-category-item__image">
									<img src="<?=GetNoPhoto()?>" alt="">
								</div>
								<div class="sub-category-item__name">Ноутбуки</div>
							</a>
						</li>
						<li class="sub-category__item sub-category-item">
							<a href="#">
								<div class="sub-category-item__image">
									<img src="<?=GetNoPhoto()?>" alt="">
								</div>
								<div class="sub-category-item__name">Ноутбуки</div>
							</a>
						</li>
					</ul>
					<div class="text">
						<p>Cвязанная с получением, распределением, преобразованием и использованием электрической энергии. А также — c разработкой, эксплуатацией и оптимизацией электронных компонентов, электронных схем и устройств, оборудования и технических систем. Под электротехникой также понимают техническую науку, которая изучает применение электрических и магнитных явлений для практического использования. </p>
						<p>Cвязанная с получением, распределением, преобразованием и использованием электрической энергии. А также — c разработкой, эксплуатацией и оптимизацией электронных компонентов, электронных схем и устройств, оборудования и технических систем. Под электротехникой также понимают техническую науку, которая изучает применение электрических и магнитных явлений для практического использования. </p>
					</div>
					<?=$arParams['CONTENT']?>
				</div>
			</div>
		</div>
	</div>
</main>