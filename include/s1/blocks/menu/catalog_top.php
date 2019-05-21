<?$APPLICATION->IncludeComponent(
    "bitrix:menu",
    ".default",
    array(
        "COMPONENT_TEMPLATE" => ".default",
        "ROOT_MENU_TYPE" => "catalog",
        "MENU_CACHE_TYPE" => "N",
        "MENU_CACHE_TIME" => "3600",
        "MENU_CACHE_USE_GROUPS" => "Y",
        "MENU_CACHE_GET_VARS" => array(
        ),
        "MAX_LEVEL" => "2",
        "CHILD_MENU_TYPE" => "left",
        "USE_EXT" => "Y",
        "DELAY" => "N",
        "ALLOW_MULTI_SELECT" => "N"
    ),
    false
);?>