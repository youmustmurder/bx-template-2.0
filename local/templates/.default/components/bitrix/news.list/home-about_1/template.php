<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

global $arCurrentSetting;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/script.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');
?>

<div class="around">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-7">
                <div class="around__info">
                    <h2 class="around__title">О компании</h2>
                    <div class="around__text">Бальнеоклиматический курорт, в первом приближении, неравномерен. Обезьяна-ревун применяет страх. Стресс слабопроницаем. Южное полушарие, куда входят Пик-Дистрикт, Сноудония и другие многочисленные национальные резерваты природы и парки, превышает депрессивный памятник Средневековья. </div>
                    <a href="#" class="btn__link btn__link--bold btn__link--green btn__link--icon-r around__link-all">
                        Перейти к странице о компании
                        <?=GetContentSvgIcon('arrow_right');?>
                    </a>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="around__blocks">
                    <div class="around__block">
                        <div class="around__pic">
                            <img src="\local\templates\.default\frontend\main\images\icons\around.png" alt="">
                        </div>
                        <div class="around__desc">
                            <div class="around__desc-title">Глауберова соль</div>
                            <div class="around__desc-text">Бальнеоклиматический курорт, в первом приближении, неравномерен.</div>
                        </div>
                    </div>
                    <div class="around__block">
                        <div class="around__pic">
                            <img src="\local\templates\.default\frontend\main\images\icons\around.png" alt="">
                        </div>
                        <div class="around__desc">
                            <div class="around__desc-title">Глауберова соль</div>
                            <div class="around__desc-text">Бальнеоклиматический курорт, в первом приближении, неравномерен.</div>
                        </div>
                    </div>
                    <div class="around__block">
                        <div class="around__pic">
                            <img src="\local\templates\.default\frontend\main\images\icons\around.png" alt="">
                        </div>
                        <div class="around__desc">
                            <div class="around__desc-title">Глауберова соль</div>
                            <div class="around__desc-text">Бальнеоклиматический курорт, в первом приближении, неравномерен.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>