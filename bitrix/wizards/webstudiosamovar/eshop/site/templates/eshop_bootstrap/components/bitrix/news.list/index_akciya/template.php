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

// echo "<pre>";

// print_r($arResult);
// 	echo "</pre>";


?>
<div class="index_akciya" >

	<?foreach($arResult["ITEMS"] as $arElement):?>
		 <!-- <div class="list_news"> -->
	<?
	$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
?>

				<a href="<?=$arElement["DETAIL_PAGE_URL"]?>" id="<?=$this->GetEditAreaId($arElement['ID']);?>">

				<h3><?=$arElement["NAME"]?></h3>

				<?=TruncateText($arElement['PREVIEW_TEXT'], 100);?>

</a>
	<?endforeach;?>
	</div>
