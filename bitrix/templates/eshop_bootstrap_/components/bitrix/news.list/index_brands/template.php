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

<div class="list_brends" <? if($APPLICATION->GetCurPage(false) == SITE_DIR && $_SESSION['arr_set']['type_menu'] !== 'v'): ?>style="margin: 0 15px;"<?endif?>>


	<?foreach($arResult["ITEMS"] as $arElement):?>
	<?
	$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>


<?
			      $renderImage = CFile::ResizeImageGet($arElement["PREVIEW_PICTURE"], Array("width" => '600', "height" => '230'), BX_RESIZE_IMAGE_EXACT, true);
?>

	<div class="col-md-2 col-sm-12 col-xs-12" style="padding: 15px 0; margin: -1px 0 0 -1px" id="<?=$this->GetEditAreaId($arElement['ID']);?>">
		<a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
			<img src="<?=$renderImage['src']?>" class="img-responsive" style="margin: auto;">
		</a>
	</div>


	<?endforeach;?>


	</div>
<div class="row nomargin"></div>
