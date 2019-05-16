<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

global $arCurrentSetting;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/bundle.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');
?>

<div class="rewards">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="rewards__header">
                    <h2 class="rewards__title">Наши награды</h2>
                    <a href="#" class="btn__link btn__link--bold btn__link--green btn__link--icon-r">
                        Показать все отзывы
                        <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 6C0 5.44772 0.447716 5 1 5H14.17L11.2935 2.11549C10.9048 1.7257 10.9053 1.09474 11.2945 0.705492C11.6841 0.315859 12.3159 0.315859 12.7055 0.705492L18 6L12.7055 11.2945C12.3159 11.6841 11.6841 11.6841 11.2945 11.2945C10.9053 10.9053 10.9048 10.2743 11.2935 9.88451L14.17 7H0.999998C0.447714 7 0 6.55228 0 6Z"/></svg>
                    </a>
                </div>
                <div class="rewards__items">
                    <div class="rewards__item">
                        <div class="rewards__logo">
                            <img src="local\templates\.default\frontend\main\images\rewards-logo.png" alt="">
                        </div>
                        <div class="rewards__letter" style="background-image: url();"></div>
                        <div class="rewards__info">
                            <div class="rewards__info-title">Грамота НИИ "Техцентр"</div>
                            <div class="rewards__info-date">12 апреля 2016</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>