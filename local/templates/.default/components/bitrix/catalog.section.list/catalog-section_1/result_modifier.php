<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['SECTIONS']) {
    $index = 1;
    foreach ($arResult['SECTIONS'] as $k => $arSection) {
        if ($index <= $arParams['MAX_ITEMS']) {
            if ($arSection['UF_SECTION_SUBTITLE'] == false) {
                $subTitle = $arSection['UF_ANONS'] ?: '';
            } else {
                $rs = CIBlockElement::GetList(
                    array('property_PRODUCT_PRICE' => 'asc'),
                    array(
                        'IBLOCK_ID' => $arSection['IBLOCK_ID'],
                        'SECTION_ID' => $arSection['ID'],
                        'INCLUDE_SUBSECTIONS' => 'Y'
                    ),
                    false,
                    array('nTopCount' => 1),
                    array('ID', 'IBLOCK_ID', 'NAME', 'PRODUCT_PRICE')
                );
                $ar = $rs->Fetch();
                if (strlen($ar['PROPERTY_PRODUCT_PRICE_VALUE']) > 0) {
                    $subTitle = intval($ar['PROPERTY_PRODUCT_PRICE_VALUE']) > 0 ?
                        Loc::getMessage('FROM_PRICE') .
                        number_format($ar['PROPERTY_PRODUCT_PRICE_VALUE'], 0, '', ' ') .
                        Loc::getMessage('CURRENCY_PRICE') :
                        $ar['PROPERTY_PRODUCT_PRICE_VALUE'];
                }
            }
            $arResult['SECTIONS'][$k]['SUBTITLE'] = $subTitle;
            if ($arSection['PICTURE']) {
                $img = CFile::ResizeImageGet($arSection['PICTURE'],
                    array(
                        'width' => 430,
                        'height' => 300
                    ),
                    BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true, array());
                $arResult['SECTIONS'][$k]['PICTURE']['SRC'] = $img['src'];
            } else {
                $arResult['SECTIONS'][$key]['PICTURE'] = array(
                    'SRC' => SITE_TEMPLATE_PATH . '/public/images/noPhoto.png',
                    'ALT' => Loc::getMessage('NO_IMAGE'),
                    'TITLE' => Loc::getMessage('NO_IMAGE')
                );
            }
        } else {
            unset($arResult['SECTIONS'][$k]);
        }
        $index++;
    }
}