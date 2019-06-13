<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<div class="col">
	<ul class="stock-list">
		<li class="stock-list__item stock-list-item">
			<a href="#">
				<div class="stock-list-item__image">
					<img src="<?=GetCurDir(__DIR__)?>/uploads/news.jpg" alt="">
				</div>
				<div class="stock-list-item__name">Месяц ДИВАНОВ. Скидки до 40%</div>
				<div class="stock-list-item__desc">
					Огромный выбор диванов со скидкой до 40%
				</div>
				<div class="stock-list-item__date stock-list-item-date">
					<span class="stock-list-item-date__icon"><?=GetContentSvgIcon('clock')?></span>
					<span>До 26 Октября</span>
				</div>
			</a>
		</li>
		<li class="stock-list__item stock-list-item">
			<a href="#">
				<div class="stock-list-item__image">
					<img src="<?=GetCurDir(__DIR__)?>/uploads/news.jpg" alt="">
				</div>
				<div class="stock-list-item__name">Месяц ДИВАНОВ. Скидки до 40%</div>
				<div class="stock-list-item__desc">
					Огромный выбор диванов со скидкой до 40%
				</div>
				<div class="stock-list-item__date stock-list-item-date">
					<span class="stock-list-item-date__icon"><?=GetContentSvgIcon('clock')?></span>
					<span>До 26 Октября</span>
				</div>
			</a>
		</li>
	</ul>
</div>
