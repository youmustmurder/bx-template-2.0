<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */
global $arCurrentSetting;

?>
<main>
<?

$APPLICATION->IncludeFile(
    "/include/" . SITE_ID . "/blocks/home-slider/" . $arCurrentSetting['SLIDER'] . ".php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php"
    )
);

$APPLICATION->IncludeFile(
    "/include/" . SITE_ID . "/blocks/home-section/" . $arCurrentSetting['SECTIONS'] . ".php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php"
    )
);

$APPLICATION->IncludeFile(
    "/include/" . SITE_ID . "/blocks/home-product/" . $arCurrentSetting['PRODUCTS'] . ".php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php"
    )
);

$APPLICATION->IncludeFile(
    "/include/" . SITE_ID . "/blocks/home-stocks/default.php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php"
    )
);

$APPLICATION->IncludeFile(
    "/include/" . SITE_ID . "/blocks/home-services/" . $arCurrentSetting['SERVICES'] . ".php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php"
    )
);

if ($arParams['CONTENT']) {?>
    <div class="text-block text-block--grey">
        <div class="container">
            <div class="col">
                <div class="row">
                    <div class="text">
                        <?=$arParams['CONTENT']?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?}

$APPLICATION->IncludeFile(
    "/include/" . SITE_ID . "/blocks/home-about/" . $arCurrentSetting['ABOUT'] . ".php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php"
    )
);

$APPLICATION->IncludeFile(
    "/include/" . SITE_ID . "/blocks/home-news/" . $arCurrentSetting['NEWS'] . ".php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php"
    )
);

$APPLICATION->IncludeFile(
    "/include/" . SITE_ID . "/blocks/home-reviews/" . $arCurrentSetting['REVIEWS'] . ".php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php"
    )
);?>

<div class="modal micromodal-slide" id="modal1" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true">
            <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            <div class="modal__header">
                <h3 class="modal__title">Оставить заявку</h3>
            </div>
            <div class="modal__body">
                <form action="" class="callback-form">
					<div class="form-field">
						<input type="text" name="name" placeholder="Имя клиента" class="input input_underline">
					</div>
					<div class="form-field">
						<input type="text" name="phone" placeholder="Номер телефона" class="input input_underline">
					</div>
					<div class="form-field">
						<label class="checkbox">
							<input type="checkbox" name="checkbox" value="two" checked="checked">
							<span class="checkbox__inner"></span>
							<span class="checkbox__text">
								Я даю свое согласие на обработку персональных данных. Политика обработки персональных данных
							</span>
						</label>
					</div>
					<div class="d-flex justify-content-end">
						<button type="submit" class="btn btn_round btn_mid btn_primary">Отправить</button>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

<div class="modal micromodal-slide" id="modal_product" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true">
            <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            <div class="modal__header">
                <h3 class="modal__title">Оформление заказа</h3>
            </div>
            <div class="modal__body">
				<div class="b-fast-order">
                    <div class="b-fast-order__image" style="background-image: url(/upload/resize_cache/iblock/fd8/96_96_0/fd8bbbee143ac892b4a73c1b2c130222.jpg)" ;=""></div>
					<div class="b-fast-order__content">
						<div class="b-fast-order__name">Ноутбук Apple MacBook 12", Silver (MNYH2RU/A)</div>
						<div class="b-fast-order__price-wrap">
							<span class="b-fast-order__price">90 000</span>
							<span class="b-fast-order__price b-fast-order__price_old">99 000</span>
						</div>
					</div>
				</div>
                <form action="" class="callback-form">
					<div class="form-field">
						<input type="text" name="name" placeholder="Имя клиента" class="input input_underline">
					</div>
					<div class="form-field">
						<input type="text" name="phone" placeholder="Номер телефона" class="input input_underline">
					</div>
					<div class="form-field">
						<label class="checkbox">
							<input type="checkbox" name="checkbox" value="two" checked="checked">
							<span class="checkbox__inner"></span>
							<span class="checkbox__text">
								Я даю свое согласие на обработку персональных данных. Политика обработки персональных данных
							</span>
						</label>
					</div>
					<div class="d-flex justify-content-end">
						<button type="submit" class="btn btn_round btn_mid btn_primary">Оформить заказ</button>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

</main>