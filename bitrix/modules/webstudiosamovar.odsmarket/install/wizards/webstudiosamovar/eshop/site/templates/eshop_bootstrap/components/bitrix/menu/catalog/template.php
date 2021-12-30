<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode( true );?>
<?if (!empty($arResult)):?>

<?//----------------------------------------------------------------  Простая весия?>

<!-- <ul class="nav navbar-nav"> -->
<ul class="nav nav-justified">
<?
$previousLevel = 0;
$kol_punkt = 0;
$kol_punkt_finish = 7;

$kol_catalog = 0;

foreach($arResult as $arItem) {
	if ($arItem["DEPTH_LEVEL"] == 1) $kol_catalog ++;
}


// echo $kol_catalog;


foreach($arResult as $arItem):?>


<?//if($kol_punkt <= $kol_punkt_finish-1):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
		<li class="dropdown hover <?if ($arItem["SELECTED"]):?>active<?endif?>" <?if($kol_punkt > $kol_punkt_finish-1):?> style=" display: none;"<?endif?>>
		<a href="<?=$arItem["LINK"]?>" class="dropdown-toggle"  aria-expanded="true">
		<?=$arItem["TEXT"]?>
		</a>
		<ul class="dropdown-menu">
		<?else:?>
		<li><a href="<?=$arItem["LINK"]?>" class="parent<?if ($arItem["SELECTED"]):?> item-selected<?endif?>"><?=$arItem["TEXT"]?></a></li>
		</ul>
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="<?if ($arItem["SELECTED"]):?>active<?endif?>"  <?if($kol_punkt > $kol_punkt_finish-1):?> style=" display: none;"<?endif?>><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" style="padding-bottom: 10px;"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li class="<?if ($arItem["SELECTED"]):?>active<?endif?>"><a href="<?=$arItem["LINK"]?>" <?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>
	
	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>
	<? if ($arItem["DEPTH_LEVEL"] == 1) $kol_punkt ++;?>


<?//endif?>

<?endforeach?>

<?
$kol_punkt = 0;


?>
	</ul>

<?if($kol_catalog > $kol_punkt_finish):?>
			<li role="presentation" class="dropdown hover more_razdel">
				<a href="#" class="dropdown-toggle <?if ($arItem["SELECTED"]):?>active<?endif?>" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
				<nobr><?=GetMessage("MENU_CATALOG_MORE")?> <span class="caret"></span></nobr>
				</a>
					<ul class="dropdown-menu">
						
						<?foreach($arResult as $arItem):?>
						<?if($kol_punkt > $kol_punkt_finish-1 && $arItem["DEPTH_LEVEL"] == 1):?>
							<li><a href="<?=$arItem["LINK"]?>" class="parent<?if ($arItem["SELECTED"]):?> item-selected<?endif?>"><?=$arItem["TEXT"]?></a></li>
						<?endif?>
						<? if ($arItem["DEPTH_LEVEL"] == 1) $kol_punkt ++;?>
						<?endforeach?>

					</ul>
			</li>
<?endif?>


<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

<?endif?>
