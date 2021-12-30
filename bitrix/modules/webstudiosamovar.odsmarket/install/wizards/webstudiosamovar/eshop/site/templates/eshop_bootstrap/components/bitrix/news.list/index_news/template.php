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
<div class="row index_news">

	<?foreach($arResult["ITEMS"] as $arElement):?>
<div  >
		 <!-- <div class="list_news"> -->
	<?
	$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
?>

				<a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
<?
			      // $renderImage = CFile::ResizeImageGet($arElement["PREVIEW_PICTURE"], Array("width" => '200', "height" => '200'), BX_RESIZE_IMAGE_EXACT, true);
			      // echo '<div class="col-md-2 col-sm-2 colxs-2"><img alt="'.$arItem["NAME"].'" src="'.$renderImage["src"].' " class="img-responsive"/></div>';
	?>
			<!-- <img src="#" class="img-responsive" alt="Image"> -->
			<div class="col-md-2">
				
			<div class="date"><!-- <i class="fa fa-calendar-o"></i> --> <?echo $arElement["DISPLAY_ACTIVE_FROM"]?></div>
				
			</div>
			<div class="col-md-10" id="<?=$this->GetEditAreaId($arElement['ID']);?>">
				<?=$arElement["NAME"]?>

				<div class="opisanie" style="margin-top: 3px; margin-bottom: 15px;">
				<? //=TruncateText(HTMLToTxt($arElement['DETAIL_TEXT']), 100);?>
				</div>
			</div>
</a>
	</div>
	<?endforeach;?>
	</div>

