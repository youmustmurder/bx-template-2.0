<?
CHTTP::SetStatus("404 Not Found");
defined("ERROR_404") || define("ERROR_404", "Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("404 - Страница не найдена");
$APPLICATION->SetPageProperty("PAGE_LAYOUT", "column1");
?>
    <div class="t404">
        <div style="font-size:44px;line-height:50px;text-transform:uppercase;">Ошибка 404</div>
        <div style="font-size:18px;line-height:32px;color:#666666;">Страница не найдена</div>
        <div style="font-size:13px;margin:14px 0 35px;">Неправильно набран адрес или такой<br />страницы не существует</div>
        <a href="<?=SITE_DIR?>" class="btn btn-default btn-lg">Перейти на главную</a>
        <?if($_SERVER["HTTP_REFERER"]):?>
            <div>
                или <a href="<?=$_SERVER["HTTP_REFERER"]?>">вернуться назад</a>
            </div>
        <?endif;?>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>