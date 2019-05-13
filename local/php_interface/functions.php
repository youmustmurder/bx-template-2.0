<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

function AppGetCascadeDirProperties($PROPERTY_ID, $default_value = false)
{
    global $APPLICATION;
    $pathMap = explode("/", trim(substr($APPLICATION->GetCurDir(), strlen(SITE_DIR)), "/"));
    do {
        $path = SITE_DIR . implode("/", $pathMap);
        $propertyValue = $APPLICATION->GetDirProperty($PROPERTY_ID, $path, false);
        if ($propertyValue !== false) {
            break;
        }
        array_pop($pathMap);
    }
    while (!empty($pathMap));
    
    return $propertyValue === false ? $default_value : $propertyValue;
}

function GetContentSvgIcon($filename){
    $iconPath = $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/public/images/icons/' . $filename . '.svg';
    if(file_exists($iconPath)){
        return file_get_contents($iconPath);
    }
}