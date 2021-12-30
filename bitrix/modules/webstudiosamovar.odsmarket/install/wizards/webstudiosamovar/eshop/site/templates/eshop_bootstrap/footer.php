

<?
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/footer.php");
              $arr_url = explode('/', str_replace ( SITE_DIR,"/", $APPLICATION->GetCurPage(false)));
              $url_2 = $arr_url[1];
              $url_3 = $arr_url[2];
              $url_4 = $arr_url[3];
?>

<? if($APPLICATION->GetCurPage(false) !== SITE_DIR): // Внутренняя?>
    </div>
    </div>
    </div>
    <!-- </div> -->

<?endif // .Внутренняя?>

<? if($APPLICATION->GetCurPage(false) == SITE_DIR): ?>

<?if ($_SESSION['arr_set']['type_menu'] == 'v' ):?>
<div class="row">
<div class="col-md-3 hidden-xs hidden-sm">
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"catalog_left", 
	array(
		"ROOT_MENU_TYPE" => "catalog_top",
		"MAX_LEVEL" => "2",
		"CHILD_MENU_TYPE" => "catalog_top_submenu",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_THEME" => "site",
		"COMPONENT_TEMPLATE" => "catalog"
	),
	false
);
?>

<div class="tovar_one_col" style="border-top: 1px #ddd solid; margin: 0; padding-top: 10px; border-right: none; border-bottom: none;">
<h3><?=getmessage('title_tovar_one')?></h3>

<?

CModule::IncludeModule('iblock');
$arSelect = Array("NAME", "ID", "PROPERTY_TOVAR");
$arFilter = Array("IBLOCK_ID"=>'#TOVAR_ONE_IBLOCK_ID#', "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array("RAND" => "ASC"), $arFilter, false, Array("nPageSize"=>1), $arSelect);

while($element = $res->GetNextElement())  $arItem[]= $element->GetFields();

$id_tovar_one = $arItem[0]['PROPERTY_TOVAR_VALUE'];
// $id_tovar_one = '1111111111111111111111';

unset($arItem);

CModule::IncludeModule('iblock');
$arSelect = Array("NAME", "ID");
$arFilter = Array("IBLOCK_ID"=>'#CATALOG_IBLOCK_ID#', "ACTIVE"=>"Y", 'ID' => $id_tovar_one);
$res = CIBlockElement::GetList(Array("RAND" => "ASC"), $arFilter, false, Array("nPageSize"=>1), $arSelect);

while($element = $res->GetNextElement())  $arItem[]= $element->GetFields();

if(!$arItem) {
CModule::IncludeModule('iblock');
$arSelect = Array("NAME", "ID", 'PROPERTY_PR_HIT');
$arFilter = Array("IBLOCK_ID"=>'#CATALOG_IBLOCK_ID#', "ACTIVE"=>"Y", 'PROPERTY_PR_HIT_VALUE' => 'Y');
$res = CIBlockElement::GetList(Array("SORT" => "DESC"), $arFilter, false, Array("nPageSize"=>1), $arSelect);

while($element = $res->GetNextElement())  $arItem[]= $element->GetFields();
}

// echo "<pre>";
// print_r($arItem);
// echo "</pre>";

$id_tovar_one = $arItem[0]['ID'];

unset($arItem);
?>

<?
$APPLICATION->IncludeComponent(
	"bitrix:catalog.element", 
	"index_one", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_DETAIL_TO_SLIDER" => "N",
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"ADD_TO_BASKET_ACTION" => array(
			0 => "ADD",
		),
		"BACKGROUND_IMAGE" => "-",
		"BASKET_URL" => "/personal/basket.php",
		"BRAND_USE" => "N",
		"BROWSER_TITLE" => "-",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_SECTION_ID_VARIABLE" => "N",
		"CONVERT_CURRENCY" => "N",
		"DETAIL_PICTURE_MODE" => "IMG",
		"DETAIL_URL" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_COMPARE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PREVIEW_TEXT_MODE" => "E",
		"ELEMENT_CODE" => "",
		"ELEMENT_ID" => $id_tovar_one,
		"GIFTS_DETAIL_BLOCK_TITLE" => "",
		"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "",
		"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "",
		"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_MESS_BTN_BUY" => "",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "Y",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "#CATALOG_IBLOCK_ID#",
		"IBLOCK_TYPE" => "shop_samovar_catalog",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"LINK_IBLOCK_ID" => "",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_PROPERTY_SID" => "",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "",
		"MESS_BTN_BUY" => "",
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
			1 => "PREVIEW_PICTURE",
			2 => "DETAIL_PICTURE",
			3 => "",
		),
		"OFFERS_LIMIT" => "",
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
		"PARTIAL_PRODUCT_PROPERTIES" => "Y",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(
		),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "",
		"PRODUCT_SUBSCRIPTION" => "N",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SECTION_CODE" => "",
		"SECTION_ID" => "37",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SEF_MODE" => "Y",
		"SET_BROWSER_TITLE" => "N",
		"SET_CANONICAL_URL" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SET_VIEWED_IN_COMPONENT" => "N",
		"SHOW_404" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"SHOW_DEACTIVATED" => "N",
		"SHOW_DISCOUNT_PERCENT" => "Y",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"TEMPLATE_THEME" => "blue",
		"USE_COMMENTS" => "N",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_GIFTS_DETAIL" => "Y",
		"USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "Y",
		"USE_VOTE_RATING" => "N",
		"COMPONENT_TEMPLATE" => "index_one",
		"SEF_RULE" => "",
		"SECTION_CODE_PATH" => "",
		"ADD_PICT_PROP" => "MORE_PHOTO",
		"LABEL_PROP" => "-",
		"OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
		"OFFER_TREE_PROPS" => array(
			0 => "COLOR_REF",
			1 => "SIZES_SHOES",
			2 => "SIZES_CLOTHES",
		),
		"MESS_BTN_COMPARE" => "",
		"SHOW_BASIS_PRICE" => "N"
	),
	false
);
?>
</div>



