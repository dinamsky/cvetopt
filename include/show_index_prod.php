<?
function show_prod($type_filter)
{


global $APPLICATION;

switch ($type_filter) {

	case 'arrFilter_new':
	$GLOBALS['arrFilter_new'] = Array( "!PROPERTY_PR_NEW" => false);
	break;

	case 'arrFilter_recom':
	$GLOBALS['arrFilter_recom'] = Array( "!PROPERTY_PR_RECOM" => false);
	break;	

	case 'arrFilter_hit':
	$GLOBALS['arrFilter_hit'] = Array( "!PROPERTY_PR_HIT" => false);
	break;	

	case 'arrFilter_rasprod':
	$GLOBALS['arrFilter_rasprod'] = Array( "!PROPERTY_PR_RASPROD" => false);
	break;	

	default:
		# code...
		break;
}


//  $kol_tovar = $_SESSION['arr_set']['type_menu'] == 'v' ? 6 : 8;

// $APPLICATION->IncludeComponent(
// 	"bitrix:catalog.section",
// 	"catalog_all",
// 	Array(
// 		"ACTION_VARIABLE" => "action",
// 		"ADD_PICT_PROP" => "-",
// 		"ADD_PROPERTIES_TO_BASKET" => "Y",
// 		"ADD_SECTIONS_CHAIN" => "N",
// 		"ADD_TO_BASKET_ACTION" => "ADD",
// 		"AJAX_MODE" => "N",
// 		"AJAX_OPTION_ADDITIONAL" => "",
// 		"AJAX_OPTION_HISTORY" => "N",
// 		"AJAX_OPTION_JUMP" => "N",
// 		"AJAX_OPTION_STYLE" => "Y",
// 		"BACKGROUND_IMAGE" => "-",
// 		"BASKET_URL" => "/personal/basket.php",
// 		"BROWSER_TITLE" => "-",
// 		"CACHE_FILTER" => "N",
// 		"CACHE_GROUPS" => "N",
// 		"CACHE_TIME" => "36000000",
// 		"CACHE_TYPE" => "N",
// 		"COMPONENT_TEMPLATE" => "catalog_all",
// 		"CONVERT_CURRENCY" => "N",
// 		"DETAIL_URL" => "",
// 		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
// 		"DISPLAY_BOTTOM_PAGER" => "N",
// 		"DISPLAY_TOP_PAGER" => "N",
// 		"ELEMENT_SORT_FIELD" => "sort",
// 		"ELEMENT_SORT_FIELD2" => "id",
// 		"ELEMENT_SORT_ORDER" => "asc",
// 		"ELEMENT_SORT_ORDER2" => "desc",
// 		"FILTER_NAME" => $type_filter,
// 		"HIDE_NOT_AVAILABLE" => "N",
// 		"IBLOCK_ID" => "9",
// 		"IBLOCK_TYPE" => "shop_samovar_catalog",
// 		"INCLUDE_SUBSECTIONS" => "Y",
// 		"LABEL_PROP" => "-",
// 		"LINE_ELEMENT_COUNT" => "4",
// 		"MESSAGE_404" => "",
// 		"MESS_BTN_ADD_TO_BASKET" => "",
// 		"MESS_BTN_BUY" => "",
// 		"MESS_BTN_DETAIL" => "",
// 		"MESS_BTN_SUBSCRIBE" => "",
// 		"MESS_NOT_AVAILABLE" => "",
// 		"META_DESCRIPTION" => "-",
// 		"META_KEYWORDS" => "-",
// 		"OFFERS_LIMIT" => "5",
// 		"PAGER_BASE_LINK_ENABLE" => "N",
// 		"PAGER_DESC_NUMBERING" => "N",
// 		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
// 		"PAGER_SHOW_ALL" => "N",
// 		"PAGER_SHOW_ALWAYS" => "N",
// 		"PAGER_TEMPLATE" => ".default",
// 		"PAGER_TITLE" => "Товары",
// 		"PAGE_ELEMENT_COUNT" =>  $kol_tovar,
// 		"PARTIAL_PRODUCT_PROPERTIES" => "N",
// 		"PRICE_CODE" => array(0=>"BASE",),
// 		"PRICE_VAT_INCLUDE" => "Y",
// 		"PRODUCT_ID_VARIABLE" => "id",
// 		"PRODUCT_PROPERTIES" => array(),
// 		"PRODUCT_PROPS_VARIABLE" => "prop",
// 		"PRODUCT_QUANTITY_VARIABLE" => "",
// 		"PRODUCT_SUBSCRIPTION" => "N",
// 		"PROPERTY_CODE" => array(
// 			0 => "PR_NEW",
// 			1 => "PR_RASPROD",
// 			2 => "PR_RECOM",
// 			3 => "",
// 		),
// 		"SECTION_CODE" => "",
// 		"SECTION_CODE_PATH" => "",
// 		"SECTION_ID" => $_REQUEST["SECTION_ID"],
// 		"SECTION_ID_VARIABLE" => "SECTION_ID",
// 		"SECTION_URL" => "",
// 		"SECTION_USER_FIELDS" => array(0=>"",1=>"SECTION_CODE",2=>"",),
// 		"SEF_MODE" => "Y",
// 		"SEF_RULE" => "",
// 		"SET_BROWSER_TITLE" => "N",
// 		"SET_LAST_MODIFIED" => "N",
// 		"SET_META_DESCRIPTION" => "N",
// 		"SET_META_KEYWORDS" => "N",
// 		"SET_STATUS_404" => "N",
// 		"SET_TITLE" => "N",
// 		"SHOW_404" => "N",
// 		"SHOW_ALL_WO_SECTION" => "Y",
// 		"SHOW_CLOSE_POPUP" => "N",
// 		"SHOW_DISCOUNT_PERCENT" => "N",
// 		"SHOW_OLD_PRICE" => "N",
// 		"SHOW_PRICE_COUNT" => "1",
// 		"TEMPLATE_THEME" => "blue",
// 		"USE_MAIN_ELEMENT_SECTION" => "N",
// 		"USE_PRICE_COUNT" => "N",
// 		"USE_PRODUCT_QUANTITY" => "Y"
// 	)
// );

 $kol_tovar = $_SESSION['arr_set']['type_menu'] == 'v' ? 6 : 8;
 $kol_col = $_SESSION['arr_set']['type_menu'] == 'v' ? 3 : 4;


$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"catalog_all", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "MORE_PHOTO",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BACKGROUND_IMAGE" => "-",
		"BASKET_URL" => "/personal/cart/",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "catalog_all",
		"CONVERT_CURRENCY" => "N",
		"DETAIL_URL" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "",
		"FILTER_NAME" => $type_filter,
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "9",
		"IBLOCK_TYPE" => "shop_samovar_catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LABEL_PROP" => "-",
		"LINE_ELEMENT_COUNT" => $kol_col,
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "",
		"MESS_BTN_BUY" => "",
		"MESS_BTN_DETAIL" => "",
		"MESS_BTN_SUBSCRIBE" => "",
		"MESS_NOT_AVAILABLE" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"OFFERS_CART_PROPERTIES" => array(
			0 => "ARTNUMBER",
			1 => "COLOR_REF",
			2 => "SIZES_SHOES",
			3 => "SIZES_CLOTHES",
		),
		"OFFERS_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "DETAIL_TEXT",
			4 => "DETAIL_PICTURE",
			5 => "",
		),
		"OFFERS_LIMIT" => "0",
		"OFFERS_PROPERTY_CODE" => array(
			0 => "ARTNUMBER",
			1 => "COLOR_REF",
			2 => "SIZES_SHOES",
			3 => "SIZES_CLOTHES",
			4 => "MORE_PHOTO",
			5 => "",
		),
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "desc",
		"OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
		"OFFER_TREE_PROPS" => array(
			0 => "COLOR_REF",
			1 => "SIZES_SHOES",
			2 => "SIZES_CLOTHES",
		),
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => $kol_tovar,
		"PARTIAL_PRODUCT_PROPERTIES" => "Y",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_DISPLAY_MODE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(
		),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_SUBSCRIPTION" => "N",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SECTION_CODE" => "",
		"SECTION_CODE_PATH" => "",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SEF_MODE" => "N",
		"SEF_RULE" => "",
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SHOW_ALL_WO_SECTION" => "Y",
		"SHOW_CLOSE_POPUP" => "N",
		"SHOW_DISCOUNT_PERCENT" => "Y",
		"SHOW_OLD_PRICE" => "Y",
		"SHOW_PRICE_COUNT" => "0",
		"TEMPLATE_THEME" => "blue",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "Y"
	),
	false
);

}





?>