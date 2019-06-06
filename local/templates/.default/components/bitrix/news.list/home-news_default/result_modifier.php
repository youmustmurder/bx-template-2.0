<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */
if ($arResult['ITEMS']) {
    foreach ($arResult['ITEMS'] as $k => $arItem) {
        if ($arItem['DISPLAY_ACTIVE_FROM']) {
            $arResult['ITEMS'][$k]['DATE_NEWS'] = explode(' ', $arItem['DISPLAY_ACTIVE_FROM']);
        }
    }
}
