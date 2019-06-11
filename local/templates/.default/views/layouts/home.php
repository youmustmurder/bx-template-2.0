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
                <form action="">
					<div class="form-field">
						<input type="text" placeholder="Имя клиента" class="input input_underline">
					</div>
					<div class="form-field">
						<input type="text" placeholder="Номер телефона" class="input input_underline">
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

</main>