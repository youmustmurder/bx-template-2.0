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
				<div class="col-lg-3 col-md-4 sidebar">
					<div class="catalog-menu sidebar__block">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            ".default",
                            array(
                                "COMPONENT_TEMPLATE" => ".default",
                                "ROOT_MENU_TYPE" => "catalog",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "MENU_CACHE_GET_VARS" => array(
                                ),
                                "MAX_LEVEL" => "2",
                                "CHILD_MENU_TYPE" => "left",
                                "USE_EXT" => "Y",
                                "DELAY" => "N",
                                "ALLOW_MULTI_SELECT" => "N",
                                "MAX_ITEMS" => "99"
                            ),
                            false
                        );?>
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
                    <?=$arPrams['CONTENT']?>

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