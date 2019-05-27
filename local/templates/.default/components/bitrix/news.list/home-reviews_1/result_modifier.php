<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

if ($arResult['ITEMS']) {
    foreach ($arResult['ITEMS'] as $k => $arItem) {
        if ($arItem['PREVIEW_PICTURE']) {
            $img = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'],
                array(
                    'width' => 60,
                    'height' => 60
                ),
                BX_RESIZE_IMAGE_PROPORTIONAL,
                false,
                array(array("name" => "sharpen", "precision" => 15))
            );
            $arResult['ITEMS'][$k]['PREVIEW_PICTURE']['SRC'] = $img['src'];
        }
    }
}