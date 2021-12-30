<?
    include('.utils.php');
    $wizard = &$this->GetWizard();
    $iIBlockID = __importIBlockFile('brands.xml', 'catalog', 'samovar_odegda_brands');
    
    $arVars = __getVars();
    $arVars['MACROS']['BRANDS_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['BRANDS_IBLOCK_TYPE'] = 'catalog';
    __setVars($arVars);
?>