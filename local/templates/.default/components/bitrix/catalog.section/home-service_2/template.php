<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

global $arCurrentSetting;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/bundle.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');
?>

<section class="services services--grey">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="services__header">
					<h2 class="services__title">Наши услуги</h2>
					<p class="services__text">
						Без кучи документов, поездок в банк и талончиков с номером очереди
					</p>
				</div>
			</div>
		</div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 services__item">
                <div class="services__item-pic">
                    <img src="local/templates/.default/frontend/main/images/services-pic.png" alt="">
                </div>
                <div class="services__item-title">Дизайн</div>
                <div class="services__item-text">Бальнеоклиматический курорт, в первом приближении, неравномерен.</div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 services__item">
                <div class="services__item-pic">
                    <img src="local/templates/.default/frontend/main/images/services-pic.png" alt="">
                </div>
                <div class="services__item-title">Дизайн</div>
                <div class="services__item-text">Бальнеоклиматический курорт, в первом приближении, неравномерен.</div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 services__item">
                <div class="services__item-pic">
                    <img src="local/templates/.default/frontend/main/images/services-pic.png" alt="">
                </div>
                <div class="services__item-title">Дизайн</div>
                <div class="services__item-text">Бальнеоклиматический курорт, в первом приближении, неравномерен.</div>
            </div>
        </div>
	</div>
</section>