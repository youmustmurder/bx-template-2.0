<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['ITEMS']) {
    foreach ($arResult['ITEMS'] as $k => $arItem) {
        if ($arItem['PROPERTIES']['ICON']['VALUE'] > 0) {
            $img = CFile::ResizeImageGet($arItem['PROPERTIES']['ICON']['VALUE'],
                array(
                    'width' => 48,
                    'height' => 48,
                ),
                BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true,
                array(array("name" => "sharpen", "precision" => 15))
            );
            $arResult['ITEMS'][$k]['PREVIEW_PICTURE'] = array(
                'SRC' => $img['src'],
                'ALT' => $arItem['NAME'],
                'TITLE' => $arItem['TITLE']
            );
        } else {
            $arResult['ITEMS'][$k]['PREVIEW_PICTURE'] = array(
                'SRC' => SITE_TEMPLATE_PATH . '/public/images/noPhoto.png',
                'ALT' => Loc::getMessage('NO_IMAGE'),
                'TITLE' => Loc::getMessage('NO_IMAGE')
            );
        }
    }
}