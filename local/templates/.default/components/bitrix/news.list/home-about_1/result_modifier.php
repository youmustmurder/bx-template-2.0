<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

if ($arResult['ITEMS']) {
    foreach ($arResult['ITEMS'] as $k => $arItem) {
        if (is_array($arItem['PROPERTIES']['ICON_FILE']) && $arItem['PROPERTIES']['ICON_FILE']['VALUE']) {
            $img = CFile::ResizeImageGet(
                $arItem['PROPERTIES']['ICON_FILE']['VALUE'],
                array(
                    'width' => 48,
                    'height' => 48
                ),
                BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
                false
            );
            $arResult['ITEMS'][$k]['PICTURE'] = $img['src'];
        }
    }
}