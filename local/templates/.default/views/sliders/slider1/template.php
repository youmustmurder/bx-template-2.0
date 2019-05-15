<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

global $arCurrentSetting;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/bundle.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');
?>

<div class="slider-big">
    <div class="slider-big__slides slider-big-slides">
        <div class="slider-big-slides__slide">
            <img src="<?=GetCurDir(__DIR__)?>/img_slider.jpg" alt="website96">
        </div>
        <div class="slider-big-slides__slide">
            <img src="<?=GetCurDir(__DIR__)?>/img_slider.jpg" alt="website96">
        </div>
        <div class="slider-big-slides__slide">
            <img src="<?=GetCurDir(__DIR__)?>/img_slider.jpg" alt="website96">
        </div>
    </div>
</div>