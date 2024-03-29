<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

if ($arResult['ITEMS']) {
    foreach ($arResult['ITEMS'] as $k => $arItem) {
        if ($arItem['PROPERTIES']['REVIEW_CLIENT_LOGO']['VALUE']) {
            $img = CFile::ResizeImageGet($arItem['PROPERTIES']['REVIEW_CLIENT_LOGO']['VALUE'],
                array(
                    'width' => 300,
                    'height' => 60
                ),
                BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
                false,
                array(array("name" => "sharpen", "precision" => 15))
            );
            $arResult['ITEMS'][$k]['PROPERTIES']['REVIEW_CLIENT_LOGO']['SRC'] = $img['src'];
        }
        if ($arItem['PROPERTIES']['REVIEW_CLIENT_DATE']['VALUE']) {
            $arResult['ITEMS'][$k]['PROPERTIES']['REVIEW_CLIENT_DATE']['VALUE'] = $arParams['ACTIVE_DATE_FORMAT'] ?
                FormatDate($arParams['ACTIVE_DATE_FORMAT'], MakeTimeStamp($arItem['PROPERTIES']['REVIEW_CLIENT_DATE']['VALUE'])) :
                $arItem['PROPERTIES']['REVIEW_CLIENT_DATE']['VALUE'];
        }
    }
}