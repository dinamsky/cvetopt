<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if (!CModule::IncludeModule("highloadblock"))
	return;

// if (!WIZARD_INSTALL_DEMO_DATA)
// 	return;

$HAR_ID = $_SESSION["HBLOCK_HAR_ID"];
unset($_SESSION["HBLOCK_HAR_ID"]);

$VNOMERE_ID = $_SESSION["HBLOCK_VNOMERE_ID"];
unset($_SESSION["HBLOCK_VNOMERE_ID"]);

//adding rows
WizardServices::IncludeServiceLang("hightblock.php", LANGUAGE_ID);

use Bitrix\Highloadblock as HL;
global $USER_FIELD_MANAGER;

if ($HAR_ID)
{
	$hldata = HL\HighloadBlockTable::getById($HAR_ID)->fetch();
	$hlentity = HL\HighloadBlockTable::compileEntity($hldata);

	$entity_data_class = $hlentity->getDataClass();
	$arHar = array(
		"har1" => "rNc7AdcZ",
		"har2" => "AaQ6wVTk",
		"har3" => "samsung",
		"har4" => "bridg",
		"har5" => "nok",
		"har6" => "yoko",
		"har7" => "hr3D0XO1",
		"har8" => "UHHvWvng",
	);

	$sort = 0;
	foreach($arHar as $harName=>$harId)
	{
		$sort+= 100;
		$arData = array(
			'UF_NAME' => GetMessage("WZD_REF_harNAME_".$harName),
			'UF_FILE' => '',
			'UF_SORT' => $sort,
			'UF_DEF' => ($sort > 100) ? "0" : "1",
			'UF_XML_ID' => $harId
		);
		$USER_FIELD_MANAGER->EditFormAddFields('HLBLOCK_'.$HAR_ID, $arData);
		$USER_FIELD_MANAGER->checkFields('HLBLOCK_'.$HAR_ID, null, $arData);

		$result = $entity_data_class::add($arData);
	}
}

?>