<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('catalog_offers.xml', 'shop_samovar_offers', 'samovar_catalog_offers');
	__importIBlockFile('catalog_offers_prices.xml', 'shop_samovar_offers', 'samovar_catalog_offers_prices');
    
    $arVars = __getVars();
    $arVars['MACROS']['CATALOG_OFFERS_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['CATALOG_OFFERS_IBLOCK_TYPE'] = 'shop_samovar_offers';
    __setVars($arVars);
?>