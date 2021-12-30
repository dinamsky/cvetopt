<?	
$APPLICATION->IncludeComponent(
	"bitrix:catalog.compare.list", 
	"fav", 
	array(
		"IBLOCK_TYPE" => "shop_samovar_catalog", 
		"IBLOCK_ID" => "#CATALOG_IBLOCK_ID#", 
		"POSITION_FIXED" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"DETAIL_URL" => "#SECTION_CODE#",
		"COMPARE_URL" => "#SITE_DIR_#catalog/compare/?fav=Y",
		"NAME" => "CATALOG_FAV_LIST",
		"AJAX_OPTION_ADDITIONAL" => ""
	),
false
);
?>