<? //if ($_SESSION['arr_set']['show_y_n_content'] == 'y' ):?>

<!-- </div> -->

<div class="col-md-9">

<?endif?>


<? if($APPLICATION->GetCurPage(false) == SITE_DIR):?>

<!-- .Слайдер -->
<?if ($_SESSION['arr_set']['type_menu'] !== 'v' ):?>
<div class="container">
<div class="row">
<?endif?>

<?if ($_SESSION['arr_set']['type_menu'] !== 'g' ):?>
<div>
<?else:?>
<div class="col-md-9">
<?endif?>

<div <?if($APPLICATION->GetCurPage(false) == SITE_DIR && $_SESSION['arr_set']['theme'] == 'dark' && $_SESSION['arr_set']['type_menu'] == 'v'):?> style="margin-right: -15px;"<?endif?>>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"slider_top", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "slider_top",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "#SLIDER_TOP_IBLOCK_ID#",
		"IBLOCK_TYPE" => "shop_samovar_content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "NO_TEXT",
			1 => "PERIOD",
			2 => "SKIDKA",
			3 => "LINK",
			4 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "N",
		"SHOW_404" => "Y",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "",
		"FILE_404" => ""
	),
	false
);?>
	</div>
</div>
<? // ------------------------------- .Слайдер?>


<? // -------------------------------   Товар дня?>


<?if ($_SESSION['arr_set']['type_menu'] == 'g' ):?>
<div class="col-md-3 tovar_one_col">

<h3><?=getmessage('title_tovar_one')?></h3>

<?

