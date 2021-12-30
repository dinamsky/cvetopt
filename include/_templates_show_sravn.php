<?	
$APPLICATION->IncludeComponent(
	"bitrix:catalog.compare.list", 
	"sravnenie", 
	array(
		"IBLOCK_TYPE" => "shop_samovar_catalog", //РЎСЋРґР° РІР°С€ С‚РёРї РёРЅС„РѕР±Р»РѕРєР° РєР°С‚Р°Р»РѕРіР°
		"IBLOCK_ID" => "9", //РЎСЋРґР° РІР°С€ ID РёРЅС„РѕР±Р»РѕРєР° РєР°С‚Р°Р»РѕРіР°
		"POSITION_FIXED" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"DETAIL_URL" => "#SECTION_CODE#",
		"COMPARE_URL" => "/catalog/compare/",
		"NAME" => "CATALOG_COMPARE_LIST",
		"AJAX_OPTION_ADDITIONAL" => ""
	),
false
);
?>