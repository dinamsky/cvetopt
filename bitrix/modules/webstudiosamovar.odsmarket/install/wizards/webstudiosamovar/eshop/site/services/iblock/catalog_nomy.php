<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('catalog.xml', 'shop_samovar_catalog', 'samovar_catalog');
	__importIBlockFile('catalog_prices.xml', 'shop_samovar_catalog', 'samovar_catalog_prices');
    
    $arVars = __getVars();
    $arVars['MACROS']['CATALOG_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['CATALOG_IBLOCK_TYPE'] = 'shop_samovar_catalog';

CWizardUtil::ReplaceMacros($_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/templates/eshop_bootstrap_/footer.php", array("CATALOG_IBLOCK_ID" => $iIBlockID));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/brands/index.php", array("CATALOG_IBLOCK_ID" => $iIBlockID));
    __setVars($arVars);
?>