CModule::IncludeModule('iblock');
$arSelect = Array("NAME", "ID", "PROPERTY_TOVAR");
$arFilter = Array("IBLOCK_ID"=>'#TOVAR_ONE_IBLOCK_ID#', "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array("RAND" => "ASC"), $arFilter, false, Array("nPageSize"=>1), $arSelect);

while($element = $res->GetNextElement())  $arItem[]= $element->GetFields();

$id_tovar_one = $arItem[0]['PROPERTY_TOVAR_VALUE'];
// $id_tovar_one = '1111111111111111111111';

unset($arItem);

CModule::IncludeModule('iblock');
$arSelect = Array("NAME", "ID");
$arFilter = Array("IBLOCK_ID"=>'#CATALOG_IBLOCK_ID#', "ACTIVE"=>"Y", 'ID' => $id_tovar_one);
$res = CIBlockElement::GetList(Array("RAND" => "ASC"), $arFilter, false, Array("nPageSize"=>1), $arSelect);

while($element = $res->GetNextElement())  $arItem[]= $element->GetFields();

if(!$arItem) {
CModule::IncludeModule('iblock');
$arSelect = Array("NAME", "ID", 'PROPERTY_PR_HIT');
$arFilter = Array("IBLOCK_ID"=>'#CATALOG_IBLOCK_ID#', "ACTIVE"=>"Y", 'PROPERTY_PR_HIT_VALUE' => 'Y');
$res = CIBlockElement::GetList(Array("SORT" => "DESC"), $arFilter, false, Array("nPageSize"=>1), $arSelect);

while($element = $res->GetNextElement())  $arItem[]= $element->GetFields();
}

// echo "<pre>";
// print_r($arItem);
// echo "</pre>";

$id_tovar_one = $arItem[0]['ID'];

unset($arItem);
?>

<?

$APPLICATION->IncludeComponent(
	"bitrix:catalog.element", 
	"index_one", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_DETAIL_TO_SLIDER" => "N",
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"ADD_TO_BASKET_ACTION" => array(
			0 => "ADD",
		),
		"BACKGROUND_IMAGE" => "-",
		"BASKET_URL" => "/personal/basket.php",
		"BRAND_USE" => "N",
		"BROWSER_TITLE" => "-",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_SECTION_ID_VARIABLE" => "N",
		"CONVERT_CURRENCY" => "N",
		"DETAIL_PICTURE_MODE" => "IMG",
		"DETAIL_URL" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_COMPARE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PREVIEW_TEXT_MODE" => "E",
		"ELEMENT_CODE" => "",
		"ELEMENT_ID" => $id_tovar_one,
		"GIFTS_DETAIL_BLOCK_TITLE" => "",
		"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "",
		"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "",
		"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_MESS_BTN_BUY" => "",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "Y",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "#CATALOG_IBLOCK_ID#",
		"IBLOCK_TYPE" => "shop_samovar_catalog",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"LINK_IBLOCK_ID" => "",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_PROPERTY_SID" => "",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "",
		"MESS_BTN_BUY" => "",
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
			1 => "PREVIEW_PICTURE",
			2 => "DETAIL_PICTURE",
			3 => "",
		),
		"OFFERS_LIMIT" => "",
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
		"PARTIAL_PRODUCT_PROPERTIES" => "Y",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(
		),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "",
		"PRODUCT_SUBSCRIPTION" => "N",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SECTION_CODE" => "",
		"SECTION_ID" => "37",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SEF_MODE" => "Y",
		"SET_BROWSER_TITLE" => "N",
		"SET_CANONICAL_URL" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SET_VIEWED_IN_COMPONENT" => "N",
		"SHOW_404" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"SHOW_DEACTIVATED" => "N",
		"SHOW_DISCOUNT_PERCENT" => "Y",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"TEMPLATE_THEME" => "blue",
		"USE_COMMENTS" => "N",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_GIFTS_DETAIL" => "Y",
		"USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "Y",
		"USE_VOTE_RATING" => "N",
		"COMPONENT_TEMPLATE" => "index_one",
		"SEF_RULE" => "",
		"SECTION_CODE_PATH" => "",
		"ADD_PICT_PROP" => "MORE_PHOTO",
		"LABEL_PROP" => "-",
		"OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
		"OFFER_TREE_PROPS" => array(
			0 => "COLOR_REF",
			1 => "SIZES_SHOES",
			2 => "SIZES_CLOTHES",
		),
		"MESS_BTN_COMPARE" => "",
		"SHOW_BASIS_PRICE" => "N"
	),
	false
);
?>
</div>
<?endif?>


