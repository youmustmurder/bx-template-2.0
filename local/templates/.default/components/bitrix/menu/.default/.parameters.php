<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arTemplateParameters = array(
    "MAX_ITEMS" => array(
        "NAME" => Loc::getMessage('MAX_ITEMS_TITLE'),
        "TYPE" => "STRING"
    )
);

