<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

if ($arResult['ITEMS']) {
    foreach ($arResult['ITEMS'] as $k => $arItem) {
        if ($arItem['PREVIEW_PICTURE']) {
            $arResult['ITEMS'][$k]['PREVIEW_PICTURE']['SRC'] =
                CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'],
                    array(
                        'width' => 275,
                        'height' => 385
                    ),
                    BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
                    false,
                    array(array("name" => "sharpen", "precision" => 15))
                )['src'];
        }
        if ($arItem['PROPERTIES']['REVIEW_CLIENT_DATE']['VALUE']) {
            $arResult['ITEMS'][$k]['PROPERTIES']['REVIEW_CLIENT_DATE']['VALUE'] = $arParams['ACTIVE_DATE_FORMAT'] ?
                FormatDate($arParams['ACTIVE_DATE_FORMAT'], MakeTimeStamp($arItem['PROPERTIES']['REVIEW_CLIENT_DATE']['VALUE'])) :
                $arItem['PROPERTIES']['REVIEW_CLIENT_DATE']['VALUE'];
        }
        if ($arItem['PROPERTIES']['REVIEW_CLIENT_LOGO']['VALUE']) {
            
            $arResult['ITEMS'][$k]['PROPERTIES']['REVIEW_CLIENT_LOGO']['SRC'] =
                CFile::ResizeImageGet($arItem['PROPERTIES']['REVIEW_CLIENT_LOGO']['VALUE'],
                    array(
                        'width' => 160,
                        'height' => 60
                    ),
                    BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
                    false,
                    array(array("name" => "sharpen", "precision" => 15))
                )['src'];
        }
    }
}