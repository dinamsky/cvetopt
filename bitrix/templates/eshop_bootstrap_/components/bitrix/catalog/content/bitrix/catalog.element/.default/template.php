<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$templateLibrary = array('popup');
$currencyList = '';


// echo "<pre>";

// print_r($arResult);

// 	echo "</pre>";




?>


<?
if (!$arResult['PROPERTIES']['INCLUDE']['VALUE'])
{
?>
<?
	if ('html' == $arResult['DETAIL_TEXT_TYPE'])
	{
		echo $arResult['DETAIL_TEXT'];
	}
	else
	{
		?><? echo $arResult['DETAIL_TEXT']; ?><?
	}
?>
<?} else {?>

<? $filename = '!content/'.$arResult['SECTION']['CODE'].'/'.$arResult['PROPERTIES']['INCLUDE']['VALUE']?>
<?//=$filename?>	
<div class="content_include">
<?include($_SERVER['DOCUMENT_ROOT'].SITE_DIR.$filename);?>
</div>
<?
}
?>