<? // -------------------------------   .Товар дня?>


<?if ($_SESSION['arr_set']['type_menu'] !== 'v' ):?>
	</div>
	</div>
<?endif?>


<?endif?>

<div class="row nomargin"></div>
<div style=" background: rgba(255,255,255, .3);">
<!-- приемущества -->
<? if ($_SESSION['arr_set']['show_y_n_priem'] == 'y' && $_SESSION['arr_set']['type_menu'] == 'g' && $APPLICATION->GetCurPage(false) == SITE_DIR):?>

<?if ($_SESSION['arr_set']['type_menu'] !== 'v' ):?>
<div class="container">
<?endif?>

<div class="hidden-xs" style=" margin: -20px 0 20px 0"> 
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"nashi_priemushestva", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "#priem_IBLOCK_ID#",
		"IBLOCK_TYPE" => "shop_samovar_content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "8",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "TYPE",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "N",
		"SHOW_404" => "Y",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "",
		"COMPONENT_TEMPLATE" => "nashi_priemushestva",
		"FILE_404" => ""
	),
	false
);?>
</div>
<?if ($_SESSION['arr_set']['type_menu'] !== 'v' ):?>
	</div>
<?endif?>
<?endif?>
</div>
<!-- .приемущества -->

<!-- Продукция -->



<div class="index_tab_prod" <?if ($_SESSION['arr_set']['type_menu'] == 'v' ):?>style=" background: none;"<?endif?>>
	<?if ($_SESSION['arr_set']['type_menu'] !== 'v' ):?>
<div class="container">
<?endif?>
	<ul class="nav nav-tabs tabs_prod" role="tablist" >
		<li role="presentation" class="active"><a href="#new" aria-controls="new" role="tab" data-toggle="tab"><span><?=GetMessage('index_tab_new')?></span></a></li>
		<li role="presentation"><a href="#recom" aria-controls="recom" role="tab" data-toggle="tab"><span><?=GetMessage('index_tab_recom')?></span></a></li>
		<li role="presentation"><a href="#hits" aria-controls="hits" role="tab" data-toggle="tab"><span><?=GetMessage('index_tab_hit')?></span></a></li>
		<li role="presentation" class="rasprod"><a href="#rasprod" aria-controls="rasprod" role="tab" data-toggle="tab"><span><?=GetMessage('index_tab_rasprod')?></span></a></li>
		<!-- <div class="prod_all"><a href="/catalog/"><span><?=GetMessage('index_tab_all_prod')?></span></a></div> -->
	</ul>
	
	
	<?include $_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/show_index_prod.php'; ?>
	
	<div class="tab-content	">
	
		<div role="tabpanel" class="tab-pane mode_content active" id="new">
			<div class="white1">
				<div class="prod_all">
					<? show_prod('arrFilter_new'); ?>
				</div>
			</div>
		</div>
	
	
		<div role="tabpanel" class="tab-pane mode_content" id="recom">
			<div class="white1">
				<div class="prod_all">
					<? show_prod('arrFilter_recom'); ?>
				</div>
			</div>
		</div>
	
		<div role="tabpanel" class="tab-pane mode_content" id="hits">
			<div class="white1">
				<div class="prod_all">
					<? show_prod('arrFilter_hit'); ?>
				</div>
			</div>
		</div>
	
		<div role="tabpanel" class="tab-pane mode_content" id="rasprod">
			<div class="white1">
					<div class="prod_all">
						<? show_prod('arrFilter_rasprod'); ?>
					</div>
				</div>
		</div>
	
	</div>
	
