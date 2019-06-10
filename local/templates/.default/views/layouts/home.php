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
            <button class="modal__close" aria-label="Close modal" data-micromodal-close>
                <svg width="14" height="14" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M16 1L1 16" stroke-width="2" stroke-linecap="round"/><path d="M16 16L1 0.999999" stroke-width="2" stroke-linecap="round"/></g></svg>
            </button>
            <div class="modal__header">
                <h2>Modal</h2>
            </div>
            <div class="modal__body">
                
            </div>
        </div>
    </div>
</div>

</main>