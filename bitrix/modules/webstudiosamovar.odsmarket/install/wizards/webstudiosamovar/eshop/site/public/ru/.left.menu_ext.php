<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION;

   $aMenuLinksExt=$APPLICATION->IncludeComponent("bitrix:menu.sections", "", array(
   "IS_SEF" => "Y",
   "SEF_BASE_URL" => "catalog/",
   "SECTION_PAGE_URL" => "#SECTION_CODE#/",
   "DETAIL_PAGE_URL" => "#SECTION_CODE#/#ELEMENT_CODE#/",
   "IBLOCK_TYPE" => "shop_samovar_catalog",
   "IBLOCK_ID" => "#CATALOG_IBLOCK_ID#", 
   "DEPTH_LEVEL" => "2",
   "CACHE_TYPE" => "A",
   "CACHE_TIME" => "0",
   "CACHE_TYPE" => "A",
   "CACHE_TIME" => "3600"
   ),
false
);
$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>