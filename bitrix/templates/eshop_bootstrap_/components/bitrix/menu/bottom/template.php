<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode( true );?>
<?if (!empty($arResult)):?>



		<div class="col-md-6 col-xs-6 col-sm-6">
			<div class="menu_bottom">
				<ul class="list-unstyled">
<?
$count = count($arResult)/2;

$i = 0;
foreach($arResult as $arItem):?>
	
	<?if($i<$count):?>
	<li class="<?if ($arItem["SELECTED"]):?>active<?endif?>"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	<?endif?>

	<?$i++;?>
<?endforeach?>
				</ul>
			</div>
		</div>


		<div class="col-md-6 col-xs-6 col-sm-6">
			<div class="menu_bottom">
				<ul class="list-unstyled">
<?
$count = count($arResult)/2;

$i = 0;
foreach($arResult as $arItem):?>
	
	<?if($i>=$count):?>
	<li class="<?if ($arItem["SELECTED"]):?>active<?endif?>"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	<?endif?>

	<?$i++;?>
<?endforeach?>
				</ul>
			</div>
		</div>



<?endif?>