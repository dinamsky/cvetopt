	 <?
	 $APPLICATION->IncludeComponent(
	"bitrix:search.title", 
	"catalog_search", 
	array(
		"CATEGORY_0" => array(
			0 => "iblock_catalog",
		),
		"CATEGORY_0_TITLE" => GetMessage("search_title_catalog"),
		"CATEGORY_0_iblock_shop_samovar_catalog" => array(
			0 => "1",
		),
		"CHECK_DATES" => "N",
		"COMPONENT_TEMPLATE" => "catalog_search",
		"CONTAINER_ID" => "title-search",
		"INPUT_ID" => "title-search-input",
		"NUM_CATEGORIES" => "1",
		"ORDER" => "date",
		"PAGE" => "#SITE_DIR#search/",
		"SHOW_INPUT" => "Y",
		"SHOW_OTHERS" => "Y",
		"TOP_COUNT" => "5",
		"USE_LANGUAGE_GUESS" => "N",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SHOW_PREVIEW" => "N",
		"CONVERT_CURRENCY" => "N",
		"PREVIEW_WIDTH" => "75",
		"PREVIEW_HEIGHT" => "75",
		"CATEGORY_1_TITLE" => GetMessage("search_title_content"),
		"CATEGORY_1" => array(
			0 => "iblock_shop_samovar_content",
		),
		"CATEGORY_1_iblock_shop_samovar_content" => array(
			0 => "#content_IBLOCK_ID#",
		),
		"CATEGORY_0_iblock_catalog" => array(
			0 => "#CATALOG_IBLOCK_ID#",
		)
	),
	false
);
?>	
