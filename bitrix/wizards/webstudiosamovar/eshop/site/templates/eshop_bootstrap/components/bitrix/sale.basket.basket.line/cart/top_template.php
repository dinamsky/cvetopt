<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
$compositeStub = (isset($arResult['COMPOSITE_STUB']) && $arResult['COMPOSITE_STUB'] == 'Y');

// echo "<pre>";
// print_r($arResult);
// echo "</pre>";

?>
	<?
		if (!$arResult["DISABLE_USE_BASKET"])
		{
			?>
<a href="<?= $arParams['PATH_TO_BASKET'] ?>" class="cart_b">
			<i class="demo-icon icon-basket-1"></i>
			<?
		}
		if (!$compositeStub)
		{
			if ($arResult['PRODUCT_COUNT'] > 0)
			{
				echo '<div class="kol">'.$arResult['PRODUCT_COUNT'].'</div>';
			?>
			<div class=" hidden-xs hidden-sm"><?= $arResult['TOTAL_PRICE'] ?></div>
			<?} else {?>
			<div class=" hidden-xs hidden-sm" style="text-decoration: underline;"><?=GetMessage('TSB1_CART') ?></div>
				<? 	} ?>
			<? } ?>

</a>

