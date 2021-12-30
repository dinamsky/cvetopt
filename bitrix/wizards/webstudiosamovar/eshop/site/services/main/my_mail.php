<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$dbSite = CSite::GetByID(WIZARD_SITE_ID);
if($arSite = $dbSite -> Fetch())
	$lid = $arSite["LANGUAGE_ID"];
if(strlen($lid) <= 0)
	$lid = "ru";

$dbEvent = CEventMessage::GetList($b="ID", $order="ASC", Array("EVENT_NAME" => "SMARKET", "SITE_ID" => WIZARD_SITE_ID));


if(!($dbEvent->Fetch()))
{

// -----------------------------------------------------------------  CALLBACK

	$dbEvent = CEventType::GetList(Array("TYPE_ID" => "SMARKET_CALLBACK"));
	if(!($dbEvent->Fetch()))
	{
		$et = new CEventType;
		$et->Add(array(
			"LID" => $lid,
			"EVENT_NAME" => "SMARKET_CALLBACK",
			"NAME" => GetMessage("SMARKET_CALLBACK_NAME"),
			"DESCRIPTION" => GetMessage("SMARKET_CALLBACK_DESC"),
		));
	

	$emess = new CEventMessage;
	$emess->Add(array(
		"ACTIVE" => "Y",
		"EVENT_NAME" => "SMARKET_CALLBACK",
		"LID" => WIZARD_SITE_ID,
		"EMAIL_FROM" => "no-reply@#SERVER_NAME#",
		"EMAIL_TO" => "#email_admin#",
		"BCC" => "",
		"SUBJECT" => GetMessage("SMARKET_CALLBACK_SUBJECT"),
		"MESSAGE" => GetMessage("SMARKET_CALLBACK_MESSAGE"),
		"BODY_TYPE" => "text",
	));

}

	// -----------------------------------------------------------------  ZAKAZ

	$dbEvent = CEventType::GetList(Array("TYPE_ID" => "SMARKET_ZAKAZ"));
	if(!($dbEvent->Fetch()))
	{
		$et = new CEventType;
		$et->Add(array(
			"LID" => $lid,
			"EVENT_NAME" => "SMARKET_ZAKAZ",
			"NAME" => GetMessage("SMARKET_ZAKAZ_NAME"),
			"DESCRIPTION" => GetMessage("SMARKET_CALLBAC_BRON_DESC"),
		));
	

	$emess = new CEventMessage;
	$emess->Add(array(
		"ACTIVE" => "Y",
		"EVENT_NAME" => "SMARKET_ZAKAZ",
		"LID" => WIZARD_SITE_ID,
		"EMAIL_FROM" => "no-reply@#SERVER_NAME#",
		"EMAIL_TO" => "#email_admin#",
		"BCC" => "",
		"SUBJECT" => GetMessage("SMARKET_ZAKAZ_SUBJECT"),
		"MESSAGE" => GetMessage("SMARKET_ZAKAZ_MESSAGE"),
		"BODY_TYPE" => "text",
	));
	}

}
?>