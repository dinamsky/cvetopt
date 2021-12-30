<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php"); 

if(empty($_POST['phone']))
   {
echo "No arguments Provided!";
return false;
   }

$name = $_POST['name'];
$phone = $_POST['phone'];

if(SITE_CHARSET=="windows-1251")
{
$name =iconv( "UTF-8", "CP1251//IGNORE",$name);
$phone =iconv( "UTF-8", "CP1251//IGNORE",$phone);
}


	$arEventFields = array( 
	"AUTHOR_PERSONAL_MOBILE"	=>		$phone,
	"AUTHOR_NAME"				=>		$name,
	"email_admin"				=>		COption::GetOptionString("main", "email_from")
	); 

if (CModule::IncludeModule("main")): 
	if (CEvent::Send("SMARKET_CALLBACK", "s1", $arEventFields)): 
	// if (CEvent::SendImmediate("SMARKET_CALLBACK", "s1", $arEventFields)): 
		echo "ok"; 
	endif; 
	endif; 

return true; 

?>