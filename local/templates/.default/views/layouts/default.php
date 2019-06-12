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
                <?$APPLICATION->IncludeFile(
                    "/include/" . SITE_ID . "/blocks/breadcrumb.php",
                    array(),
                    array(
                        "SHOW_BORDER" => false,
                        "MODE" => "php"
                    )
                );?>
			</div>
		</div>
	</div>
	<div class="page-header">
		<div class="container">
			<div class="row">
				<div class="col">
					<h1><?=$APPLICATION->GetTitle()?></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="page">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="col-lg-5 col-md-7">
						
					</div>
					<div class="col-lg-6 offset-lg-1 col-md-5">
						<div class="product-info">
							<div class="product-info__col">
								<div class="product-info__price product-info-price">
									<span class="product-info-price__item">90 000</span>
									<span class="product-info-price__item product-info-price__item_old">90 000</span>
								</div>
							</div>
							<div class="product-info__col">
								<a href="#" class="">Быстрый заказ</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>