<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['ITEMS']) {
    foreach ($arResult['ITEMS'] as $k => $arItem) {
        if ($arItem['PREVIEW_PICTURE']['ID'] > 0) {
            $arSize = $k == 0 ?
                array(
                    'width' => 360,
                    'height' => 370
                ) :
                array(
                    'width' => 290,
                    'height' => 200
                );
            $img = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'],
                array(
                    'width' => 255,
                    'height' => 205
                ),
                BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true, array(
                    array("name" => "sharpen", "precision" => 15)
                ));
            $arResult['ITEMS'][$k]['PREVIEW_PICTURE']['SRC'] = $img['src'];
        } else {
            $arResult['ITEMS'][$k]['PREVIEW_PICTURE'] = array(
                'SRC' => SITE_TEMPLATE_PATH . '/public/images/noPhoto.png',
                'ALT' => Loc::getMessage('NO_IMAGE'),
                'TITLE' => Loc::getMessage('NO_IMAGE')
            );
        }
    }
}
