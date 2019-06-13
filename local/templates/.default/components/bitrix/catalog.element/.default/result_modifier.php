<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['PROPERTIES']['PRODUCT_MORE_IMAGES']['VALUE']) {
    if ($arResult['PREVIEW_PICTURE']) {
        $arResult['MORE_IMAGES'][] = array(
            'SRC' => $arResult['PREVIEW_PICTURE']['SRC'],
            'RESIZE_SRC' => CFile::ResizeImageGet(
                $arResult['PREVIEW_PICTURE']['ID'],
                array(
                    'width' => 90,
                    'height' => 90
                ),
                BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
                false
            )['src']
        );
    }
    foreach ($arResult['PROPERTIES']['PRODUCT_MORE_IMAGES']['VALUE'] as $k => $id) {
        $image = CFile::ResizeImageGet(
            $id,
            array(
                'width' => 90,
                'height' => 90
            ),
            BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
            false
        );
        $arResult['MORE_IMAGES'][$k] = array(
            'RESIZE_SRC' => $image['src'],
            'SRC' => CFile::GetPath($id)
        );
    }
    
    if (strlen($arResult['PROPERTIES']['PRODUCT_PRICE']['VALUE']) > 0) {
        if (intval($arResult['PROPERTIES']['PRODUCT_PRICE']['VALUE']) > 0) {
            $arResult['PRICE'] = array(
                'VALUE' => number_format($arResult['PROPERTIES']['PRODUCT_PRICE']['VALUE'], 0, '', ' '),
                'CURRENCY' => 'Y'
            );
        } else {
            $arResult['PRICE'] = array(
                'VALUE' => $arResult['PROPERTIES']['PRODUCT_PRICE']['VALUE'],
                'CURRENCY' => 'N'
            );
        }
    }
    if (strlen($arResult['PROPERTIES']['PRODUCT_OLD_PRICE']['VALUE']) > 0 || $arResult['PROPERTIES']['PRODUCT_DISCOUNT']['VALUE']) {
        if (intval($arResult['PROPERTIES']['PRODUCT_OLD_PRICE']['VALUE']) > 0) {
            $arResult['OLD_PRICE'] = array(
                'VALUE' => number_format($arResult['PROPERTIES']['PRODUCT_OLD_PRICE']['VALUE'], 0, '', ' '),
                'CURRENCY' => 'Y'
            );
        } else {
            if (empty($arResult['PROPERTIES']['PRODUCT_OLD_PRICE']['VALUE']) && $arResult['PROPERTIES']['PRODUCT_DISCOUNT']['VALUE']) {
                if (intval($arResult['PROPERTIES']['PRODUCT_PRICE']['VALUE']) > 0) {
                    $oldPrice = $arResult['PROPERTIES']['PRODUCT_PRICE']['VALUE'] * (100 - $arResult['PROPERTIES']['PRODUCT_DISCOUNT']['VALUE']) / 100;
                    $arResult['OLD_PRICE'] = array(
                        'VALUE' => number_format($oldPrice, 0, '', ' '),
                        'CURRENCY' => intval($oldPrice) > 0 ? 'Y' : 'N'
                    );
                }
                
            } else {
                $arResult['OLD_PRICE'] = array(
                    'VALUE' => $arResult['PROPERTIES']['PRODUCT_OLD_PRICE']['VALUE'],
                    'CURRENCY' => 'N'
                );
            }
            
        }
    }
    if ($arResult['PROPERTIES']['PRODUCT_STATUS']['VALUE_XML_ID'] == 'in__stock') {
        $class = 'product-info-presence_stock';
        $value = $arResult['PROPERTIES']['PRODUCT_STATUS']['VALUE'];
    } elseif ($arResult['PROPERTIES']['PRODUCT_STATUS']['VALUE_XML_ID'] == 'under__order') {
        $class = 'product-info-presence_booking';
        $value = $arResult['PROPERTIES']['PRODUCT_STATUS']['VALUE'];
    } else {
        $class = 'product-info-presence_missing';
        $value = Loc::getMessage('PRODUCT_DEFAULT_STATUS_MISSING');
    }
    $arResult['PRODUCT_STATUS'] = array(
        'VALUE' => $value,
        'CLASS' => $class
    );
}