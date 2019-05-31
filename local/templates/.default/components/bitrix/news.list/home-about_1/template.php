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
            <div class="col-12 col-md-7">
                <div class="around__info">
                    <h2 class="around__title">О компании</h2>
                    <div class="around__text">Бальнеоклиматический курорт, в первом приближении, неравномерен. Обезьяна-ревун применяет страх. Стресс слабопроницаем. Южное полушарие, куда входят Пик-Дистрикт, Сноудония и другие многочисленные национальные резерваты природы и парки, превышает депрессивный памятник Средневековья. </div>
                    <a href="#" class="link link_success link_icon-right around__link-all">
                        Перейти к странице о компании
                        <?=GetContentSvgIcon('arrow_right');?>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="around__blocks">
                    <div class="around__block around-block">
                        <div class="around__pic">
                            <img src="<?=GetCurDir(__DIR__)?>/uploads/pic1.png" alt="Глауберова соль">
                        </div>
                        <div class="around__desc">
                            <div class="around__desc-title">Глауберова соль</div>
                            <div class="around__desc-text">Бальнеоклиматический курорт, в первом приближении, неравномерен.</div>
                        </div>
                    </div>
                    <div class="around__block around-block">
                        <div class="around__pic">
							<img src="<?=GetCurDir(__DIR__)?>/uploads/pic2.png" alt="Глауберова соль">
                        </div>
                        <div class="around__desc">
                            <div class="around__desc-title">Действие противоречи</div>
                            <div class="around__desc-text">Бальнеоклиматический курорт, в первом приближении, неравномерен.</div>
                        </div>
                    </div>
                    <div class="around__block around-block">
                        <div class="around__pic">
							<img src="<?=GetCurDir(__DIR__)?>/uploads/pic3.png" alt="Глауберова соль">
                        </div>
                        <div class="around__desc">
                            <div class="around__desc-title">Южное полушарие</div>
                            <div class="around__desc-text">Бальнеоклиматический курорт, в первом приближении, неравномерен.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>