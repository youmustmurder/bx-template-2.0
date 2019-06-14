<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
$this->setFrameMode(true);/*
echo '<pre>';
var_dump($arResult);
echo '</pre>';*/
?>
    <script src="https://api-maps.yandex.ru/2.1?apikey=01cee7eb-c376-474b-bdf2-37af3d596be3&lang=ru_RU"></script>
<?php
$index = 1;
if ($arResult['ITEMS']) {
    ?>
    <div class="col">
		<div class="filials-page">
			<div id="map_container"></div>
			<ul class="branches">
				<? foreach ($arResult["ITEMS"] as $arItem) {
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					$Yandex = explode(",", $arItem["PROPERTIES"]["C_MAP"]["VALUE"]);
					$Yandex_X = $Yandex[0];
					$Yandex_Y = $Yandex[1];
					?>
					<li class="branches__item branch"
						data-index="<?= $index ?>"
						data-name="<?= $arItem["NAME"] ?>"
						data-yandex-x="<?= $Yandex_X; ?>"
						data-yandex-y="<?= $Yandex_Y; ?>"
						data-address="<?= $arItem["PROPERTIES"]["C_ADDRESS"]["VALUE"]; ?>"
						data-email="<?= $arItem["PROPERTIES"]["C_EMAIL"]["VALUE"]; ?>"
						data-phone="<?
						foreach ($arItem["PROPERTIES"]["C_PHONE"]["VALUE"] as $arPhone) {
							echo $arPhone . '; ';
						} ?>">
						<div class="branch__name"><?= $arItem["NAME"] ?></div>
						<div class="branch__info-wrap">
							<ul class="branch__info-list">
								<?
								if ($arItem["PROPERTIES"]["C_ADDRESS"]["VALUE"]) { ?>
									<li class="branch-info-list__item branch-info">
										<span class="branch-info__name">Адрес</span>
										<span class="branch-info__value"><?= $arItem["PROPERTIES"]["C_ADDRESS"]["VALUE"]; ?></span>
									</li>
									<?
								} ?>
								<?
								if ($arItem["PROPERTIES"]["C_PHONE"]["VALUE"]) { ?>
									<li class="branch-info-list__item branch-info">
										<span class="branch-info__name">Телефон<?= count($arItem["PROPERTIES"]["C_PHONE"]["VALUE"]) > 1 ? 'ы' : '' ?></span>
										<?
										foreach ($arItem["PROPERTIES"]["C_PHONE"]["VALUE"] as $arPhone) { ?>
											<span class="branch-info__value">
												<a href="tel:<?= $arPhone; ?>" class="branch-info__link"><?= $arPhone; ?></a>
											</span>
										<? } ?>
									</li>
									<?
								} ?>
								<?
								if ($arItem["PROPERTIES"]["C_EMAIL"]["VALUE"]) { ?>
									<li class="branch-info-list__item branch-info">
										<span class="branch-info__name">Email</span>
										<span class="branch-info__value">
											<a href="mailto:<?= $arItem["PROPERTIES"]["C_EMAIL"]["VALUE"]; ?>" class="branch-info__link"><?= $arItem["PROPERTIES"]["C_EMAIL"]["VALUE"]; ?></a>
										</span>
									</li>
									<?
								} ?>
							</ul>
						</div>
					</li>
					<?
					++$index;
				}
				unset($index); ?>
			</ul>
		</div>
	</div>
    <script>
        $(document).ready(function () {
            if ($("#map_container").length > 0) {
                ymaps.ready(function () {
                    var map = new ymaps.Map("map_container", {
                        center: [<?=$arResult['COORDINATES']['X']?>, <?=$arResult['COORDINATES']['Y']?>],
                        zoom: 11,
                    });
                    var ClusterContent = ymaps.templateLayoutFactory.createClass('<div class="claster">$[properties.geoObjects.length]</div>');
                    var clusterIcons = [{
                        href: '/local/templates/individual/public/images/icon-geo.png',
                        size: [60, 60],
                        offset: [-30, -30],
                    }];
                    myClusterer = new ymaps.Clusterer({
                        clusterIcons: clusterIcons,
                        clusterNumbers: [1],
                        zoomMargin: [30],
                        clusterIconContentLayout: ClusterContent
                    });
                    var myBalloonLayout = ymaps.templateLayoutFactory.createClass(
                        '<address class="address-map">' +
                        '<p><strong>$[properties.name]</strong>' + '<br />' + '</p>' +
                        '<ul class="balloon-info">' +
                        '<li><strong>Адрес:&nbsp;</strong>$[properties.address]</li>' +
                        '<li><strong>Email:&nbsp;</strong>$[properties.email]</li>' +
                        '<li><strong>Телефон:&nbsp;</strong>$[properties.phone]</li>' +
                        '</ul>' +
                        '</address>'
                    );
                    var Placemark = {};
                    $(".filial__item-data").each(function () {
                        var X = $(this).attr("data-yandex-x");
                        var Y = $(this).attr("data-yandex-y");

                        Obj = $(this).attr("data-index");

                        Placemark[Obj] = new ymaps.Placemark([X, Y], {
                            name: $(this).attr("data-name"),
                            address: $(this).attr("data-address"),
                            email: $(this).attr("data-email"),
                            phone: $(this).attr("data-phone"),
                            iconContent: '<div class="marker-circ"></div>',
                        }, {
                            balloonContentLayout: myBalloonLayout,
                            balloonOffset: [5, 0],
                            balloonCloseButton: true,
                            balloonMinWidth: 450,
                            balloonMaxWidth: 450,
                            balloonMinHeught: 150,
                            balloonMaxHeught: 200,
                            iconImageHref: '/local/templates/individual/public/images/icon-geo.png',
                            iconImageSize: [60, 60],
                            iconImageOffset: [-30, -30],
                            iconLayout: 'default#imageWithContent',
                            iconactive: '/local/templates/individual/public/images/icon-geo__active.png'
                        });
                        myClusterer.add(Placemark[Obj]);
                    });
                    map.geoObjects.add(myClusterer);
                    //map.behaviors.disable("scrollZoom");
                });
            }
        });
    </script>
<? } ?>