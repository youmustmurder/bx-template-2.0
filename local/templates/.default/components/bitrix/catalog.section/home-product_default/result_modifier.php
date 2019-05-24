<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['ITEMS']) {
    foreach ($arResult['ITEMS'] as $k => $arItem) {
        $arResult['ITEMS'][$k]['PARENT_SECTION'] = CIBlockSection::GetByID($arItem['IBLOCK_SECTION_ID'])->GetNext();
        if ($arItem['PREVIEW_PICTURE']['ID'] > 0) {
            $img = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'],
            array(
                'width' => 180,
                'height' => 200
            ),
            BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true,
                array(array("name" => "sharpen", "precision" => 15))
            );
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
                $arResult['ITEMS'][$k]['PRICE'] = array(
                    'VALUE' => number_format($arItem['PROPERTIES']['PRODUCT_PRICE']['VALUE'], 0, '', ' '),
                    'CURRENCY' => 'Y'
                );
            } else {
                $arResult['ITEMS'][$k]['PRICE'] = array(
                    'VALUE' => $arItem['PROPERTIES']['PRODUCT_PRICE']['VALUE'],
                    'CURRENCY' => 'N'
                );
            }
        }
        if (strlen($arItem['PROPERTIES']['PRODUCT_OLD_PRICE']['VALUE']) > 0 || $arItem['PROPERTIES']['PRODUCT_DISCOUNT']['VALUE']) {
            if (intval($arItem['PROPERTIES']['PRODUCT_OLD_PRICE']['VALUE']) > 0) {
                $arResult['ITEMS'][$k]['OLD_PRICE'] = array(
                    'VALUE' => number_format($arItem['PROPERTIES']['PRODUCT_OLD_PRICE']['VALUE'], 0, '', ' '),
                    'CURRENCY' => 'Y'
                );
            } else {
                if (empty($arItem['PROPERTIES']['PRODUCT_OLD_PRICE']['VALUE']) && $arItem['PROPERTIES']['PRODUCT_DISCOUNT']['VALUE']) {
                    if (intval($arItem['PROPERTIES']['PRODUCT_PRICE']['VALUE']) > 0) {
                        $oldPrice = $arItem['PROPERTIES']['PRODUCT_PRICE']['VALUE'] * (100 - $arItem['PROPERTIES']['PRODUCT_DISCOUNT']['VALUE']) / 100;
                        $arResult['ITEMS'][$k]['OLD_PRICE'] = array(
                            'VALUE' => number_format($oldPrice, 0, '', ' '),
                            'CURRENCY' => intval($oldPrice) > 0 ? 'Y' : 'N'
                        );
                    }
                    
                } else {
                    $arResult['ITEMS'][$k]['OLD_PRICE'] = array(
                        'VALUE' => $arItem['PROPERTIES']['PRODUCT_OLD_PRICE']['VALUE'],
                        'CURRENCY' => 'N'
                    );
                }
                
            }
        }
    }
}