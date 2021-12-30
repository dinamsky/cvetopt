<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
// if(false):
if(!empty($arResult["CATEGORIES"])):
?>
<?foreach($arResult["CATEGORIES"] as $category_id => $arCategory):?>

	<?foreach($arCategory["ITEMS"] as $i => $arItem):?>
	<?if(isset($arItem["ICON"]) || $category_id === "all"):?>
<a href="<?echo $arItem["URL"]?>">


					<?if($category_id === "all"):?>
					<!-- <td class="title-search-all"><a href="<?echo $arItem["URL"]?>"><?echo $arItem["NAME"]?></td> -->
				<?elseif(isset($arResult["ELEMENTS"][$arItem["ITEM_ID"]])):
					$arElement = $arResult["ELEMENTS"][$arItem["ITEM_ID"]];
				else:
					$arElement = "";
				?>
				<?endif?>

				<?if($category_id === "all"):
				$arElement = "";
				endif?>
	<div class="row search_prod" <?if($category_id === "all"):?> style="border-bottom: none;"<?endif?>>
	<div class="col-md-10">
	<!-- <?=$category_id;?> <br> -->
	<?echo $arItem["NAME"]?><br>
		<?foreach($arElement["PRICES"] as $code=>$arPrice):?>
		<?if($arPrice["CAN_ACCESS"]):?>
		<p class="title-search-price"><?//=$arResult["PRICES"][$code]["TITLE"];?>
			<?if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]):?>
			<s><?=$arPrice["PRINT_VALUE"]?></s> <span class="catalog-price"><?=$arPrice["PRINT_DISCOUNT_VALUE"]?></span>
			<?else:?><span class="catalog-price"><?=$arPrice["PRINT_VALUE"]?></span><?endif;?>
		</p>
		<?endif;?>
		<?endforeach;?>
	</div>


	<div class="col-md-2" style="margin-left: -30px;">
						<?if (is_array($arElement["PICTURE"])):?>
							<img  src="<?echo $arElement["PICTURE"]["src"]?>" width="75" >
						<?endif;?>
	</div>
	</div>

	</a>
	<?endif?>
	<?endforeach?>
<?endforeach?>


<?
endif
?>

<?
if(false):
	// if(!empty($arResult["CATEGORIES"])):

	?>
	<table class="title-search-result">
		<?foreach($arResult["CATEGORIES"] as $category_id => $arCategory):?>

			<?foreach($arCategory["ITEMS"] as $i => $arItem):?>
			<tr>
				<?if($category_id === "all"):?>
					<td class="title-search-all"><a href="<?echo $arItem["URL"]?>"><?echo $arItem["NAME"]?></td>
				<?elseif(isset($arResult["ELEMENTS"][$arItem["ITEM_ID"]])):
					$arElement = $arResult["ELEMENTS"][$arItem["ITEM_ID"]];
				?>
					<td class="title-search-item">

					<table width="100%">
					<tr>

						<td>
						<a href="<?echo $arItem["URL"]?>"><?echo $arItem["NAME"]?></a>
						<p class="title-search-preview"><?echo $arElement["PREVIEW_TEXT"];?></p>
						<?foreach($arElement["PRICES"] as $code=>$arPrice):?>
							<?if($arPrice["CAN_ACCESS"]):?>
								<p class="title-search-price"><?=$arResult["PRICES"][$code]["TITLE"];?>:&nbsp;&nbsp;
								<?if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]):?>
									<s><?=$arPrice["PRINT_VALUE"]?></s> <span class="catalog-price"><?=$arPrice["PRINT_DISCOUNT_VALUE"]?></span>
								<?else:?><span class="catalog-price"><?=$arPrice["PRINT_VALUE"]?></span><?endif;?>
								</p>
							<?endif;?>
						<?endforeach;?>
					</td>
											<td style=" width: 75px; vertical-align: top;">
					<?
						if (is_array($arElement["PICTURE"])):?>
							<img align="left" src="<?echo $arElement["PICTURE"]["src"]?>" width="75" >
						<?endif;?>
						</td>
					</tr>
					</table>
					</td>
				<?elseif(isset($arItem["ICON"])):?>
					<td class="title-search-item"><a href="<?echo $arItem["URL"]?>"><?echo $arItem["NAME"]?></td>
				<?else:?>
					<td class="title-search-more"><a href="<?echo $arItem["URL"]?>"><?echo $arItem["NAME"]?></td>
				<?endif;?>
			</tr>
			<?endforeach;?>
		<?endforeach;?>
		<tr>
			<th class="title-search-separator">&nbsp;</th>
			<td class="title-search-separator">&nbsp;</td>
		</tr>
	</table><div class="title-search-fader"></div>
<?endif;
?>