<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['ITEMS']) {
    foreach ($arResult['ITEMS'] as $k => $arItem) {
        $arResult['ITEMS'][$k]['CATEGORY'] = CIBlockSection::GetByID($arItem['IBLOCK_SECTION_ID'])->Fetch()['NAME'];
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
                BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true, array());
            $arResult['ITEMS'][$k]['PREVIEW_PICTURE']['SRC'] = $img['src'];
        } else {
            $arResult['ITEMS'][$k]['PREVIEW_PICTURE'] = array(
                'SRC' => SITE_TEMPLATE_PATH . '/public/images/noPhoto.png',
                'ALT' => Loc::getMessage('NO_IMAGE'),
                'TITLE' => Loc::getMessage('NO_IMAGE')
            );
        }
        if (strlen($arItem['PROPERTIES']['PRODUCT_PRICE']['VALUE']) > 0) {
            if (intval($arItem['PROPERTIES']['PRODUCT_PRICE']['VALUE']) > 0) {
                $arResult['ITEMS'][$k]['PRICE']  = number_format($arItem['PROPERTIES']['PRODUCT_PRICE']['VALUE'], 0, '', ' ');
                $arResult['ITEMS'][$k]['CURRENCY'] = 'Y';
            } else {
                $arResult['ITEMS'][$k]['PRICE'] = $arItem['PROPERTIES']['PRODUCT_PRICE']['VALUE'];
                $arResult['ITEMS'][$k]['CURRENCY'] = 'N';
            }
        }
    }
}
