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
    $iconPath = $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/frontend/main/images/icons/' . $filename . '.svg';
    if(file_exists($iconPath)){
        return file_get_contents($iconPath);
    }
}

/**
 * @param      $dirPath
 *
 * @return string
 */
function GetCurDir($dirPath)
{
    if (!$dirPath) {
        return false;
    }
    $path = str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/', $dirPath));
    return substr($path, 0, 1)  == '/' ? $path : '/' . $path;
}

/**
 * @param      $number
 * @param      $titles
 * @param bool $appendNumber
 *
 * @return string
 */
function NumPluralForm($number, $titles, $appendNumber = false)
{
    $cases = array(2, 0, 1, 1, 1, 2);
    
    return ($appendNumber ? ($number . " ") : "") . $titles[ ($number % 100 > 4
            && $number % 100 < 20) ? 2 : $cases[ min($number
            % 10, 5) ] ];
}

function dump($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}