<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
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
					<div class="col">
						<?=$arParams['CONTENT']?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>