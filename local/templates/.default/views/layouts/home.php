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
</main>