<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arSizes = array(
    'quad' => array(
        'width' => 215,
        'height' => 190,
    ),
    'vertical' => array(
        'width' => 500,
        'height' => 190,
    ),
    'horizontal' => array(
        'width' => 220,
        'height' => 445
    )
);
if ($arResult['SECTIONS']) {
    $index = 1;
    foreach ($arResult['SECTIONS'] as $key => $arSection) {
        if ($index == 3 || $index == 5) {
            $imgSize = $index == 3 ? $arSizes['horizontal'] : $arSizes['vertical'];
        } else {
            $imgSize = $arSizes['quad'];
        }
        if (is_array($arSection['PICTURE'])) {
            $arResult['SECTIONS'][$key]['PICTURE']['SRC'] = CFile::ResizeImageGet(
                $arSection['PICTURE'],
                $imgSize, BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
                true)['src'];
        } else {
            $arResult['SECTIONS'][$key]['PICTURE'] = array(
                'SRC' => SITE_TEMPLATE_PATH . '/public/images/noPhoto.png',
                'ALT' => Loc::getMessage('NO_IMAGE'),
                'TITLE' => Loc::getMessage('NO_IMAGE')
            );
        }
        $index++;
    }
}
