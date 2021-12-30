<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php"); 

if(empty($_POST['phone']))
   {
echo "No arguments Provided!";
return false;
   }

// return;

$name = $_POST['name'];
$phone = $_POST['phone'];
$nomer = $_POST['nomer'];
$price = $_POST['price'];
$mess = $_POST['mess'];

if(SITE_CHARSET=="windows-1251")
{
$name =iconv( "UTF-8", "CP1251//IGNORE",$name);
$phone =iconv( "UTF-8", "CP1251//IGNORE",$phone);
$nomer =iconv( "UTF-8", "CP1251//IGNORE",$nomer);
$price =iconv( "UTF-8", "CP1251//IGNORE",$price);
$mess =iconv( "UTF-8", "CP1251//IGNORE",$mess);
}

	$arEventFields = array( 
	"NAME"				=>		$name,
	"PHONE"				=>		$phone,
	"TOVAR"				=>		$nomer,
	"PRICE"				=>		$price,
	"MESS"				=>		$mess,
	"email_admin"		=>		COption::GetOptionString("main", "email_from")
	); 

if (CModule::IncludeModule("main")): 
	// if (CEvent::SendImmediate("SMARKET_ZAKAZ", "s1", $arEventFields)): 
	if (CEvent::Send("SMARKET_ZAKAZ", SITE_ID, $arEventFields)): 
		echo "ok"; 
	endif; 
	endif; 

return true; 

?>