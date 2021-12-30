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
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<p><?=$arResult["NAV_STRING"]?></p>
<?endif?>

	<?foreach($arResult["ITEMS"] as $arElement):?>
<div class="row" style="margin-bottom: 40px"  <?if($arElement["PROPERTIES"]["LINK"]["VALUE"]):?>data-toggle="tooltip" data-placement="left" title="Перейти в каталог"<?endif?>>
	<?
	$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
?>
		 <div class="list_news" id="<?=$this->GetEditAreaId($arElement['ID']);?>">


				<?if($arElement['DETAIL_TEXT']):?>
				<a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
				<?endif?>


<?
			      $renderImage = CFile::ResizeImageGet($arElement["PREVIEW_PICTURE"], Array("width" => '200', "height" => '200'), BX_RESIZE_IMAGE_EXACT, true);
			      echo '<div class="col-md-2"><img alt="'.$arElement["NAME"].'" src="'.$renderImage["src"].' " class="img-responsive"/></div>';
	?>
			<!-- <img src="#" class="img-responsive" alt="Image"> -->
			<div class="col-md-10 ">
			<?if($arElement["DISPLAY_ACTIVE_FROM"]):?>
			<div class="news-date-time"><i class="fa fa-calendar-o"></i> <?echo $arElement["DISPLAY_ACTIVE_FROM"]?></div>
			<?endif?>
						<h2><?=$arElement["NAME"]?>
						<?if($arElement["PROPERTIES"]["LINK"]["VALUE"]):?><?endif?></h2>
		
		<div class="opisanie" style="margin-top: 15px">
		<?if(!$arElement["PROPERTIES"]["LINK"]["VALUE"]):?>
		<?= TruncateText(HTMLToTxt($arElement['DETAIL_TEXT']), 400);?>
		<?else:?>
		<?= HTMLToTxt($arElement['DETAIL_TEXT']);?>
		<?endif?>

		</div>
		</div>
</a>
	</div>
	</div>
	<?endforeach;?>


<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<p><?=$arResult["NAV_STRING"]?></p>
<?endif?>

<div class="cl"></div>

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
	</script>
