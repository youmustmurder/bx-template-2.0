<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['SECTIONS']) {
    foreach ($arResult['SECTIONS'] as $k => $arSection) {
        $arResult['SECTIONS'][$k]['COUNT_ELEMENTS'] = CIBlockSection::GetSectionElementsCount(
            $arSection['ID'],
            array(
                'CNT_ACTIVE' => 'Y'
            )
        );
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
            $arResult['SECTIONS'][$k]['PRICE'] = intval($ar['PROPERTY_PRODUCT_PRICE_VALUE']) > 0 ?
                Loc::getMessage('FROM_PRICE') .
                number_format($ar['PROPERTY_PRODUCT_PRICE_VALUE'], 0, '', ' ') .
                Loc::getMessage('CURRENCY_PRICE') :
                $ar['PROPERTY_PRODUCT_PRICE_VALUE'];
        }
        if ($arSection['PICTURE']) {
            $img = CFile::ResizeImageGet($arSection['PICTURE'],
                array('width' => 255, 'height' => 205),
                BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true, array(array("name" => "sharpen", "precision" => 15)));
            $arResult['SECTIONS'][$k]['PICTURE']['SRC'] = $img['src'];
        }
    }
}