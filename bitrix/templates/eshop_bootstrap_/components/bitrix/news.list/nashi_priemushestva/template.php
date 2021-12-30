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


<div class="priem text-center">
	

<ul>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

		<li id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arItem["PROPERTIES"]["PICT"]["VALUE"]):?>
			
		 <?
		 if(CModule::IncludeModule('iblock'))
{
		 	$arFile = CFile::GetFileArray($arItem["PROPERTIES"]["PICT"]["VALUE"]);	
		 	$url_file = $arFile['SRC'];
		 	$width =  $arFile['WIDTH'];
		 }
		 ?>
		 	<a href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>">
			<div class="index_priemushestva" style="background: url(<?=$url_file?>) center right no-repeat; width: <?=$width?>"></div>
		</a>
			
			

			<?else:?>	
			<a href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>">
          <div class="index_priemushestva <?=$arItem["PROPERTIES"]["TYPE"]["VALUE"]?>"></div>
      </a>
          <?endif;?>
          
          <div>
          	<strong>
          		<a href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>">
          			<?=$arItem["NAME"]?>
          		</a>
          	</strong>
          <div class="priem_text"><?=$arItem['PREVIEW_TEXT']?></div>
          </div>
        

        </li>

<?endforeach;?>

</ul>

</div>