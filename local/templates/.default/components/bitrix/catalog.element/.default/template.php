<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

$APPLICATION->SetPageProperty('PAGE_LAYOUT', 'default');
?>
<div class="col">
	<div class="row product-detain-wrap">
		<div class="col-lg-5 col-md-7">
			<div class="product-slider">
				<div class="product-slider__previews-inner">
					<div class="product-slider__previews product-slider-previews">
						<div class="product-slider-previews__slide product-slider-previews-slide" data-index="0">
							<img src="<?=GetCurDir(__DIR__)?>/uploads/product.jpg" alt="">
						</div>
						<div class="product-slider-previews__slide product-slider-previews-slide" data-index="1">
							<img src="<?=GetCurDir(__DIR__)?>/uploads/product.jpg" alt="">
						</div>
						<div class="product-slider-previews__slide product-slider-previews-slide" data-index="2">
							<img src="<?=GetCurDir(__DIR__)?>/uploads/product.jpg" alt="">
						</div>
						<div class="product-slider-previews__slide product-slider-previews-slide" data-index="3">
							<img src="<?=GetCurDir(__DIR__)?>/uploads/product.jpg" alt="">
						</div>
						<div class="product-slider-previews__slide product-slider-previews-slide" data-index="4">
							<img src="<?=GetCurDir(__DIR__)?>/uploads/product.jpg" alt="">
						</div>
					</div>
				</div>
				<div class="product-slider__big-inner">
					<div class="product-slider__big">
						<div class="product-slider__big__slide product-slider__big-slide" data-index="0">
							<img src="<?=GetCurDir(__DIR__)?>/uploads/product.jpg" alt="">
						</div>
						<div class="product-slider__big__slide product-slider__big-slide" data-index="1">
							<img src="<?=GetCurDir(__DIR__)?>/uploads/product.jpg" alt="">
						</div>
						<div class="product-slider__big__slide product-slider__big-slide" data-index="2">
							<img src="<?=GetCurDir(__DIR__)?>/uploads/product.jpg" alt="">
						</div>
						<div class="product-slider__big__slide product-slider__big-slide" data-index="3">
							<img src="<?=GetCurDir(__DIR__)?>/uploads/product.jpg" alt="">
						</div>
						<div class="product-slider__big__slide product-slider__big-slide" data-index="4">
							<img src="<?=GetCurDir(__DIR__)?>/uploads/product.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6 offset-lg-1 col-md-5">
			<div class="product-info">
				<div class="product-info__col">
					<div class="product-info__price product-info-price">
						<span class="product-info-price__item">90 000</span>
						<span class="product-info-price__item product-info-price__item_old">90 000</span>
					</div>
					<div class="product-info__presence product-info-presence">
						<span class="product-info-presence__icon"><?=GetContentSvgIcon('check');?></span>
						<span class="product-info-presence__value">В наличии</span>
					</div>
				</div>
				<div class="product-info__col product-info__col_buttons">
					<a href="#" class="btn btn_mid btn_round btn_outline-primary">Быстрый заказ</a>
				</div>
			</div>
			<div class="product-block">
				<div class="product-block__title">Краткое описание</div>
				<a href="#desc" class="link link_success link_icon-right product-block__link">
					Полное описание
					<span class="link__icon"><?=GetContentSvgIcon('arrow_bottom');?></span>
				</a>
				<div class="product-block__body">
					If you are a serious astronomy fanatic like a lot of us are, you can probably remember that one event in childhood that started you along this exciting hobby. It might have been that first time you looked through a telescope.
				</div>
			</div>
			<div class="product-block">
				<div class="product-block__title">Характеристики</div>
				<a href="#desc" class="link link_success link_icon-right product-block__link">
					Все характеристики
					<span class="link__icon"><?=GetContentSvgIcon('arrow_bottom');?></span>
				</a>
				<div class="product-block__body">
					<ul class="specifications">
						<li class="specifications__item specifications-item">
							<span class="specifications-item__name">Страна-производитель</span>
							<span class="specifications-item__value">Россия</span>
						</li>
						<li class="specifications__item specifications-item">
							<span class="specifications-item__name">Страна-производитель</span>
							<span class="specifications-item__value">Россия</span>
						</li>
						<li class="specifications__item specifications-item">
							<span class="specifications-item__name">Страна-производитель</span>
							<span class="specifications-item__value">Россия</span>
						</li>
						<li class="specifications__item specifications-item">
							<span class="specifications-item__name">Страна-производитель</span>
							<span class="specifications-item__value">Россия</span>
						</li>
						<li class="specifications__item specifications-item">
							<span class="specifications-item__name">Страна-производитель</span>
							<span class="specifications-item__value">Россия</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="product-tabs tabs tabs_mid tabs_underline">
				<ul class="tabs__toggles">
					<li class="tabs__toggle tabs__toggle_active">
						<button data-toggle="collapse"
								data-target="#desc"
								aria-expanded="true"
								aria-controls="desc">Описание</button>
					</li>
					<li class="tabs__toggle">
						<button data-toggle="collapse"
								data-target="#char"
								aria-expanded="true"
								aria-controls="char">Характеристики</button>
					</li>
					<li class="tabs__toggle">
						<button data-toggle="collapse"
								data-target="#char1"
								aria-expanded="true"
								aria-controls="char1">Характеристики2</button>
					</li>
				</ul>
				<div class="tabs__contents">
					<div class="tabs__content tabs__content_active text" id="desc">
						Apple MacBook 12" - стильный и инновационный ноутбук будущего. Это легкий и ультратонкий мобильный компьютер с длительным сроком автономной работы и цельным дизайном. 
					</div>
					<div class="tabs__content" id="char">
						<ul class="specifications">
							<li class="specifications__item specifications-item">
								<span class="specifications-item__name">Страна-производитель</span>
								<span class="specifications-item__value">Россия</span>
							</li>
							<li class="specifications__item specifications-item">
								<span class="specifications-item__name">Страна-производитель</span>
								<span class="specifications-item__value">Россия</span>
							</li>
							<li class="specifications__item specifications-item">
								<span class="specifications-item__name">Страна-производитель</span>
								<span class="specifications-item__value">Россия</span>
							</li>
							<li class="specifications__item specifications-item">
								<span class="specifications-item__name">Страна-производитель</span>
								<span class="specifications-item__value">Россия</span>
							</li>
							<li class="specifications__item specifications-item">
								<span class="specifications-item__name">Страна-производитель</span>
								<span class="specifications-item__value">Россия</span>
							</li>
						</ul>
					</div>
					<div class="tabs__content" id="char1">
						Apple MacBook 12" - стильный и инновационный ноутбук будущего. Это легкий и ультратонкий мобильный компьютер с длительным сроком автономной работы и цельным дизайном. 
					</div>
				</div>
			</div>
			<div class="text product-desc">
				<p>Каждый компонент клавиатуры был спроектирован специально для нового MacBook: основной механизм, форма изгиба клавиш и даже новый уникальный шрифт. В результате клавиатура стала гораздо тоньше, чем все предыдущие. Теперь, когда вы нажимаете на клавишу, она чётко опускается и поднимается без малейших задержек - и ваш текст набирается быстрее и точнее. Новый механизм "бабочка" представляет собой цельный элемент, изготовленный из более жёстких материалов, с большей площадью опоры. Благодаря этому клавиши стали более устойчивыми, точнее реагируют на нажатия и при этом занимают меньше места по высоте. Эта инновационная технология обеспечивает более чёткую и стабильную работу вне зависимости от того, на какую часть клавиши вы нажимаете. </p>
				<p>Для нового MacBook были созданы более тонкие клавиши с более широкой поверхностью и глубоким изгибом, чтобы палец точнее попадал в центр и нажатие получалось более естественным. На первый взгляд изменения минимальны, но работать с клавиатурой стало ощутимо проще и удобнее. А в сочетании с механизмом "бабочка" новая клавиатура позволяет печатать с гораздо большей точностью.</p>
			</div>
		</div>
	</div>
</div>