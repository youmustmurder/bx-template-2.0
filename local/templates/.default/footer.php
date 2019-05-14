<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Loader,
    Bitrix\Main\Page\Asset,
    Bitrix\Main\Localization\Loc,
    Bitrix\Main\Diag\Debug;

Loader::includeModule('website.template');

$pageContent = ob_get_clean();
$pageContent = trim(implode("", $APPLICATION->buffer_content)) . $pageContent;
$APPLICATION->RestartBuffer();
ob_end_clean();

if (function_exists("getmoduleevents")) {
    foreach (GetModuleEvents("main", "OnLayoutRender", true) as $arEvent) {
        ExecuteModuleEventEx($arEvent);
    }
}

$pageLayout = $APPLICATION->GetPageProperty("PAGE_LAYOUT", AppGetCascadeDirProperties("PAGE_LAYOUT", "column1"));

//CWebsiteTemplate::$demoMode = true;
$arCurrentSetting = CWebsiteTemplate::getTemplateSetting();

//load theme css
CWebsiteTemplate::loadCss();

//load main css
Asset::getInstance()->addCss($APPLICATION->GetTemplatePath("public/css/main.css"));
?>
<!doctype html>
<html lang="<?=$arLang['LANGUAGE_ID']?>">
    <head>
        <base href="/">
        <link rel="shortcut icon" href="<?=SITE_DIR?>favicon.ico">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="UTF-8">
        <?$APPLICATION->ShowHead(); ?>
        <title><?=$APPLICATION->GetTitle(false)?></title>
    </head>
<body>
<?$APPLICATION->IncludeFile(
    "views/header/header_responsive.php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php"
    )
);?>
<?if ($APPLICATION->GetCurPage(false) == SITE_DIR) {?>
    <?$APPLICATION->IncludeFile(
        "views/layouts/home.php",
        array(
            "CONTENT" => $pageContent
        ),
        array(
            "SHOW_BORDER" => false,
            "MODE" => "php"
        )
    );?>
<?} else {?>
    <?$APPLICATION->IncludeFile(
        "views/layouts/".$pageLayout.".php",
        array(
            "CONTENT" => $pageContent,
        ),
        array(
            "SHOW_BORDER" => false,
            "MODE" => "php"
        )
    );?>
<?}?>
<?$APPLICATION->RestartWorkarea(true);?>
<?$APPLICATION->IncludeFile(
    "views/footer/template.php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php"
    )
);?>
<?if($_COOKIE["confirm_fz152"] != 'y'){?>
    <?$APPLICATION->IncludeComponent(
        "website96:inline.value",
        "fz152",
        array(
            "COMPONENT_TEMPLATE" => "fz152",
            "VALUE" => "Сайт использует файлы cookies и сервис сбора технических данных его посетителей.  Продолжая использовать данный ресурс, вы автоматически соглашаетесь с использованием данных технологий."
        ),
        false
    );?>
<?}?>
<?
CJSCore::Init(['jquery2']);

//include js scripts
Asset::getInstance()->addJs($APPLICATION->GetTemplatePath("public/js/app.js"));

?>
<?$APPLICATION->ShowBodyScripts();?>
</body>
