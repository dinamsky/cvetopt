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
//   echo "</pre>";
?>
<div class="row nomargin"></div>
	<div class="plitki_prod_index" style="margin: 0 -10px">
<?

$i = 1;

foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	//$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
		<?
			switch ($i) {
				case 1:?>
			<?
			$pict = CFile::ResizeImageGet( $arItem['PREVIEW_PICTURE'], Array("width" => '365', "height" => '365'), BX_RESIZE_IMAGE_EXACT, true);
			$pict = $pict['src'];
			?>
          <div class="col-md-4 col-sm-12 col-xs-12 priem_plitki_one"  style="padding: 10px" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <a href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>">
              <div class="pl_1" style="background: url('<?=$pict?>'); background-size: cover;">
      
                    <?if($arItem['PROPERTIES']['PRICE']['VALUE']):?><div class="price"><?=$arItem['PROPERTIES']['PRICE']['VALUE']?></div><?endif?>
                  
              </div>
                  <div class="text_one">
                    <div class="name"><?=$arItem['NAME']?></div>
                    <?if($arItem['PREVIEW_TEXT']):?><div class="text"><?=$arItem['PREVIEW_TEXT']?></div><?endif?>
                  </div>

            </a>
          </div>

			<?break;
			case 2:
			?>

			<?
      $pict = CFile::ResizeImageGet( $arItem['PREVIEW_PICTURE'], Array("width" => '365', "height" => '365'), BX_RESIZE_IMAGE_EXACT, true);
      $pict = $pict['src'];
			?>	

          <div class="col-md-4 col-sm-12 col-xs-12 priem_plitki_one"  style="padding: 10px" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <a href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>">
              <div class="pl_2" style="background: url('<?=$pict?>'); background-size: cover;">
      
                    <?if($arItem['PROPERTIES']['PRICE']['VALUE']):?><div class="price"><?=$arItem['PROPERTIES']['PRICE']['VALUE']?></div><?endif?>
              </div>
                  <div class="text_one">
                    <div class="name"><?=$arItem['NAME']?></div>
                    <?if($arItem['PREVIEW_TEXT']):?><div class="text"><?=$arItem['PREVIEW_TEXT']?></div><?endif?>
                  </div>
            </a>
          </div>

          <?break;
			case 3:
			?>
		
      <?
      $pict = CFile::ResizeImageGet( $arItem['PREVIEW_PICTURE'], Array("width" => '365', "height" => '365'), BX_RESIZE_IMAGE_EXACT, true);
      $pict = $pict['src'];
      ?>  

          <div class="col-md-4 col-sm-12 col-xs-12 priem_plitki_one"  style="padding: 10px" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <a href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>">
              <div class="pl_3" style="background: url('<?=$pict?>'); background-size: cover;">
                    <?if($arItem['PROPERTIES']['PRICE']['VALUE']):?><div class="price"><?=$arItem['PROPERTIES']['PRICE']['VALUE']?></div><?endif?>
      
              </div>
                  <div class="text_one <?=$arItem['PROPERTIES']['GDE']['VALUE_XML_ID']?>">
                    <div class="name"><?=$arItem['NAME']?></div>
                    <?if($arItem['PREVIEW_TEXT']):?><div class="text"><?=$arItem['PREVIEW_TEXT']?></div><?endif?>
                  </div>
            </a>
          </div>

          <?break;
			case 4:
			?>
      <?
      $pict = CFile::ResizeImageGet( $arItem['PREVIEW_PICTURE'], Array("width" => '560', "height" => '365'), BX_RESIZE_IMAGE_EXACT, true);
      $pict = $pict['src'];
      ?>  

          <div class="col-md-6 col-sm-12 col-xs-12 priem_plitki_one"  style="padding: 10px" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <a href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>">
              <div class="pl_4" style="background: url('<?=$pict?>'); background-size: cover;">
                    <?if($arItem['PROPERTIES']['PRICE']['VALUE']):?><div class="price"><?=$arItem['PROPERTIES']['PRICE']['VALUE']?></div><?endif?>
      
              </div>
                  <div class="text_one <?=$arItem['PROPERTIES']['GDE']['VALUE_XML_ID']?>">
                    <div class="name"><?=$arItem['NAME']?></div>
                    <?if($arItem['PREVIEW_TEXT']):?><div class="text"><?=$arItem['PREVIEW_TEXT']?></div><?endif?>
                  </div>
            </a>
          </div>

          <?break;
			case 5:
			?>
      <?
      $pict = CFile::ResizeImageGet( $arItem['PREVIEW_PICTURE'], Array("width" => '560', "height" => '360'), BX_RESIZE_IMAGE_EXACT, true);
      $pict = $pict['src'];
      ?>
          <div class="col-md-6 col-sm-12 col-xs-12 priem_plitki_one"  style="padding: 10px" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <a href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>">
              <div class="pl_5" style="background: url('<?=$pict?>'); background-size: cover;">
      
                    <?if($arItem['PROPERTIES']['PRICE']['VALUE']):?><div class="price"><?=$arItem['PROPERTIES']['PRICE']['VALUE']?></div><?endif?>
              </div>
                  <div class="text_one <?=$arItem['PROPERTIES']['GDE']['VALUE_XML_ID']?>">
                    <div class="name"><?=$arItem['NAME']?></div>
                    <?if($arItem['PREVIEW_TEXT']):?><div class="text"><?=$arItem['PREVIEW_TEXT']?></div><?endif?>
                  </div>
            </a>
          </div>

			<?
			break;
			}?>		
<?

$i ++;

endforeach;?>

</div>

