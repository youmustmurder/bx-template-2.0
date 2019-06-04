<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */
global $arCurrentSetting;

/*slider*/

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

/*sections*/

/* $APPLICATION->IncludeFile(
    "/include/" . SITE_ID . "/blocks/home-section/" . $arCurrentSetting['SECTIONS'] . ".php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php"
    )
); */

/*products*/

/* $APPLICATION->IncludeFile(
    "/include/" . SITE_ID . "/blocks/home-product/" . $arCurrentSetting['PRODUCTS'] . ".php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php"
    )
); */

/*services*/

$APPLICATION->IncludeFile(
    "/include/" . SITE_ID . "/blocks/home-services/" . $arCurrentSetting['SERVICES'] . ".php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php"
    )
);

/*seo text*/

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

/*about*/

/* $APPLICATION->IncludeFile(
    "/include/" . SITE_ID . "/blocks/home-about/2.php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php"
    )
);

/*news*/

/*  $APPLICATION->IncludeFile(
    "/include/" . SITE_ID . "/blocks/home-news/1.php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php"
    )
); */

/*reviews*/

$APPLICATION->IncludeFile(
    "/include/" . SITE_ID . "/blocks/home-reviews/" . $arCurrentSetting['REVIEWS'] . ".php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php"
    )
);


?>

</main>