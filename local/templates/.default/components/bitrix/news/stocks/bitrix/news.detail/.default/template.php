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
	<div class="news-detail">
        <?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]){?>
            <div class="news-detailt__date news-detail-date">
                <div class="news-detail-date__number"><?=$arResult['DATE_NEWS'][0]?></div>
                <div class="news-detail-date__date"><?=$arResult['DATE_NEWS'][1]?> <?=$arResult['DATE_NEWS'][2]?></div>
            </div>
        <?}?>
        <?if(strlen($arResult["PREVIEW_TEXT"])>0){?>
            <div class="news-detailt__short-desc">
                <?=$arResult["PREVIEW_TEXT"]?>
            </div>
        <?}?>
		<div class="news-detail__image">
			<img src="<?=GetCurDir(__DIR__)?>/uploads/news.jpg" alt="">
		</div>
	</div>
	<div class="text">
		<p>BOYARD поддержал европейский тренд на чёрную фурнитуру созданием собственной универсальной коллекции лицевой фурнитуры, выполненной в благородном, стильном и вечно модном чёрном цвете.</p>
		<p>BOYARD поддержал европейский тренд на чёрную фурнитуру созданием собственной универсальной коллекции лицевой фурнитуры, выполненной в благородном, стильном и вечно модном чёрном цвете.</p>
		<p>BOYARD поддержал европейский тренд на чёрную фурнитуру созданием собственной универсальной коллекции лицевой фурнитуры, выполненной в благородном, стильном и вечно модном чёрном цвете.</p>
	</div>
</div>
