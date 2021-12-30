<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode( true );?>
<?if (!empty($arResult)):?>
<?//----------------------------------------------------------------  мобильная весия?>

<nav class="navbar navbar-default menu_mobile" role="navigation">
<div class="navbar-header">

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#catalog">
            <i class="fa fa-th-large"></i> <?= GetMessage("MENU_CATALOG_MENU")?>
          </button>

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
            <i class="fa fa-bars"></i> <?= GetMessage("MENU_ABOUT")?>
          </button>

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-3">
           <i class="fa fa-search"></i> <?= GetMessage("MENU_SEARCH")?>
          </button>	


</div>
<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-3" style="height: 1px;">
	 <?
	 $APPLICATION->IncludeComponent(
	"bitrix:search.title", 
	"catalog_search", 
	array(
		"CATEGORY_0" => array(
			0 => "iblock_catalog",
		),
		"CATEGORY_0_TITLE" => "По каталогу",
		"CATEGORY_0_iblock_catalog" => array(
			0 => "4",
		),
		"CHECK_DATES" => "N",
		"COMPONENT_TEMPLATE" => "catalog_search",
		"CONTAINER_ID" => "title-search",
		"INPUT_ID" => "title-search-input",
		"NUM_CATEGORIES" => "2",
		"ORDER" => "date",
		"PAGE" => "#SITE_DIR#search/",
		"SHOW_INPUT" => "Y",
		"SHOW_OTHERS" => "N",
		"TOP_COUNT" => "5",
		"USE_LANGUAGE_GUESS" => "Y",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SHOW_PREVIEW" => "Y",
		"CONVERT_CURRENCY" => "N",
		"PREVIEW_WIDTH" => "75",
		"PREVIEW_HEIGHT" => "75",
		"CATEGORY_1_TITLE" => "Статьи и обзоры",
		"CATEGORY_1" => array(
			0 => "iblock_shop_samovar_content",
		),
		"CATEGORY_1_iblock_shop_samovar_content" => array(
			0 => "8",
		)
	),
	false
);
?>	

</div>

<div class="navbar-collapse collapse  text-center" id="bs-example-navbar-collapse-2" style="height: 1px;">
<?$APPLICATION->IncludeComponent(
  "bitrix:menu",
  "top_mobile",
  Array(
    "COMPONENT_TEMPLATE" => "top",
    "ROOT_MENU_TYPE" => "top",
    "MENU_CACHE_TYPE" => "N",
    "MENU_CACHE_TIME" => "3600",
    "MENU_CACHE_USE_GROUPS" => "Y",
    "MENU_CACHE_GET_VARS" => array(),
    "MAX_LEVEL" => "1",
    "CHILD_MENU_TYPE" => "left",
    "USE_EXT" => "N",
    "DELAY" => "N",
    "ALLOW_MULTI_SELECT" => "N"
  )
);?>	
</div>



<!-- <div class="navbar-collapse collapse"> -->

<div class="navbar-collapse collapse" id="catalog" style="height: 1px;">

<ul class="nav navbar-nav">
<!-- <ul class="nav nav-justified"> -->
<?
foreach($arResult as $arItem) {
	if ($arItem["DEPTH_LEVEL"] == 1) $kol_catalog ++;
}


foreach($arResult as $arItem):?>
	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
		<li class="dropdown <?if ($arItem["SELECTED"]):?>active<?endif?>">
		<a href="<?=$arItem["LINK"]?>" class="dropdown-toggle"  data-toggle="dropdown" href="#" aria-expanded="false">
		<?=$arItem["TEXT"]?> 
		</a>
				<ul class="dropdown-menu">
		<?else:?>
			<li><a href="<?=$arItem["LINK"]?>" class="parent<?if ($arItem["SELECTED"]):?> item-selected<?endif?>"><?=$arItem["TEXT"]?></a>
			</ul>
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="<?if ($arItem["SELECTED"]):?>active<?endif?>"><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" style="padding-bottom: 10px;"><?=$arItem["TEXT"]?></a></li>
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

<?endforeach?>



<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

<!-- </div> -->
<!-- </div> -->
</nav>


<?endif?>
