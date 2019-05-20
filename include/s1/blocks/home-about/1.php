<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

$APPLICATION->IncludeComponent(
    'bitrix:news.list',
    "home-about_1",
    array(
        'IBLOCK_ID' => 15,
        'NEWS_COUNT' => 9
    )
);