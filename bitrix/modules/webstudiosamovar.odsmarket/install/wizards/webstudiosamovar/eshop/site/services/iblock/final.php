<?
    include('.utils.php');
    
    CModule::IncludeModule("catalog");
    
    $sTemplateDirectory = $_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/templates/".WIZARD_TEMPLATE_ID.'/';
    // $sTemplateDirectory = $_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/templates/".WIZARD_TEMPLATE_ID.'_'.WIZARD_SITE_ID.'/';
    $arVars = __getVars();
    
    $arVars['MACROS']['CONTACTS_MAIN_ELEMENT_ID'] = "";
    $arVars['MACROS']['CONTACTS_MAIN_ELEMENT_CODE'] = "";
    
    if (!empty($arVars['MACROS']['CONTACTS_IBLOCK_ID']))
        if ($arIBlockElement = CIBlockElement::GetList(array(), array("IBLOCK_ID" => $arVars['MACROS']['CONTACTS_IBLOCK_ID'], "SECTION_ID" => false))->Fetch())
        {
            $arVars['MACROS']['CONTACTS_MAIN_ELEMENT_ID'] = $arIBlockElement['ID'];
            $arVars['MACROS']['CONTACTS_MAIN_ELEMENT_CODE'] = $arIBlockElement['CODE'];
        }
        
    if (!empty($arVars['MACROS']['CATALOG_IBLOCK_ID']))
    {
        $arLinkProperties = array(
            "BRAND" => $arVars['MACROS']['BRANDS_IBLOCK_ID'],
            "CML2_ASSOCIATED" => $arVars['MACROS']['CATALOG_IBLOCK_ID'],
            "CML2_EXPANDABLES" => $arVars['MACROS']['CATALOG_IBLOCK_ID']
        );
        
        $oCIBlockProperty = new CIBlockProperty();
        
        foreach ($arLinkProperties as $sLinkProperty => $iLinkPropertyIBlock)
            if ($arLinkProperty = CIBlockProperty::GetByID($sLinkProperty, $arVars['MACROS']['CONTACTS_IBLOCK_ID'])->Fetch())
                $oCIBlockProperty->Update($arLinkProperty['ID'], array('LINK_IBLOCK_ID' => $iLinkPropertyIBlock));
                
        $arPropertyLabels = CIBlockProperty::GetList(array(), array(
            'IBLOCK_ID' => $arVars['MACROS']['CATALOG_IBLOCK_ID'],
            'CODE' => 'LABELS')
        )->Fetch();
        
        if (!empty($arPropertyLabels))
            $arVars['MACROS']['CATALOG_PROPERTY_LABELS'] = $arPropertyLabels['ID'];
                
        if (!empty($arVars['MACROS']['CATALOG_OFFERS_IBLOCK_ID'])) {
            $rsProperty = CIBlock::GetProperties(
                $arVars['MACROS']['CATALOG_OFFERS_IBLOCK_ID'],
                array(),
                array('XML_ID' => 'CML2_LINK')
            );
            
            if ($arProperty = $rsProperty->GetNext()) {
                $oProperty = new CIBlockProperty();
                $oProperty->Update($arProperty['ID'], array('LINK_IBLOCK_ID' => $arVars['MACROS']['CATALOG_IBLOCK_ID']));
                
                CCatalog::Update(
                    $arVars['MACROS']['CATALOG_OFFERS_IBLOCK_ID'],
                    array(
                        'PRODUCT_IBLOCK_ID' => $arVars['MACROS']['CATALOG_IBLOCK_ID'],
                        'SKU_PROPERTY_ID' => $arProperty['ID']
                    )
                );
            }
        }
    }
        
    WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH, $arVars['MACROS']);
    WizardServices::ReplaceMacrosRecursive($sTemplateDirectory, $arVars['MACROS']);
    CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."_index.php", $arVars['MACROS']);
	// CWizardUtil::ReplaceMacros($sTemplateDirectory."/components/bitrix/breadcrumb/elegante_bread/template.php", $arVars['MACROS']);
    
    __clearVars();
?>