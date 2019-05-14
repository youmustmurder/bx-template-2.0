<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

require_once __DIR__ . "/functions.php";

if (!defined('ADMIN_SECTION')) {
//    AddEventHandler("main", "OnEndBufferContent", "ChangeMyContent");
    function ChangeMyContent(&$content){
        if (preg_match('/<\!DOCTYPE html>/uis', $content)) {
            $content = trim(preg_replace('/\>([\s\t\r\n]+)\</uis', "><", $content));
        }
    }
    
    
    AddEventHandler("main", "OnBeforeProlog", "ConfirmFZ152");
    global $APPLICATION;
    function ConfirmFZ152(){
        if ($_REQUEST["CONFIRM_FZ152"] == "Y" && \Bitrix\Main\Context::getCurrent()->getRequest()->isAjaxRequest()) {
            setcookie("confirm_fz152", "y", time()+60*60*24*30*12*2);
            die();
        }
    }
    
    AddEventHandler("main", "OnLayoutRender", function () {
        global $APPLICATION;
        $pageCanonicalUrl = $APPLICATION->GetPageProperty("canonical", false);
        $request = \Bitrix\Main\Context::getCurrent()->getRequest();
        if ($pageCanonicalUrl === false) {
            $canonical = [
                ($request->isHttps() ? "https://" : "http://"),
                $request->getHttpHost(),
                $APPLICATION->GetCurDir(),
            ];
            $APPLICATION->SetPageProperty("canonical", implode("", $canonical));
        }
        $robotsContent = $APPLICATION->GetPageProperty("robots", false);
        if ($robotsContent === false) {
            $robotsFile = new \Bitrix\Seo\RobotsFile(SITE_ID);
            $disallowRules = $robotsFile->getRules("Disallow");
            $isRobotsDisallow = false;
            if (!empty($disallowRules)) {
                foreach ($disallowRules as $rule) {
                    $matchRule = preg_quote($rule[1], "#");
                    $matchRule = str_replace('\*', '.*', $matchRule);
                    if (preg_match("#^" . $matchRule . "#", $request->getRequestUri())) {
                        $isRobotsDisallow = true;
                        break;
                    }
                }
            }
            if (!$isRobotsDisallow) {
                $APPLICATION->SetPageProperty("robots", "index, follow");
            }
            else {
                $APPLICATION->SetPageProperty("robots", "noindex, nofollow");
            }
        }
    });
}