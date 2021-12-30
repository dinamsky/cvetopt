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
?>
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<p><?=$arResult["NAV_STRING"]?></p>
<?endif?>

<div class="row masonry-container">

	<?foreach($arResult["ITEMS"] as $arElement):?>
		 <div class="col-md-4 col-sm-6 col-xs-12 item_plitki" style="padding-bottom: 30px;">
		 <div class="list_prod">
	<?
	$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
?>

			<a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
			<h2><?=$arElement["NAME"]?></h2>
<?
			      $renderImage = CFile::ResizeImageGet($arElement["DETAIL_PICTURE"], Array("width" => '600', "height" => '300'), BX_RESIZE_IMAGE_EXACT, true);
      				echo '<img alt="'.$arItem["NAME"].'" src="'.$renderImage["src"].' " class="img-responsive"/>';
	?>
			<!-- <img src="#" class="img-responsive" alt="Image"> -->
		
		<div class="opisanie" style="margin-top: 15px"><?=$arElement['PREVIEW_TEXT']?>
			
		</a>
			<?if($arElement["PROPERTIES"]["AVTOR"]["VALUE"]):?>
			<div style="margin-top: 5px; font-style: italic;">
			<?=$arElement["PROPERTIES"]["AVTOR"]["VALUE"]?>
			</div>
			<?endif?>

			<?if($arElement["PROPERTIES"]["ISTOCHNIC"]["VALUE"]):?>
			<div style="margin-top: 5px; font-style: italic;">
				<a href="<?=$arElement["PROPERTIES"]["ISTOCHNIC"]["VALUE"]?>" target=_blank><?=$arElement["PROPERTIES"]["ISTOCHNIC"]["VALUE"]?></a>
			</div>
			<?endif?>
		</div>

	</div>
	</div>
	<?endforeach;?>

	</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<p><?=$arResult["NAV_STRING"]?></p>
<?endif?>


