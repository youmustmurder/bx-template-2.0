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
                    <a href="#" class="btn__link btn__link--bold btn__link--green btn__link--icon-r around__link-all--desc">
                        Показать все отзывы
                        <?=GetContentSvgIcon('arrow-more');?>
                    </a>
                </div>
                <div class="rewards__items">
                    <div class="rewards__item">
                        <div class="rewards__logo">
                            <img src="local\templates\.default\frontend\main\images\rewards-logo.png" alt="">
                        </div>
                        <div class="rewards__letter" style="background-image: url(local/templates/.default/frontend/main/images/rewards-letter.png);"></div>
                        <div class="rewards__info">
                            <div class="rewards__info-title">Грамота НИИ "Техцентр"</div>
                            <div class="rewards__info-date">12 апреля 2016</div>
                        </div>
                    </div>
                    <div class="rewards__item">
                        <div class="rewards__logo">
                            <img src="local\templates\.default\frontend\main\images\rewards-logo.png" alt="">
                        </div>
                        <div class="rewards__letter" style="background-image: url(local/templates/.default/frontend/main/images/rewards-letter.png);"></div>
                        <div class="rewards__info">
                            <div class="rewards__info-title">Грамота НИИ "Техцентр"</div>
                            <div class="rewards__info-date">12 апреля 2016</div>
                        </div>
                    </div>
                    <div class="rewards__item">
                        <div class="rewards__logo">
                            <img src="local\templates\.default\frontend\main\images\rewards-logo.png" alt="">
                        </div>
                        <div class="rewards__letter" style="background-image: url(local/templates/.default/frontend/main/images/rewards-letter.png);"></div>
                        <div class="rewards__info">
                            <div class="rewards__info-title">Грамота НИИ "Техцентр"</div>
                            <div class="rewards__info-date">12 апреля 2016</div>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn__link btn__link--bold btn__link--green btn__link--icon-r around__link-all--mob">
                    Показать все отзывы
                    <?=GetContentSvgIcon('arrow-more');?>
                </a>
            </div>
        </div>
    </div>
</div>