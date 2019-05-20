<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */
global $arCurrentSetting;

/*slider*/
$APPLICATION->IncludeFile(
    "/include/" . SITE_ID . "/blocks/home-slider/" . $arCurrentSetting['SLIDER'] . ".php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php"
    )
);

/*sections*/
$APPLICATION->IncludeFile(
    "/include/" . SITE_ID . "/blocks/home-section/" . $arCurrentSetting['SECTIONS'] . ".php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php"
    )
);

/*products*/
$APPLICATION->IncludeFile(
    "/include/" . SITE_ID . "/blocks/home-product/" . $arCurrentSetting['SECTION'] . ".php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php"
    )
);

/*services*/
$APPLICATION->IncludeFile(
    "/include/" . SITE_ID . "/blocks/home-service/" . $arCurrentSetting['SERVICE'] . ".php",
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

/*news*/
$APPLICATION->IncludeComponent(
    'bitrix:news.list',
    $arCurrentSetting['NEWS'],
    array(
        'IBLOCK_ID' => 15,
        'NEWS_COUNT' => 9
    )
);

/*reviews*/
$APPLICATION->IncludeComponent(
    'bitrix:news.list',
    $arCurrentSetting['REVIEWS'],
    array(
        'IBLOCK_ID' => 6,
        'NEWS_COUNT' => 9
    )
);
