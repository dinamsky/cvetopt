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

<? if($APPLICATION->GetCurPage(false) == SITE_DIR.'akcii/'): ?>
<div class="row">
<?endif?>


	<?foreach($arResult["ITEMS"] as $arElement):?>

	<?
	$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

<?
			      $renderImage = CFile::ResizeImageGet($arElement["PREVIEW_PICTURE"], Array("width" => '600', "height" => '300'), BX_RESIZE_IMAGE_EXACT, true);
      				// echo '<img alt="'.$arItem["NAME"].'" src="'.$renderImage["src"].' " class="img-responsive"/>';
	?>
	<div class="col-md-6 col-sm-12 col-xs-12 akciya" <? if($APPLICATION->GetCurPage(false) !== SITE_DIR.'akcii/'): ?> style="padding: 0"<?else:?>style="margin-bottom: 30px;"<?endif?>   id="<?=$this->GetEditAreaId($arElement['ID']);?>">
		<?if($arElement["PROPERTIES"]["LINK"]["VALUE"]):?>
		<a href="<?=$arElement["PROPERTIES"]["LINK"]["VALUE"]?>">
		<?else:?>
		<a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
		<?endif?>
			<div class="index_akcii"  style=" background: url(<?=$renderImage["src"]?>) no-repeat center top;">
		

				<div <? if($APPLICATION->GetCurPage(false) == SITE_DIR.'akcii/'): ?>style="left: 15px; right: 15px;"<?endif?>>
					<?if($arElement["PROPERTIES"]["PROC"]["VALUE"]):?>
					<div class="proc_skidki"><div>-<?=$arElement["PROPERTIES"]["PROC"]["VALUE"]?>%</div></div>
					<?endif?>
					<div class="title_akcii"><?=$arElement["NAME"]?></div>
					<?= TruncateText(HTMLToTxt($arElement['PREVIEW_TEXT']), 150);?>
				</div>
			</div>
		</a>
	</div>


	<?endforeach;?>

<? if($APPLICATION->GetCurPage(false) == SITE_DIR.'akcii/'): ?>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<p><?=$arResult["NAV_STRING"]?></p>
<?endif?>
<?endif?>