<?if ($_SESSION['arr_set']['type_menu'] !== 'v' ):?>
	</div>
<?endif?>

	</div>


</div>

<?if ($_SESSION['arr_set']['type_menu'] == 'v' ):?>
</div>
<?endif?>

<?endif?>

<!-- .Продукция -->




<? if($APPLICATION->GetCurPage(false) == SITE_DIR && $_SESSION['arr_set']['show_y_n_slider'] == 'y'):?>

<!-- .Слайдер -->
<?if ($_SESSION['arr_set']['type_menu'] !== 'v' ):?>
<div class="container">
<?endif?>
<div style="margin-top: 40px; ">
<div <?if($APPLICATION->GetCurPage(false) == SITE_DIR && $_SESSION['arr_set']['theme'] == 'dark' && $_SESSION['arr_set']['type_menu'] == 'v'):?> style="margin: 0 -15px;"<?endif?>>
	<?$APPLICATION->IncludeComponent(
		"bitrix:news.list", 
		"slider", 
		array(
			"ACTIVE_DATE_FORMAT" => "d.m.Y",
			"ADD_SECTIONS_CHAIN" => "N",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"CHECK_DATES" => "Y",
			"COMPONENT_TEMPLATE" => "slider",
			"DETAIL_URL" => "",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"DISPLAY_DATE" => "N",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "Y",
			"DISPLAY_TOP_PAGER" => "N",
			"FIELD_CODE" => array(
				0 => "",
				1 => "",
			),
			"FILTER_NAME" => "",
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"IBLOCK_ID" => "#slider_IBLOCK_ID#",
			"IBLOCK_TYPE" => "shop_samovar_content",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"INCLUDE_SUBSECTIONS" => "Y",
			"MESSAGE_404" => "",
			"NEWS_COUNT" => "20",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => ".default",
			"PAGER_TITLE" => "Новости",
			"PARENT_SECTION" => "",
			"PARENT_SECTION_CODE" => "",
			"PREVIEW_TRUNCATE_LEN" => "",
			"PROPERTY_CODE" => array(
				0 => "NO_TEXT",
				1 => "LINK",
				2 => "",
			),
			"SET_BROWSER_TITLE" => "N",
			"SET_LAST_MODIFIED" => "N",
			"SET_META_DESCRIPTION" => "N",
			"SET_META_KEYWORDS" => "N",
			"SET_STATUS_404" => "Y",
			"SET_TITLE" => "N",
			"SHOW_404" => "Y",
			"SORT_BY1" => "SORT",
			"SORT_BY2" => "",
			"SORT_ORDER1" => "ASC",
			"SORT_ORDER2" => "",
			"FILE_404" => ""
		),
		false
	);?>
	</div>
	</div>
<?if ($_SESSION['arr_set']['type_menu'] !== 'v' ):?>
	</div>
<?endif?>

<!-- .Слайдер -->

<?endif?>


<!-- приемущества -->
<? if ($_SESSION['arr_set']['show_y_n_priem'] == 'y' && $_SESSION['arr_set']['type_menu'] == 'v' && $APPLICATION->GetCurPage(false) == SITE_DIR):?>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"nashi_priemushestva",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "#priem_IBLOCK_ID#",
		"IBLOCK_TYPE" => "shop_samovar_content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "8",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("TYPE",""),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => ""
	)
);?>

<?endif?>
<!-- .приемущества -->

<!-- плитки  -->
<? if ($_SESSION['arr_set']['show_y_n_plitki'] == 'y' && $APPLICATION->GetCurPage(false) == SITE_DIR):?>

<?if ($_SESSION['arr_set']['type_menu'] !== 'v' ):?>
<div class="container" style="margin-top: 20px;">
<?endif?>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"plitki", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "#plitki_IBLOCK_ID#",
		"IBLOCK_TYPE" => "shop_samovar_content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "5",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "TITLE",
			1 => "NO_SHOW",
			2 => "GDE",
			3 => "PRICE",
			4 => "LINK",
			5 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "N",
		"SHOW_404" => "Y",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "",
		"COMPONENT_TEMPLATE" => "plitki",
		"FILE_404" => ""
	),
	false
);?>

