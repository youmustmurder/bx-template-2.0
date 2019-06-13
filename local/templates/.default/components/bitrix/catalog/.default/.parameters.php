<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arTemplateParameters = array(
    "SHOW_ADVANTAGES" => array(
        'PARENT' => 'BASE',
        'NAME' => Loc::getMessage('CATALOG_SHOW_ADVANTAGES_NAME'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'Y'
    ),
    'USER_CONSENT' => array('HIDDEN' => 'Y'),
    'USER_CONSENT_ID' => array('HIDDEN' => 'Y'),
    'USER_CONSENT_IS_CHECKED' => array('HIDDEN' => 'Y'),
    'USER_CONSENT_IS_LOADED' => array('HIDDEN' => 'Y'),
    'SEF_URL_TEMPLATES_compare' => array('HIDDEN' => 'Y'),
    'PREVIEW_TRUNCATE_LEN' => array('HIDDEN' => 'Y'),
    'ACTIVE_DATE_FORMAT' => array('HIDDEN' => 'Y'),
    'LINE_ELEMENT_COUNT' => array('HIDDEN' => 'Y'),
    'SHOW_TOP_ELEMENTS' => array('HIDDEN' => 'Y'),
    'SECTION_COUNT_ELEMENTS' => array('HIDDEN' => 'Y'),
    'SECTION_BACKGROUND_IMAGE' => array('HIDDEN' => 'Y'),
    'DETAIL_BACKGROUND_IMAGE' => array('HIDDEN' => 'Y'),
    'USE_STORE' => array('HIDDEN' => 'Y'),
    /*add to basket*/
    'BASKET_URL' => array('HIDDEN' => 'Y'),
    'USE_PRODUCT_QUANTITY' => array('HIDDEN' => 'Y'),
    'ADD_PROPERTIES_TO_BASKET' => array('HIDDEN' => 'Y'),
    'PRODUCT_PROPS_VARIABLE' => array('HIDDEN' => 'Y'),
    'PARTIAL_PRODUCT_PROPERTIES' => array('HIDDEN' => 'Y'),
    'PRODUCT_PROPERTIES' => array('HIDDEN' => 'Y'),
);