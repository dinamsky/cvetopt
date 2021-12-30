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

<div class="row content_index white" <? if($APPLICATION->GetCurPage(false) !== SITE_DIR.'content/'): ?>style="margin: 0"<?endif?>>

<? if($APPLICATION->GetCurPage(false) !== SITE_DIR.'content/'): ?>

	<div class="col-md-2">
		<div class="title">
			<div><?=GetMessage("TITLE_INDEX")?></div>
		</div>
	</div>
	
	<div class="col-md-9">

<?endif?>


	<?foreach($arResult["ITEMS"] as $arElement):?>
	<?
	$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>


<?
			      $renderImage = CFile::ResizeImageGet($arElement["PREVIEW_PICTURE"], Array("width" => '600', "height" => '230'), BX_RESIZE_IMAGE_EXACT, true);
?>

	<div class="col-md-4 col-sm-12 col-xs-12" style="padding-bottom: 30px;">
		<a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
			<div class="statiya"  id="<?=$this->GetEditAreaId($arElement['ID']);?>">
		
					<strong><?=$arElement["NAME"]?></strong>
					<?= TruncateText(HTMLToTxt($arElement['PREVIEW_TEXT']), 150);?>
			</div>
			<img src="<?=$renderImage['src']?>" class="img-responsive">
		</a>
	</div>


	<?endforeach;?>


<? if($APPLICATION->GetCurPage(false) !== SITE_DIR.'content/'): ?>

	</div>

<div class="col-md-1 col-sm-12 col-xs-12 index_more_content"><a href="/content/"><?=GetMessage("INDEX_MORE")?> <i class="fa fa-angle-right"></i></a></div>

<?endif?>


	</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<p><?=$arResult["NAV_STRING"]?></p>
<?endif?>