<?if ($_SESSION['arr_set']['type_menu'] !== 'v' ):?>
	</div>
<?endif?>

<?endif?>
<!-- .плитки  -->



<div class="row nomargin"></div>

<? // ---------------------------------  Бренды?>

<?if( $url_2 !== 'brands' && $_SESSION['arr_set']['show_y_n_brands'] == 'y'):?>

<div <?if($APPLICATION->GetCurPage(false) == SITE_DIR && $_SESSION['arr_set']['theme'] == 'dark' && $_SESSION['arr_set']['type_menu'] == 'v'):?> style="margin: 0 -15px;"<?endif?>>

<?if ($_SESSION['arr_set']['type_menu'] !== 'v' ):?>
<div class="index_brends">
<h2 style=" text-align: center; font-family: 'bold'; padding: 0; margin: 0 0 25px;"> <?=getmessage('title_brends')?></h2>
<div class="container">
<div class="row">

<?else:?>
<div class="index_brends" style=" padding-left: 15px; padding-right: 10px;">

<h2 style=" text-align: center; font-family: 'bold'; padding: 0; margin: 0 0 25px;"> <?=getmessage('title_brends')?></h2>

<?endif?>


<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"index_brands", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "index_brands",
		"DETAIL_URL" => SITE_DIR."brands/#ELEMENT_CODE#/",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "#brands_IBLOCK_ID#",
		"IBLOCK_TYPE" => "shop_samovar_catalog",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "12",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => ""
	),
	false
);?>


<?if ($_SESSION['arr_set']['type_menu'] !== 'v' ):?>
	</div>
	</div>
	</div>
	</div>
<?else:?>	

	</div>
	</div>
<?endif?>

<?endif?>
<? // ---------------------------------  Бренды?>






<?//if( $url_2 !== 'content' && $url_3 !== 'content'):?>
<?if( false):?>

<!-- статьи и обзоры -->
<? if ($APPLICATION->GetCurPage(false) == SITE_DIR && $_SESSION['arr_set']['show_y_n_content'] == 'y' && $_SESSION['arr_set']['type_menu'] == 'g'):?>
<?if ($_SESSION['arr_set']['type_menu'] !== 'v' ):?>
<div class="container">
<?endif?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"content", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "#content_IBLOCK_ID#",
		"IBLOCK_TYPE" => "shop_samovar_content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "3",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "N",
		"SHOW_404" => "Y",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"COMPONENT_TEMPLATE" => "content",
		"FILE_404" => ""
	),
	false
);?>
<?if ($_SESSION['arr_set']['type_menu'] !== 'v' ):?>
	</div>
<?endif?>
<?endif?>
<?endif?>

<!-- .статьи и обзоры -->

<!--  о нас, новости -->

<? if ($_SESSION['arr_set']['show_y_n_about'] == 'y' && $APPLICATION->GetCurPage(false) == SITE_DIR ):?>



		<div class="index_about" <?if($APPLICATION->GetCurPage(false) == SITE_DIR && $_SESSION['arr_set']['theme'] == 'dark' && $_SESSION['arr_set']['type_menu'] == 'v'):?> style="margin: 0 -15px;"<?endif?>>
<?if ($_SESSION['arr_set']['type_menu'] !== 'v' ):?>
<div class="container">
<?endif?>
			<div class="row">
				<div class="col-md-4">

					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"PATH" => SITE_DIR."/include/index_about_pict.php",
							"EDIT_TEMPLATE" => ""
							),
						false
						);?>
				</div>


				<div class="col-md-8">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"PATH" => SITE_DIR."/include/index_about.php",
							"EDIT_TEMPLATE" => ""
							),
						false
						);?>

				</div>


				</div>
