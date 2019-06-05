<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/script.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');

?>
<footer class="footer">
    <div class="footer__top footer-top">
        <div class="container">
            <div class="row">
                <div class="footer__nav footer-nav col-12">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        ".default",
                        array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "Y",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "footer",
                            "USE_EXT" => "N",
                            "COMPONENT_TEMPLATE" => ".default",
                            "COMPOSITE_FRAME_MODE" => "A",
                            "COMPOSITE_FRAME_TYPE" => "AUTO"
                        ),
                        false
                    );?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom footer-bottom">
        <div class="container">
            <div class="row footer-bottom__wrap">
                <div class="col-12 col-sm-6 footer__copyright">
                    <?$APPLICATION->IncludeFile("/include/".SITE_ID."/copyright.php", [], ["SHOW_BORDER" => true, "MODE" => "text"]);?>
                </div>
                <div class="col-12 col-md-4 footer__socials footer-socials">
                    <a href="#" class="footer-socials__item">
                        <?=GetContentSvgIcon('vk');?>
                    </a>
                    <a href="#" class="footer-socials__item">
                        <?=GetContentSvgIcon('fb');?>
                    </a>
                    <a href="#" class="footer-socials__item">
                        <?=GetContentSvgIcon('ig');?>
                    </a>
                    <a href="#" class="footer-socials__item">
                        <?=GetContentSvgIcon('tw');?>
                    </a>
                </div>
                <div class="col-12 col-sm-6 footer__developer">
                    <a rel="nofollow" href="https://website96.ru/" target="_blank" title="Разработано Website96"><?=GetContentSvgIcon('logo')?></a>
                </div>
            </div>
        </div>
    </div>
</footer>