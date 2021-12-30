<?
require_once($_SERVER['DOCUMENT_ROOT']. "/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->IncludeComponent(
	"bitrix:catalog.compare.list", 
	"fav", 
	array(
		"IBLOCK_TYPE" => "shop_samovar_catalog", //Сюда ваш тип инфоблока каталога
		"IBLOCK_ID" => $_GET['id_block'], //Сюда ваш ID инфоблока каталога
		"POSITION_FIXED" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"DETAIL_URL" => "#SECTION_CODE#",
		"COMPARE_URL" => "/catalog/compare/?fav=Y",
		"NAME" => "CATALOG_FAV_LIST",
		"AJAX_OPTION_ADDITIONAL" => ""
	),
false
);

?>