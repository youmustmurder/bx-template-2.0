<?
use Bitrix\Main\Localization\Loc,
    Bitrix\Main\Diag\Debug;

Loc::loadMessages(__FILE__);

Class website_template extends CModule
{
    var $MODULE_ID = "website.template";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_CSS;
    var $PATH;

    function website_template()
    {
        $arModuleVersion = array();

        $path = str_replace("\\", "/", __FILE__);
        $path = substr($path, 0, strlen($path) - strlen("/index.php"));
        $this->PATH = $path;
        include($path."/version.php");
        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion))
        {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }
        $this->MODULE_NAME = Loc::getMessage('WEBSITE_TEMPLATE_MODULE_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('WEBSITE_TEMPLATE_MODULE_DESCRIPTION');
        $this->PARTNER_NAME = Loc::getMessage('WEBSITE_TEMPLATE_PARTNER');
        $this->PARTNER_URI = Loc::getMessage('WEBSITE_TEMPLATE_PARTNER_URI');
        
    }

    function DoInstall()
    {
        global $DOCUMENT_ROOT, $APPLICATION;
        // Install events
        Debug::dump($this->PATH);
        //RegisterModuleDependences("iblock", "OnAfterIBlockElementUpdate", "website.template", "CWebsiteTemplate", "onBeforeElementUpdateHandler");
        RegisterModule($this->MODULE_ID);
        $APPLICATION->IncludeAdminFile(Loc::getMessage('WEBSITE_TEMPLATE_INSTALL'), $this->PATH . '/step.php');
        return true;
    }

    function DoUninstall()
    {
        global $DOCUMENT_ROOT, $APPLICATION;
        //UnRegisterModuleDependences("iblock", "OnAfterIBlockElementUpdate", "website.template", "CWebsiteTemplate", "onBeforeElementUpdateHandler");
        UnRegisterModule($this->MODULE_ID);
        $APPLICATION->IncludeAdminFile(Loc::getMessage('WEBSITE_TEMPLATE_UNINSTALL'), $this->PATH . '/unstep.php');
        return true;
    }
}