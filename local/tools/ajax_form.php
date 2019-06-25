<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Application,
    Bitrix\Main\Security\Sign\Signer,
    Bitrix\Main\Security\Sign\BadSignatureException;

define('STOP_STATISTICS', true);
define('NO_KEEP_STATISTIC', 'Y');
define('NO_AGENT_STATISTIC', 'Y');
define('DisableEventsCheck', true);
define('BX_SECURITY_SHOW_MESSAGE', true);
define('XHR_REQUEST', true);


require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

$request = Application::getInstance()->getContext()->getRequest();


$signer = new Signer;
try {
    $params = $signer->unsign(base64_decode(urldecode($request->get('sign'))), "ajax-form_" . $request->get('ajax-form'));
    $arParams = unserialize(base64_decode($params));
}
catch (BadSignatureException $e) {
    die();
}

require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_after.php");


$APPLICATION->IncludeComponent(
    "website96:web.forms",
    $arParams["COMPONENT_TEMPLATE"],
    $arParams,
    false
);