<?if ($_SESSION['arr_set']['type_menu'] !== 'v' ):?>
	</div>
<?endif?>

		</div>


<?endif?>

<!--  .о нас, новости -->

<?if($_SESSION['arr_set']['show_y_n_akcii'] == 'y'):?>
<div <?if($APPLICATION->GetCurPage(false) == SITE_DIR && $_SESSION['arr_set']['theme'] == 'dark' && $_SESSION['arr_set']['type_menu'] == 'v'):?> style="margin: 0 -15px;"<?endif?>>

<div class="index_akciya hidden-xs" style=" background:  url(<?=SITE_DIR?>images/bg_akciya.png);">

<?if ($_SESSION['arr_set']['type_menu'] !== 'v' ):?>

	<div class="container">
		
		<div class="row">
<?endif?>

<div class="flex middle">
<div class="col-md-3">
	
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"PATH" => SITE_DIR."/include/index_akciya_pict.php",
							"EDIT_TEMPLATE" => ""
							),
						false
						);?>	
</div>

<div class="col-md-6">
<?
$GLOBALS['arrFilter_akciya'] = Array("PROPERTY_PR_INDEX_VALUE" => "Y");

$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"index_akciya",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("",""),
		"FILTER_NAME" => "arrFilter_akciya",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "#akcii_IBLOCK_ID#",
		"IBLOCK_TYPE" => "shop_samovar_content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "1",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("PR_INDEX",""),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "",
		"SORT_BY2" => "",
		"SORT_ORDER1" => "",
		"SORT_ORDER2" => ""
	)
);?>
</div>

<div class="col-md-3">
	
	<a href="<?=SITE_DIR?>akcii/" class="btn btn-default"><?=getmessage("index_akciya")?> <i class="demo-icon icon-angle-right"></i></a>

</div>

</div>

<?if ($_SESSION['arr_set']['type_menu'] !== 'v' ):?>
	</div>
	</div>
<?endif?>

</div>


</div>
<?else:?>
<hr style="margin: 30px 0 30px;">
<?endif?>


<div class="row nomargin"></div>




		<!-- </div> -->

	<!-- </div> -->

</div>

</div>

</div>
</div>

<div class="container">
	<div class="row footer">
		

		<div class="col-md-2">
				<div class="row">

					<div class="col-md-12 col-xs-6">
						
												<?
						$logo_file = file_get_contents($_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/index_header_logo.php');
						?>              
						<a href="<?=SITE_DIR?>">
						<div class="logo_footer" <?if(trim($logo_file) !== ""):?>style="background: none;"<?else:?>style="width: 140px; height: 40px; "<?endif?>>
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_DIR."/include/index_footer_logo.php",
									"EDIT_TEMPLATE" => ""
									),
								false
								);?>
						</div>
					</a>

					</div>
					<div class="col-md-12 col-xs-6">
						<div class="copyr">
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_DIR."/include/index_footer_copyr.php",
									"EDIT_TEMPLATE" => ""
									),
								false
								);?>
						</div>
						<div class="samovar hidden-xs"><?=GetMessage("index_design_by")?></div>
					</div>
				</div>
		</div>

		<div class="col-md-4 text-center">

			<div class="contacts">
			<div class="tel"><strong>
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"PATH" => SITE_DIR."/include/index_tel.php",
						"EDIT_TEMPLATE" => ""
						),
					false
					);?>
								</strong></div>
			   <div class="call_back"><div class="icon"><i class="fa fa-phone"></i></div><a href=""  data-toggle="modal" data-target="#callback"><?=GetMessage("index_callback")?></a></div>
			<div class="adress"><div class="icon"><i class="fa fa-map-marker"></i></div>
			<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => SITE_DIR."/include/index_footer_adress.php",
					"EDIT_TEMPLATE" => ""
					),
				false
					);?>
			</div>   
			<div class="regim"><div class="icon"><i class="fa fa-clock-o"></i></div>
			<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => SITE_DIR."/include/index_footer_regim.php",
					"EDIT_TEMPLATE" => ""
					),
				false
				);?>
			</div>   
			</div>
		</div>

	

		<div class="col-md-3 menu_bottom">

