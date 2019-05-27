<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

if ($arResult['ITEMS']) {
    foreach ($arResult['ITEMS'] as $k => $arItem) {
        if ($arItem['PROPERTIES']['PRODUCT']['VALUE']) {
            $arProduct = array();
            $rsProduct = CIBlockElement::GetList(
                array(),
                array(
                    'ID' => $arItem['PROPERTIES']['PRODUCT']['VALUE'],
                    'IBLOCK_CODE' => 'catalog',
                    'ACTIVE' => 'Y'
                ), false, array(),
                array('ID', 'IBLOCK_ID', 'NAME', 'DETAIL_PAGE_URL', 'PREVIEW_PICTURE', 'PROPERTY_PRODUCT_PRICE')
            );
            while ($ar = $rsProduct->GetNext()) {
                if ($ar['PREVIEW_PICTURE']) {
                    $ar['PREVIEW_PICTURE'] = CFile::ResizeImageGet($ar['PREVIEW_PICTURE'],
                        array(
                            'width' => 96,
                            'height' => 96
                        ),
                        BX_RESIZE_IMAGE_PROPORTIONAL, false,
                        array(array("name" => "sharpen", "precision" => 15))
                    )['src'];
                }
                if (intval($ar['PROPERTY_PRODUCT_PRICE_VALUE']) > 0) {
                    $ar['PROPERTY_PRODUCT_PRICE_VALUE'] = number_format($ar['PROPERTY_PRODUCT_PRICE_VALUE'], 0, '', ' ');
                    $ar['CURRENCY'] = 'Y';
                } else {
                    $ar['CURRENCY'] = 'N';
                }
                $arProduct = $ar;
            }
            $arResult['ITEMS'][$k]['PROPERTIES']['PRODUCT'] = array_merge($arResult['ITEMS'][$k]['PROPERTIES']['PRODUCT'], $arProduct);
        }
    }
}