<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if (!defined("WIZARD_SITE_ID") || !defined("WIZARD_SITE_DIR"))
	return;

function ___writeToAreasFile($path, $text)
{
	//if(file_exists($fn) && !is_writable($abs_path) && defined("BX_FILE_PERMISSIONS"))
	//	@chmod($abs_path, BX_FILE_PERMISSIONS);

	$fd = @fopen($path, "wb");
	if(!$fd)
		return false;

	if(false === fwrite($fd, $text))
	{
		fclose($fd);
		return false;
	}

	fclose($fd);

	if(defined("BX_FILE_PERMISSIONS"))
		@chmod($path, BX_FILE_PERMISSIONS);
}

if (COption::GetOptionString("main", "upload_dir") == "")
	COption::SetOptionString("main", "upload_dir", "upload");

if(COption::GetOptionString("eshop", "wizard_installed", "N", WIZARD_SITE_ID) == "N" || WIZARD_INSTALL_DEMO_DATA)
{
	if(file_exists(WIZARD_ABSOLUTE_PATH."/site/public/".LANGUAGE_ID."/"))
	{
		CopyDirFiles(
			WIZARD_ABSOLUTE_PATH."/site/public/".LANGUAGE_ID."/",
			WIZARD_SITE_PATH,
			$rewrite = true,
			$recursive = true,
			$delete_after_copy = false
		);

		CopyDirFiles(
			$_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/webstudiosamovar.odsmarket/install/components",
			$_SERVER["DOCUMENT_ROOT"]."/bitrix/components", true, true);

	}
	COption::SetOptionString("eshop", "template_converted", "Y", "", WIZARD_SITE_ID);
}
elseif (COption::GetOptionString("eshop", "template_converted", "N", WIZARD_SITE_ID) == "N")
{
	CopyDirFiles(
		WIZARD_ABSOLUTE_PATH."/site/services/main/".LANGUAGE_ID."/public_convert/",
		WIZARD_SITE_PATH,
		$rewrite = true,
		$recursive = true,
		$delete_after_copy = false
	);
	CopyDirFiles(
		WIZARD_SITE_PATH."/include/company_logo.php",
		WIZARD_SITE_PATH."/include/company_logo_old.php",
		$rewrite = true,
		$recursive = true,
		$delete_after_copy = true
	);

	COption::SetOptionString("eshop", "template_converted", "Y", "", WIZARD_SITE_ID);
}

$wizard =& $this->GetWizard();

// ___writeToAreasFile(WIZARD_SITE_PATH."include/company_name.php", $wizard->GetVar("siteName"));
___writeToAreasFile(WIZARD_SITE_PATH."include/index_footer_copyr.php", $wizard->GetVar("siteCopy"));
___writeToAreasFile(WIZARD_SITE_PATH."include/index_footer_regim.php", $wizard->GetVar("siteSchedule"));
___writeToAreasFile(WIZARD_SITE_PATH."include/index_header_tel.php", $wizard->GetVar("siteTelephone"));
// ___writeToAreasFile(WIZARD_SITE_PATH."include/index_tel.php", $wizard->GetVar("siteTelephone"));
___writeToAreasFile(WIZARD_SITE_PATH."include/index_footer_adress.php", $wizard->GetVar("shopAdr"));
___writeToAreasFile(WIZARD_SITE_PATH."include/index_header_adress.php", $wizard->GetVar("shopAdr"));

// if ($wizard->GetVar("templateID") != "eshop")
// {
// 	$arSocNets = array("shopFacebook" => "facebook", "shopTwitter" => "twitter", "shopVk" => "vk", "shopGooglePlus" => "google");
// 	foreach($arSocNets as $socNet=>$includeFile)
// 	{
// 		$curSocnet = $wizard->GetVar($socNet);
// 		if ($curSocnet)
// 		{
// 			$text = '<a href="'.$curSocnet.'"></a>';
// 			___writeToAreasFile(WIZARD_SITE_PATH."include/socnet_".$includeFile.".php", $text);
// 		}
// 	}
// }

if(COption::GetOptionString("eshop", "wizard_installed", "N", WIZARD_SITE_ID) == "Y" && !WIZARD_INSTALL_DEMO_DATA)
	return;

WizardServices::PatchHtaccess(WIZARD_SITE_PATH);




WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."about/", Array("SITE_DIR" => WIZARD_SITE_DIR));
WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."include/", Array("SITE_DIR" => WIZARD_SITE_DIR));
WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."login/", Array("SITE_DIR" => WIZARD_SITE_DIR));
WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."news/", Array("SITE_DIR" => WIZARD_SITE_DIR));
WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."personal/", Array("SITE_DIR" => WIZARD_SITE_DIR));
WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."search/", Array("SITE_DIR" => WIZARD_SITE_DIR));
WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."store/", Array("SITE_DIR" => WIZARD_SITE_DIR));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."_index.php", Array("SITE_DIR" => WIZARD_SITE_DIR));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.".top.menu.php", Array("SITE_DIR" => WIZARD_SITE_DIR));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."sect_search.php", Array("SITE_DIR" => WIZARD_SITE_DIR));

WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."about/", Array("SALE_EMAIL" => $wizard->GetVar("shopEmail")));

CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/index.php", Array("SITE_DIR" => WIZARD_SITE_DIR));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/.section.php", array("SITE_DESCRIPTION" => htmlspecialcharsbx($wizard->GetVar("siteMetaDescription"))));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/.section.php", array("SITE_KEYWORDS" => htmlspecialcharsbx($wizard->GetVar("siteMetaKeywords"))));



		CopyDirFiles(
			$_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/webstudiosamovar.odsmarket/install/components/bitrix/init.php",
			$_SERVER["DOCUMENT_ROOT"]."/bitrix/php_interface/init.php", true, true);



$arUrlRewrite = array();

if (file_exists(WIZARD_SITE_ROOT_PATH."/urlrewrite.php"))
{
	include(WIZARD_SITE_ROOT_PATH."/urlrewrite.php");
}

$arUrlRewrite = array(
	array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."personal/orders/#                      ",
		"RULE" => "",
		"ID" => "bitrix:sale.personal.order",
		"PATH" => WIZARD_SITE_DIR."personal/order/index.php",
	),
	array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."content/#                              ",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => WIZARD_SITE_DIR."content/index.php",
	),
	array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."akcii/#                              ",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => WIZARD_SITE_DIR."akcii/index.php",
	),
	array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."catalog/#                        ",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => WIZARD_SITE_DIR."catalog/index.php",
	),
	array(
		"CONDITION" => "#".WIZARD_SITE_DIR."news/#                          ",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => WIZARD_SITE_DIR."news/index.php",
	),
	array(
		"CONDITION" => "#".WIZARD_SITE_DIR."brands/#                          ",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => WIZARD_SITE_DIR."brands/index.php",
	),	
	array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."/personal/#                     ",
		"RULE" => "",
		"ID" => "bitrix:sale.personal.section",
		"PATH" => WIZARD_SITE_DIR."personal/index.php",
	),
);

foreach ($arUrlRewrite as $arUrl)
{
	// if (!in_array($arUrl, $arUrlRewrite))
	// {
		CUrlRewriter::Add($arUrl);
	// }
}



CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/catalog/index.php", Array("SITE_DIR_" => WIZARD_SITE_DIR));

CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/include/_templates_search_form.php", Array("SITE_DIR_" => WIZARD_SITE_DIR));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/include/_templates_show_fav.php", Array("SITE_DIR_" => WIZARD_SITE_DIR));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/include/_templates_show_sravn.php", Array("SITE_DIR_" => WIZARD_SITE_DIR));

CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/akcii/index.php", Array("SITE_DIR_" => WIZARD_SITE_DIR));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/content/index.php", Array("SITE_DIR_" => WIZARD_SITE_DIR));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/news/index.php", Array("SITE_DIR_" => WIZARD_SITE_DIR));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/brands/index.php", Array("SITE_DIR_" => WIZARD_SITE_DIR));

CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/.top.menu.php", Array("SITE_DIR_" => WIZARD_SITE_DIR));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/.bottom.menu.php", Array("SITE_DIR_" => WIZARD_SITE_DIR));

CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/local/ajax/list_compare.php", Array("SITE_DIR_" => WIZARD_SITE_DIR));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/local/ajax/list_fav.php", Array("SITE_DIR_" => WIZARD_SITE_DIR));

CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/personal/index.php", Array("SITE_DIR_" => WIZARD_SITE_DIR));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/personal/cart/index.php", Array("SITE_DIR_" => WIZARD_SITE_DIR));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/personal/order/index.php", Array("SITE_DIR_" => WIZARD_SITE_DIR));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/personal/order/make/index.php", Array("SITE_DIR_" => WIZARD_SITE_DIR));

?>