<?$APPLICATION->IncludeComponent(
  "bitrix:menu",
  "bottom",
  Array(
    "COMPONENT_TEMPLATE" => "bottom",
    "ROOT_MENU_TYPE" => "bottom",
    "MENU_CACHE_TYPE" => "N",
    "MENU_CACHE_TIME" => "3600",
    "MENU_CACHE_USE_GROUPS" => "Y",
    "MENU_CACHE_GET_VARS" => array(),
    "MAX_LEVEL" => "1",
    "CHILD_MENU_TYPE" => "left",
    "USE_EXT" => "N",
    "DELAY" => "N",
    "ALLOW_MULTI_SELECT" => "N"
  )
);?>	
		</div>
	<div class="row nomargin hidden-md hidden-lg"></div>
		<div class="col-md-3  social">
									<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_DIR."/include/index_footer_social.php",
									"EDIT_TEMPLATE" => ""
									),
								false
								);?>

		</div>

	</div>


</div>

<div class="block_fixed">

<?if($url_2 !== "personal"):?>

<div class="cart_b_1">
	
	<div class="cart_b">

	<?
	$APPLICATION->IncludeComponent(
		"bitrix:sale.basket.basket.line",
		"cart",
		Array(
			"HIDE_ON_BASKET_PAGES" => "Y",
			"PATH_TO_BASKET" => SITE_DIR."personal/cart/",
			"PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
			"PATH_TO_PERSONAL" => SITE_DIR."personal/",
			"PATH_TO_PROFILE" => SITE_DIR."personal/",
			"PATH_TO_REGISTER" => SITE_DIR."login/",
			"POSITION_FIXED" => "N",
			"SHOW_AUTHOR" => "N",
			"SHOW_EMPTY_VALUES" => "Y",
			"SHOW_NUM_PRODUCTS" => "Y",
			"SHOW_PERSONAL_LINK" => "N",
			"SHOW_PRODUCTS" => "N",
			"SHOW_TOTAL_PRICE" => "Y"
		)
	);
	?>
	</div>
</div>

<?endif?>


<?\Bitrix\Main\Page\Frame::getInstance()->startDynamicWithID("show_fav");?>
<div class="sravn_b" id="compare_list_count" <?if($_GET['action'] == 'COMPARE' && !$_GET['fav']):?> style=" display: none;"<?endif?>>
<?
 include $_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/_templates_show_sravn.php'; // панель настройки сайта
?>
</div>
<?\Bitrix\Main\Page\Frame::getInstance()->finishDynamicWithID("show_fav", "");?>

<?\Bitrix\Main\Page\Frame::getInstance()->startDynamicWithID("show_fav_b");?>

<div class="fav_b" id="fav_list_count" <?if($_GET['action'] == 'COMPARE' && $_GET['fav']):?> style=" display: none;"<?endif?>>
<?
 include $_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/_templates_show_fav.php'; // панель настройки сайта
?>
</div>
<?\Bitrix\Main\Page\Frame::getInstance()->finishDynamicWithID("show_fav_b", "");?>
</div>



<script>(function ($) {
    var $container = $('.masonry-container');
    $container.imagesLoaded(function () {
        $container.masonry({
            columnWidth: '.item',
            itemSelector: '.item'
        });
    });
    $('a[data-toggle=tab]').each(function () {
        var $this = $(this);
        $this.on('shown.bs.tab', function () {
            $container.imagesLoaded(function () {
                $container.masonry({
                    columnWidth: '.item',
                    itemSelector: '.item'
                });
            });
        });
    });
}(jQuery));
//# sourceURL=pen.js
</script>

<?
include $_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/form_callback.php'; // форма "заказать звонок "
?>
