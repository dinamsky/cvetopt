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

// print_r($arResult['ITEMS']['OFFERS']);

// echo "</pre>";
  require_once($_SERVER["DOCUMENT_ROOT"].SITE_DIR.'include/form_zakaz.php');



?>
<script>

	function compare_tov(id, id_block)
{
  var chek = document.getElementById('compareid_'+id);
    if (chek.checked)
        {
        //Добавить
        var AddedGoodId = id;
            $.get("<?=SITE_DIR?>local/ajax/list_compare.php",
            { 
                action: "ADD_TO_COMPARE_LIST", id: AddedGoodId, id_block: id_block},
                function(data) {
	        $("#compare_list_count").html(data);
        	}
        );
        }
    else
       {
        //Удалить
        var AddedGoodId = id;
            $.get("<?=SITE_DIR?>local/ajax/list_compare.php",
            { 
                action: "DELETE_FROM_COMPARE_LIST", id: AddedGoodId, id_block: id_block},
                function(data) {
	        $("#compare_list_count").html(data);
            }
            );
    }
}


	function fav_tov(id_fav, id_block)
{
  var chek = document.getElementById('favid_'+id_fav);
    if (chek.checked)
        {
        //Добавить
        var AddedGoodId_fav = id_fav;
            $.get("<?=SITE_DIR?>local/ajax/list_fav.php",
            { 
                action: "ADD_TO_COMPARE_LIST", id: AddedGoodId_fav, id_block: id_block},
                function(data) {
	        $("#fav_list_count").html(data);
        	}
        );
        }
    else
       {
        //Удалить
        var AddedGoodId_fav = id_fav;
            $.get("<?=SITE_DIR?>local/ajax/list_fav.php",
            { 
                action: "DELETE_FROM_COMPARE_LIST", id: AddedGoodId_fav, id_block: id_block},
                function(data) {
	        $("#fav_list_count").html(data);
            }
            );
    }
}

</script>
<?
if (!empty($arResult['ITEMS']))
{
	$templateLibrary = array('popup');
	$currencyList = '';
	if (!empty($arResult['CURRENCIES']))
	{
		$templateLibrary[] = 'currency';
		$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
	}
	$templateData = array(
		'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css',
		'TEMPLATE_CLASS' => 'bx_'.$arParams['TEMPLATE_THEME'],
		'TEMPLATE_LIBRARY' => $templateLibrary,
		'CURRENCIES' => $currencyList
	);
	unset($currencyList, $templateLibrary);

	$skuTemplate = array();
	if (!empty($arResult['SKU_PROPS']))
	{
		foreach ($arResult['SKU_PROPS'] as $arProp)
		{
			$propId = $arProp['ID'];
			$skuTemplate[$propId] = array(
				'SCROLL' => array(
					'START' => '',
					'FINISH' => '',
				),
				'FULL' => array(
					'START' => '',
					'FINISH' => '',
				),
				'ITEMS' => array()
			);
			$templateRow = '';
			if ('TEXT' == $arProp['SHOW_MODE'])
			{
				$skuTemplate[$propId]['SCROLL']['START'] = '<div class="bx_item_detail_size full" id="#ITEM#_prop_'.$propId.'_cont">'.
					'<span class="bx_item_section_name_gray">'.htmlspecialcharsbx($arProp['NAME']).'</span>'.
					'<div class="bx_size_scroller_container"><div class="bx_size"><ul id="#ITEM#_prop_'.$propId.'_list" style="width: #WIDTH#;">';;
				$skuTemplate[$propId]['SCROLL']['FINISH'] = '</ul></div>'.
					'<div class="bx_slide_left" id="#ITEM#_prop_'.$propId.'_left" data-treevalue="'.$propId.'" style=""></div>'.
					'<div class="bx_slide_right" id="#ITEM#_prop_'.$propId.'_right" data-treevalue="'.$propId.'" style=""></div>'.
					'</div></div>';

				$skuTemplate[$propId]['FULL']['START'] = '<div class="bx_item_detail_size" id="#ITEM#_prop_'.$propId.'_cont">'.
					'<span class="bx_item_section_name_gray">'.htmlspecialcharsbx($arProp['NAME']).'</span>'.
					'<div class="bx_size_scroller_container"><div class="bx_size"><ul id="#ITEM#_prop_'.$propId.'_list" style="width: #WIDTH#;">';;
				$skuTemplate[$propId]['FULL']['FINISH'] = '</ul></div>'.
					'<div class="bx_slide_left" id="#ITEM#_prop_'.$propId.'_left" data-treevalue="'.$propId.'" style="display: none;"></div>'.
					'<div class="bx_slide_right" id="#ITEM#_prop_'.$propId.'_right" data-treevalue="'.$propId.'" style="display: none;"></div>'.
					'</div></div>';
				foreach ($arProp['VALUES'] as $value)
				{
					$value['NAME'] = htmlspecialcharsbx($value['NAME']);
					$skuTemplate[$propId]['ITEMS'][$value['ID']] = '<li data-treevalue="'.$propId.'_'.$value['ID'].
						'" data-onevalue="'.$value['ID'].'" style="width: #WIDTH#;" title="'.$value['NAME'].'"><i></i><span class="cnt">'.$value['NAME'].'</span></li>';
				}
				unset($value);
			}
			elseif ('PICT' == $arProp['SHOW_MODE'])
			{
				$skuTemplate[$propId]['SCROLL']['START'] = '<div class="bx_item_detail_scu full" id="#ITEM#_prop_'.$propId.'_cont">'.
					'<span class="bx_item_section_name_gray">'.htmlspecialcharsbx($arProp['NAME']).'</span>'.
					'<div class="bx_scu_scroller_container"><div class="bx_scu"><ul id="#ITEM#_prop_'.$propId.'_list" style="width: #WIDTH#;">';
				$skuTemplate[$propId]['SCROLL']['FINISH'] = '</ul></div>'.
					'<div class="bx_slide_left" id="#ITEM#_prop_'.$propId.'_left" data-treevalue="'.$propId.'" style=""></div>'.
					'<div class="bx_slide_right" id="#ITEM#_prop_'.$propId.'_right" data-treevalue="'.$propId.'" style=""></div>'.
					'</div></div>';

				$skuTemplate[$propId]['FULL']['START'] = '<div class="bx_item_detail_scu" id="#ITEM#_prop_'.$propId.'_cont">'.
					'<span class="bx_item_section_name_gray">'.htmlspecialcharsbx($arProp['NAME']).'</span>'.
					'<div class="bx_scu_scroller_container"><div class="bx_scu"><ul id="#ITEM#_prop_'.$propId.'_list" style="width: #WIDTH#;">';
				$skuTemplate[$propId]['FULL']['FINISH'] = '</ul></div>'.
					'<div class="bx_slide_left" id="#ITEM#_prop_'.$propId.'_left" data-treevalue="'.$propId.'" style="display: none;"></div>'.
					'<div class="bx_slide_right" id="#ITEM#_prop_'.$propId.'_right" data-treevalue="'.$propId.'" style="display: none;"></div>'.
					'</div></div>';
				foreach ($arProp['VALUES'] as $value)
				{
					$value['NAME'] = htmlspecialcharsbx($value['NAME']);
					$skuTemplate[$propId]['ITEMS'][$value['ID']] = '<li data-treevalue="'.$propId.'_'.$value['ID'].
						'" data-onevalue="'.$value['ID'].'" style="width: #WIDTH#; padding-top: #WIDTH#;"><i title="'.$value['NAME'].'"></i>'.
						'<span class="cnt"><span class="cnt_item" style="background-image:url(\''.$value['PICT']['SRC'].'\');" title="'.$value['NAME'].'"></span></span></li>';
				}
				unset($value);
			}
		}
		unset($templateRow, $arProp);
	}

	if ($arParams["DISPLAY_TOP_PAGER"])
	{
		?><? echo $arResult["NAV_STRING"]; ?><?
	}

	$strElementEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT");
	$strElementDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE");
	$arElementDeleteParams = array("CONFIRM" => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));
?>

<div class="bx_catalog_list_home col<? echo $arParams['LINE_ELEMENT_COUNT']; ?> <? echo $templateData['TEMPLATE_CLASS']; ?>">
	<?
foreach ($arResult['ITEMS'] as $key => $arItem)
{
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
	$strMainID = $this->GetEditAreaId($arItem['ID']);

	$arItemIDs = array(
		'ID' => $strMainID,
		'PICT' => $strMainID.'_pict',
		'SECOND_PICT' => $strMainID.'_secondpict',
		'STICKER_ID' => $strMainID.'_sticker',
		'SECOND_STICKER_ID' => $strMainID.'_secondsticker',
		'QUANTITY' => $strMainID.'_quantity',
		'QUANTITY_DOWN' => $strMainID.'_quant_down',
		'QUANTITY_UP' => $strMainID.'_quant_up',
		'QUANTITY_MEASURE' => $strMainID.'_quant_measure',
		'BUY_LINK' => $strMainID.'_buy_link',
		'BASKET_ACTIONS' => $strMainID.'_basket_actions',
		'NOT_AVAILABLE_MESS' => $strMainID.'_not_avail',
		'SUBSCRIBE_LINK' => $strMainID.'_subscribe',
		'COMPARE_LINK' => $strMainID.'_compare_link',

		'PRICE' => $strMainID.'_price',
		'DSC_PERC' => $strMainID.'_dsc_perc',
		'SECOND_DSC_PERC' => $strMainID.'_second_dsc_perc',
		'PROP_DIV' => $strMainID.'_sku_tree',
		'PROP' => $strMainID.'_prop_',
		'DISPLAY_PROP_DIV' => $strMainID.'_sku_prop',
		'BASKET_PROP_DIV' => $strMainID.'_basket_prop',
	);

	$strObName = 'ob'.preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);

	$productTitle = (
		isset($arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])&& $arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'] != ''
		? $arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
		: $arItem['NAME']
	);
	$imgTitle = (
		isset($arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE']) && $arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE'] != ''
		? $arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE']
		: $arItem['NAME']
	);


	$minPrice = false;
	if (isset($arItem['MIN_PRICE']) || isset($arItem['RATIO_PRICE']))
		$minPrice = (isset($arItem['RATIO_PRICE']) ? $arItem['RATIO_PRICE'] : $arItem['MIN_PRICE']);

	?>

	<div class="<? echo ($arItem['SECOND_PICT'] ? 'bx_catalog_item double' : 'bx_catalog_item'); ?>">

	<div class="bx_catalog_item_container" id="<? echo $strMainID; ?>">
	<?
		$pict = $arItem['PREVIEW_PICTURE']['SRC'] ? $arItem['PREVIEW_PICTURE']['SRC'] : $arItem['DETAIL_PICTURE']['SRC'];
	?>
		<a id="<? echo $arItemIDs['PICT']; ?>" href="<? echo $arItem['DETAIL_PAGE_URL']; ?>" class="bx_catalog_item_images" style="background-image: url('<?=$pict?>')" title="<? echo $imgTitle; ?>"><?
	if ('Y' == $arParams['SHOW_DISCOUNT_PERCENT'])
	{
	?>
			<div id="<? echo $arItemIDs['DSC_PERC']; ?>" class="bx_stick_disc right bottom" style="display:<? echo (0 < $minPrice['DISCOUNT_DIFF_PERCENT'] ? '' : 'none'); ?>;">-<? echo $minPrice['DISCOUNT_DIFF_PERCENT']; ?>%</div>
	<?
	}
	// if ($arItem['LABEL'])
	// {
	?>
			<? // ---------------------   Шильдики?>
			<div id="<? echo $arItemIDs['STICKER_ID']; ?>" class="bx_stick average left top" title="<? echo $arItem['LABEL_VALUE']; ?>">


	<div class="shildiki">
		<?if($arItem["PROPERTIES"]["PR_NEW"]["VALUE"] == "Y" && $arParams['FILTER_NAME'] !== 'arrFilter_new'):?>
			<div class="sh_new"></div>
		<?endif?>

		<?if($arItem["PROPERTIES"]["PR_HIT"]["VALUE"] == "Y" && $arParams['FILTER_NAME'] !== 'arrFilter_hit'):?>
			<div class="sh_hit"></div>
		<?endif?>

		<?if($arItem["PROPERTIES"]["PR_RECOM"]["VALUE"] == "Y" && $arParams['FILTER_NAME'] !== 'arrFilter_recom'):?>
			<div class="sh_recom"></div>
		<?endif?>

		<?if($arItem["PROPERTIES"]["PR_RASPROD"]["VALUE"] == "Y" && $arParams['FILTER_NAME'] !== 'arrFilter_rasprod'):?>
			<div class="sh_raspr"></div>
		<?endif?>		
	</div>			
			</div>
			<? // ---------------------   .Шильдики?>
	<?
	// }
	?>
		</a><?
	if ($arItem['SECOND_PICT'])
	{
		?><a id="<? echo $arItemIDs['SECOND_PICT']; ?>" href="<? echo $arItem['DETAIL_PAGE_URL']; ?>" class="bx_catalog_item_images_double" style="background-image: url('<? echo (
				!empty($arItem['PREVIEW_PICTURE_SECOND'])
				? $arItem['PREVIEW_PICTURE_SECOND']['SRC']
				: $arItem['PREVIEW_PICTURE']['SRC']
			); ?>');" title="<? echo $imgTitle; ?>"><?
		if ('Y' == $arParams['SHOW_DISCOUNT_PERCENT'])
		{
		?>
			<div id="<? echo $arItemIDs['SECOND_DSC_PERC']; ?>" class="bx_stick_disc right bottom" style="display:<? echo (0 < $minPrice['DISCOUNT_DIFF_PERCENT'] ? '' : 'none'); ?>;">-<? echo $minPrice['DISCOUNT_DIFF_PERCENT']; ?>%</div>
		<?
		}
		?>
			<? // ---------------------   Шильдики?>
			<div id="<? echo $arItemIDs['SECOND_STICKER_ID']; ?>" class="bx_stick left top" title="<? echo $arItem['LABEL_VALUE']; ?>">

<!-- 			<div class="sh_new"></div>
			<div class="sh_recom"></div>
			<div class="sh_hit"></div>
			<div class="sh_raspr"></div> -->
			</div>
			<? // ---------------------   .Шильдики?>
		</a><?
	}
	?>



	<div class="bx_catalog_item_title"><a href="<? echo $arItem['DETAIL_PAGE_URL']; ?>" title="<? echo $productTitle; ?>">
	<? echo $arItem['NAME']; ?>
	
	</a>

<?

		if ('Y' == $arParams['PRODUCT_DISPLAY_MODE'])
		{
			if (!empty($arItem['OFFERS_PROP']))
			{
				$arSkuProps = array();
				?>
				<div class="bx_catalog_item_scu" id="<? echo $arItemIDs['PROP_DIV']; ?>"><?
				foreach ($skuTemplate as $propId => $propTemplate)
				{
					if (!isset($arItem['SKU_TREE_VALUES'][$propId]))
						continue;
					$valueCount = count($arItem['SKU_TREE_VALUES'][$propId]);
					if ($valueCount > 5)
					{
						$fullWidth = ($valueCount*20).'%';
						$itemWidth = (100/$valueCount).'%';
						$rowTemplate = $propTemplate['SCROLL'];
					}
					else
					{
						$fullWidth = '100%';
						$itemWidth = '20%';
						$rowTemplate = $propTemplate['FULL'];
					}
					unset($valueCount);
					echo '<div>', str_replace(array('#ITEM#_prop_', '#WIDTH#'), array($arItemIDs['PROP'], $fullWidth), $rowTemplate['START']);
					foreach ($propTemplate['ITEMS'] as $value => $valueItem)
					{
						if (!isset($arItem['SKU_TREE_VALUES'][$propId][$value]))
							continue;
						echo str_replace(array('#ITEM#_prop_', '#WIDTH#'), array($arItemIDs['PROP'], $itemWidth), $valueItem);
					}
					unset($value, $valueItem);
					echo str_replace('#ITEM#_prop_', $arItemIDs['PROP'], $rowTemplate['FINISH']), '</div>';
				}
				unset($propId, $propTemplate);
				foreach ($arResult['SKU_PROPS'] as $arOneProp)
				{
					if (!isset($arItem['OFFERS_PROP'][$arOneProp['CODE']]))
						continue;
					$arSkuProps[] = array(
						'ID' => $arOneProp['ID'],
						'SHOW_MODE' => $arOneProp['SHOW_MODE'],
						'VALUES_COUNT' => $arOneProp['VALUES_COUNT']
					);
				}
				foreach ($arItem['JS_OFFERS'] as &$arOneJs)
				{
					if (0 < $arOneJs['PRICE']['DISCOUNT_DIFF_PERCENT'])
					{
						$arOneJs['PRICE']['DISCOUNT_DIFF_PERCENT'] = '-'.$arOneJs['PRICE']['DISCOUNT_DIFF_PERCENT'].'%';
						$arOneJs['BASIS_PRICE']['DISCOUNT_DIFF_PERCENT'] = '-'.$arOneJs['BASIS_PRICE']['DISCOUNT_DIFF_PERCENT'].'%';
					}
				}
				unset($arOneJs);
				?></div><?
				if ($arItem['OFFERS_PROPS_DISPLAY'])
				{
					foreach ($arItem['JS_OFFERS'] as $keyOffer => $arJSOffer)
					{
						$strProps = '';
						if (!empty($arJSOffer['DISPLAY_PROPERTIES']))
						{
							foreach ($arJSOffer['DISPLAY_PROPERTIES'] as $arOneProp)
							{
								$strProps .= ''.$arOneProp['NAME'].' <strong>'.(
									is_array($arOneProp['VALUE'])
									? implode(' / ', $arOneProp['VALUE'])
									: $arOneProp['VALUE']
								).'</strong>';
							}
						}
						$arItem['JS_OFFERS'][$keyOffer]['DISPLAY_PROPERTIES'] = $strProps;
					}
				}
				$arJSParams = array(
					'PRODUCT_TYPE' => $arItem['CATALOG_TYPE'],
					'SHOW_QUANTITY' => ($arParams['USE_PRODUCT_QUANTITY'] == 'Y'),
					'SHOW_ADD_BASKET_BTN' => false,
					'SHOW_BUY_BTN' => true,
					'SHOW_ABSENT' => true,
					'SHOW_SKU_PROPS' => $arItem['OFFERS_PROPS_DISPLAY'],
					'SECOND_PICT' => $arItem['SECOND_PICT'],
					'SHOW_OLD_PRICE' => ('Y' == $arParams['SHOW_OLD_PRICE']),
					'SHOW_DISCOUNT_PERCENT' => ('Y' == $arParams['SHOW_DISCOUNT_PERCENT']),
					'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
					'SHOW_CLOSE_POPUP' => ($arParams['SHOW_CLOSE_POPUP'] == 'Y'),
					'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
					'DEFAULT_PICTURE' => array(
						'PICTURE' => $arItem['PRODUCT_PREVIEW'],
						'PICTURE_SECOND' => $arItem['PRODUCT_PREVIEW_SECOND']
					),
					'VISUAL' => array(
						'ID' => $arItemIDs['ID'],
						'PICT_ID' => $arItemIDs['PICT'],
						'SECOND_PICT_ID' => $arItemIDs['SECOND_PICT'],
						'QUANTITY_ID' => $arItemIDs['QUANTITY'],
						'QUANTITY_UP_ID' => $arItemIDs['QUANTITY_UP'],
						'QUANTITY_DOWN_ID' => $arItemIDs['QUANTITY_DOWN'],
						'QUANTITY_MEASURE' => $arItemIDs['QUANTITY_MEASURE'],
						'PRICE_ID' => $arItemIDs['PRICE'],
						'TREE_ID' => $arItemIDs['PROP_DIV'],
						'TREE_ITEM_ID' => $arItemIDs['PROP'],
						'BUY_ID' => $arItemIDs['BUY_LINK'],
						'ADD_BASKET_ID' => $arItemIDs['ADD_BASKET_ID'],
						'DSC_PERC' => $arItemIDs['DSC_PERC'],
						'SECOND_DSC_PERC' => $arItemIDs['SECOND_DSC_PERC'],
						'DISPLAY_PROP_DIV' => $arItemIDs['DISPLAY_PROP_DIV'],
						'BASKET_ACTIONS_ID' => $arItemIDs['BASKET_ACTIONS'],
						'NOT_AVAILABLE_MESS' => $arItemIDs['NOT_AVAILABLE_MESS'],
						'COMPARE_LINK_ID' => $arItemIDs['COMPARE_LINK'],
						'SUBSCRIBE_ID' => $arItemIDs['SUBSCRIBE_LINK'],
					),
					'BASKET' => array(
						'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
						'PROPS' => $arParams['PRODUCT_PROPS_VARIABLE'],
						'SKU_PROPS' => $arItem['OFFERS_PROP_CODES'],
						'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
						'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
					),
					'PRODUCT' => array(
						'ID' => $arItem['ID'],
						'NAME' => $productTitle
					),
					'OFFERS' => $arItem['JS_OFFERS'],
					'OFFER_SELECTED' => $arItem['OFFERS_SELECTED'],
					'TREE_PROPS' => $arSkuProps,
					'LAST_ELEMENT' => $arItem['LAST_ELEMENT']
				);
				if ($arParams['DISPLAY_COMPARE'])
				{
					$arJSParams['COMPARE'] = array(
						'COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
						'COMPARE_PATH' => $arParams['COMPARE_PATH']
					);
				}
				?>
<script type="text/javascript">
var <? echo $strObName; ?> = new JCCatalogSection(<? echo CUtil::PhpToJSObject($arJSParams, false, true); ?>);
</script>
				<?
			}
		}
		else
		{
			$arJSParams = array(
				'PRODUCT_TYPE' => $arItem['CATALOG_TYPE'],
				'SHOW_QUANTITY' => false,
				'SHOW_ADD_BASKET_BTN' => false,
				'SHOW_BUY_BTN' => false,
				'SHOW_ABSENT' => false,
				'SHOW_SKU_PROPS' => false,
				'SECOND_PICT' => $arItem['SECOND_PICT'],
				'SHOW_OLD_PRICE' => ('Y' == $arParams['SHOW_OLD_PRICE']),
				'SHOW_DISCOUNT_PERCENT' => ('Y' == $arParams['SHOW_DISCOUNT_PERCENT']),
				'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
				'SHOW_CLOSE_POPUP' => ($arParams['SHOW_CLOSE_POPUP'] == 'Y'),
				'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
				'DEFAULT_PICTURE' => array(
					'PICTURE' => $arItem['PRODUCT_PREVIEW'],
					'PICTURE_SECOND' => $arItem['PRODUCT_PREVIEW_SECOND']
				),
				'VISUAL' => array(
					'ID' => $arItemIDs['ID'],
					'PICT_ID' => $arItemIDs['PICT'],
					'SECOND_PICT_ID' => $arItemIDs['SECOND_PICT'],
					'QUANTITY_ID' => $arItemIDs['QUANTITY'],
					'QUANTITY_UP_ID' => $arItemIDs['QUANTITY_UP'],
					'QUANTITY_DOWN_ID' => $arItemIDs['QUANTITY_DOWN'],
					'QUANTITY_MEASURE' => $arItemIDs['QUANTITY_MEASURE'],
					'PRICE_ID' => $arItemIDs['PRICE'],
					'TREE_ID' => $arItemIDs['PROP_DIV'],
					'TREE_ITEM_ID' => $arItemIDs['PROP'],
					'BUY_ID' => $arItemIDs['BUY_LINK'],
					'ADD_BASKET_ID' => $arItemIDs['ADD_BASKET_ID'],
					'DSC_PERC' => $arItemIDs['DSC_PERC'],
					'SECOND_DSC_PERC' => $arItemIDs['SECOND_DSC_PERC'],
					'DISPLAY_PROP_DIV' => $arItemIDs['DISPLAY_PROP_DIV'],
					'BASKET_ACTIONS_ID' => $arItemIDs['BASKET_ACTIONS'],
					'NOT_AVAILABLE_MESS' => $arItemIDs['NOT_AVAILABLE_MESS'],
					'COMPARE_LINK_ID' => $arItemIDs['COMPARE_LINK'],
					'SUBSCRIBE_ID' => $arItemIDs['SUBSCRIBE_LINK'],
				),
				'BASKET' => array(
					'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
					'PROPS' => $arParams['PRODUCT_PROPS_VARIABLE'],
					'SKU_PROPS' => $arItem['OFFERS_PROP_CODES'],
					'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
					'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
				),
				'PRODUCT' => array(
					'ID' => $arItem['ID'],
					'NAME' => $productTitle
				),
				'OFFERS' => array(),
				'OFFER_SELECTED' => 0,
				'TREE_PROPS' => array(),
				'LAST_ELEMENT' => $arItem['LAST_ELEMENT']
			);
			if ($arParams['DISPLAY_COMPARE'])
			{
				$arJSParams['COMPARE'] = array(
					'COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
					'COMPARE_PATH' => $arParams['COMPARE_PATH']
				);
			}
?>
<script type="text/javascript">
var <? echo $strObName; ?> = new JCCatalogSection(<? echo CUtil::PhpToJSObject($arJSParams, false, true); ?>);
</script>
<?
		}
?>



	</div>

<? // ----------------------------------------------  Цена 

			//	Сумма остатков по предложениям b признак 

if ($arItem['OFFERS']) {
	# code...

			$s_all = 0;
			foreach ($arItem['OFFERS'] as $ar_ost)
			{

				$s_all = $s_all + $ar_ost['CATALOG_QUANTITY'];
				$sklad_no_pokupka = $arItem['OFFERS'][0]['CATALOG_CAN_BUY_ZERO'] == "Y"  ? 'Y' : 'N';
			}
} else {

				$s_all = $arItem['CATALOG_QUANTITY'];
				$sklad_no_pokupka = $arItem['CATALOG_CAN_BUY_ZERO'] == "Y"  ? 'Y' : 'N';
}


	$pod_zakaz = $s_all == 0 && $sklad_no_pokupka == 'N' ? 'Y' : '';
?>

<div class="cena_nalichie">
				<table width="100%">
					<tr>
						<td>
<div class='cena'>	
		<div id="summa_<?=$arItem['ID'];?>"><div id="<? echo $arItemIDs['PRICE']; ?>" class="bx_price">
		<?
		if (!empty($minPrice))
		{
			if ('N' == $arParams['PRODUCT_DISPLAY_MODE'] && isset($arItem['OFFERS']) && !empty($arItem['OFFERS']))
			{
				echo GetMessage(
					'CT_BCS_TPL_MESS_PRICE_SIMPLE_MODE',
					array(
						'#PRICE#' => $minPrice['PRINT_DISCOUNT_VALUE'],
						'#MEASURE#' => GetMessage(
							'CT_BCS_TPL_MESS_MEASURE_SIMPLE_MODE',
							array(
								'#VALUE#' => $minPrice['CATALOG_MEASURE_RATIO'],
								'#UNIT#' => $minPrice['CATALOG_MEASURE_NAME']
							)
						)
					)
				);
			}
			else
			{
			?>
<?=$minPrice['PRINT_DISCOUNT_VALUE'];?>
			<?}
			if ('Y' == $arParams['SHOW_OLD_PRICE'] && $minPrice['DISCOUNT_VALUE'] < $minPrice['VALUE'])
			{
				?> <span><? echo $minPrice['PRINT_VALUE']; ?></span><?
			}
		}
		unset($minPrice);
		?></div></div>
	</div>

</td>
	<td align="right" valign="top" style="padding-top: 22px;">

	<?// ------------------------------------------ Наличие?>

	<? if( $s_all == 0):?>
	<span class="nalichie_n"><i class="demo-icon icon-hourglass-o"></i> <?=getmessage('nal_n')?></span>
	<?else:?>
	<span class="nalichie_y"><i class="demo-icon icon-check"></i> <?=getmessage('nal_y')?></span>
	<?endif?>
	</td>
					</tr>
				</table>

</div>

<div class="row nomargin"></div>

	<?
	if($arItem['CATALOG_SUBSCRIBE'] == 'Y')
		$showSubscribeBtn = true;
	else
		$showSubscribeBtn = false;
	$compareBtnMessage = ($arParams['MESS_BTN_COMPARE'] != '' ? $arParams['MESS_BTN_COMPARE'] : GetMessage('CT_BCS_TPL_MESS_BTN_COMPARE'));
	if (!isset($arItem['OFFERS']) || empty($arItem['OFFERS']))
	{
		?>

		<div class="kol_cena_fav">
			
			<div>
			<a class="btn btn-danger" 
			href="#" data-toggle="modal" 
			data-target="#callback_zakaz_<?=$arItem['ID']?>" 
			rel="nofollow" 
			style="width: 100%; <?if(!$pod_zakaz):?>display: none;<?endif?>">
										<i class="fa fa-clock-o"></i> <?=GetMessage('CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE')?>
										</a>
			<?

				form_zakaz($arItem['ID'],$arItem['NAME'], $cena_form, $arItem['DETAIL_PICTURE']['SRC'], GetMessage('CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE'));

			?>
		
		<div class="bx_catalog_item_controls_blockone" style=" display: inline-block; float: left; width: 50%; padding-right: 5px; <?if($pod_zakaz):?>display: none;<?endif?>">

		<table width="100%" style=" border-collapse: separate; border-spacing: 0;" cellspacing=0>
			<tr>
				<td width="25%" class="td_minus">
				<a id="<? echo $arItemIDs['QUANTITY_DOWN']; ?>" href="javascript:void(0)" class="bx_bt_button_type_2 bx_small" rel="nofollow">-</a>
				</td>
				<td width="50%"  style="border: 1px #ddd solid; ">
				<input type="text" class="bx_col_input" id="<? echo $arItemIDs['QUANTITY']; ?>" name="<? echo $arParams["PRODUCT_QUANTITY_VARIABLE"]; ?>" value="<? echo $arItem['CATALOG_MEASURE_RATIO']; ?>" 
				style=" width: 100%">
				</td>
				<td width="25%"  class="td_plus">
				<a id="<? echo $arItemIDs['QUANTITY_UP']; ?>" href="javascript:void(0)" class="bx_bt_button_type_2 bx_small" rel="nofollow">+</a></td>
			</tr>
		</table>
			
			
			
			<!-- <span id="<? echo $arItemIDs['QUANTITY_MEASURE']; ?>"></span> -->
		</div>


				

			<div class="tt cart" el="<?=$arItem['ID']?>" style="<?if($pod_zakaz):?>display: none;<?endif?>">
				<div id="<? echo $arItemIDs['BASKET_ACTIONS']; ?>" class="bx_catalog_item_controls_blocktwo">
					<a id="<? echo $arItemIDs['BUY_LINK']; ?>" class="btn btn-danger  btn-sm car tt" href="javascript:void(0)"
						<?if(!$arParams['USE_PRODUCT_QUANTITY']):?>style=" margin-left: 0 -5px 0 -10px;"<?endif?>	
						rel="nofollow"><?
						if ($arParams['ADD_TO_BASKET_ACTION'] == 'BUY')
						{
							echo ('' != $arParams['MESS_BTN_BUY'] ? $arParams['MESS_BTN_BUY'] : GetMessage('CT_BCS_TPL_MESS_BTN_BUY'));
						}
						else
						{
							echo ('' != $arParams['MESS_BTN_ADD_TO_BASKET'] ? $arParams['MESS_BTN_ADD_TO_BASKET'] : GetMessage('CT_BCS_TPL_MESS_BTN_ADD_TO_BASKET'));
						}
						?>  <i class="demo-icon icon-basket-1"></i></a>
					</div>
				</div>

<div class="plitki_more" id="show_kompz_fav">

<?

// ----------------------------------------- Добавление в сравнение

$iblockid = $arItem['IBLOCK_ID'];
$id=$arItem['ID'];
if(isset($_SESSION["CATALOG_COMPARE_LIST"][$iblockid]["ITEMS"][$id]))
{
$checked='checked';
$active = "active";
}
else
{
$checked='';
$active = "";
}
?>

<div class="btn-group" data-toggle="buttons" style="width: 100%" >

  <label class="btn <?=$active?>">
    <input style="display: none; padding: 0; margin: 0;" <?=$checked;?> type="checkbox" autocomplete="off" id="compareid_<?=$arItem['ID'];?>" onchange="compare_tov(<?=$arItem['ID'];?>,<?=$arItem['IBLOCK_ID']?>);"> <i class="demo-icon icon-balance-scale"></i> <? echo $compareBtnMessage; ?>
  </label>

<?

// ----------------------------------------- Добавление в избранное
// $frame = $this->createFrame()->begin("");
// echo $iblockid;
// echo "<pre>";
// print_r ($_SESSION["CATALOG_FAV_LIST"][$iblockid]["ITEMS"]);
// 	echo "</pre>";

$iblockid = $arItem['IBLOCK_ID'];
$id=$arItem['ID'];
if(isset($_SESSION["CATALOG_FAV_LIST"][$iblockid]["ITEMS"][$id]))
{
$checked='checked';
$active = "active";
}
else
{
$checked='';
$active = "";
}
// $frame->end();
?>
<?//$frame = $this->createFrame()->begin("");?>
  <label class="btn <?=$active?>">
    <input style="display: none;" checked type="checkbox" autocomplete="off" id="favid_<?=$arItem['ID'];?>" onchange="fav_tov(<?=$arItem['ID'];?>,<?=$arItem['IBLOCK_ID']?>);"><i class="demo-icon icon-heart"></i> <?=GetMessage('ADD_FAV')?>
  </label>
  <?//$frame->end();?>
	</div> 
</div>

			</div>


		</div>



		<?
		if (isset($arItem['DISPLAY_PROPERTIES']) && !empty($arItem['DISPLAY_PROPERTIES']))
		{
?>
			<div class="bx_catalog_item_articul">
<?
			// foreach ($arItem['DISPLAY_PROPERTIES'] as $arOneProp)
			// {
			// 	?><strong><? echo $arOneProp['NAME']; ?></strong> <?
			// 		echo (
			// 			is_array($arOneProp['DISPLAY_VALUE'])
			// 			? implode('', $arOneProp['DISPLAY_VALUE'])
			// 			: $arOneProp['DISPLAY_VALUE']
			// 		);
			// }
?>
			</div>
<?
		}
		$emptyProductProperties = empty($arItem['PRODUCT_PROPERTIES']);
		if ('Y' == $arParams['ADD_PROPERTIES_TO_BASKET'] && !$emptyProductProperties)
		{
?>
		<div id="<? echo $arItemIDs['BASKET_PROP_DIV']; ?>" style="/*display: none;*/">
<?
			if (!empty($arItem['PRODUCT_PROPERTIES_FILL']))
			{
				foreach ($arItem['PRODUCT_PROPERTIES_FILL'] as $propID => $propInfo)
				{
?>
					<input type="hidden" name="<? echo $arParams['PRODUCT_PROPS_VARIABLE']; ?>[<? echo $propID; ?>]" value="<? echo htmlspecialcharsbx($propInfo['ID']); ?>">
<?
					if (isset($arItem['PRODUCT_PROPERTIES'][$propID]))
						unset($arItem['PRODUCT_PROPERTIES'][$propID]);
				}
			}
			$emptyProductProperties = empty($arItem['PRODUCT_PROPERTIES']);
			if (!$emptyProductProperties)
			{
?>
				<table>
<?
					foreach ($arItem['PRODUCT_PROPERTIES'] as $propID => $propInfo)
					{
?>
						<tr><td><? echo $arItem['PROPERTIES'][$propID]['NAME']; ?></td>
							<td>
<?
								if(
									'L' == $arItem['PROPERTIES'][$propID]['PROPERTY_TYPE']
									&& 'C' == $arItem['PROPERTIES'][$propID]['LIST_TYPE']
								)
								{
									foreach($propInfo['VALUES'] as $valueID => $value)
									{
										?><label><input type="radio" name="<? echo $arParams['PRODUCT_PROPS_VARIABLE']; ?>[<? echo $propID; ?>]" value="<? echo $valueID; ?>" <? echo ($valueID == $propInfo['SELECTED'] ? '"checked"' : ''); ?>><? echo $value; ?></label><br><?
									}
								}
								else
								{
									?><select name="<? echo $arParams['PRODUCT_PROPS_VARIABLE']; ?>[<? echo $propID; ?>]"><?
									foreach($propInfo['VALUES'] as $valueID => $value)
									{
										?><option value="<? echo $valueID; ?>" <? echo ($valueID == $propInfo['SELECTED'] ? 'selected' : ''); ?>><? echo $value; ?></option><?
									}
									?></select><?
								}
?>
							</td></tr>
<?
					}
?>
				</table>
<?
			}
?>
		</div>
<?
		}
		$arJSParams = array(
			'PRODUCT_TYPE' => $arItem['CATALOG_TYPE'],
			'SHOW_QUANTITY' => ($arParams['USE_PRODUCT_QUANTITY'] == 'Y'),
			'SHOW_ADD_BASKET_BTN' => false,
			'SHOW_BUY_BTN' => true,
			'SHOW_ABSENT' => true,
			'SHOW_OLD_PRICE' => ('Y' == $arParams['SHOW_OLD_PRICE']),
			'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
			'SHOW_CLOSE_POPUP' => ($arParams['SHOW_CLOSE_POPUP'] == 'Y'),
			'SHOW_DISCOUNT_PERCENT' => ('Y' == $arParams['SHOW_DISCOUNT_PERCENT']),
			'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
			'PRODUCT' => array(
				'ID' => $arItem['ID'],
				'NAME' => $productTitle,
				'PICT' => ('Y' == $arItem['SECOND_PICT'] ? $arItem['PREVIEW_PICTURE_SECOND'] : $arItem['PREVIEW_PICTURE']),
				'CAN_BUY' => $arItem["CAN_BUY"],
				'SUBSCRIPTION' => ('Y' == $arItem['CATALOG_SUBSCRIPTION']),
				'CHECK_QUANTITY' => $arItem['CHECK_QUANTITY'],
				'MAX_QUANTITY' => $arItem['CATALOG_QUANTITY'],
				'STEP_QUANTITY' => $arItem['CATALOG_MEASURE_RATIO'],
				'QUANTITY_FLOAT' => is_double($arItem['CATALOG_MEASURE_RATIO']),
				'SUBSCRIBE_URL' => $arItem['~SUBSCRIBE_URL'],
				'BASIS_PRICE' => $arItem['MIN_BASIS_PRICE']
			),
			'BASKET' => array(
				'ADD_PROPS' => ('Y' == $arParams['ADD_PROPERTIES_TO_BASKET']),
				'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
				'PROPS' => $arParams['PRODUCT_PROPS_VARIABLE'],
				'EMPTY_PROPS' => $emptyProductProperties,
				'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
				'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
			),
			'VISUAL' => array(
				'ID' => $arItemIDs['ID'],
				'PICT_ID' => ('Y' == $arItem['SECOND_PICT'] ? $arItemIDs['SECOND_PICT'] : $arItemIDs['PICT']),
				'QUANTITY_ID' => $arItemIDs['QUANTITY'],
				'QUANTITY_UP_ID' => $arItemIDs['QUANTITY_UP'],
				'QUANTITY_DOWN_ID' => $arItemIDs['QUANTITY_DOWN'],
				'PRICE_ID' => $arItemIDs['PRICE'],
				'BUY_ID' => $arItemIDs['BUY_LINK'],
				'BASKET_PROP_DIV' => $arItemIDs['BASKET_PROP_DIV'],
				'BASKET_ACTIONS_ID' => $arItemIDs['BASKET_ACTIONS'],
				'NOT_AVAILABLE_MESS' => $arItemIDs['NOT_AVAILABLE_MESS'],
				'COMPARE_LINK_ID' => $arItemIDs['COMPARE_LINK'],
				'SUBSCRIBE_ID' => $arItemIDs['SUBSCRIBE_LINK'],
			),
			'LAST_ELEMENT' => $arItem['LAST_ELEMENT']
		);
		if ($arParams['DISPLAY_COMPARE'])
		{
			$arJSParams['COMPARE'] = array(
				'COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
				'COMPARE_PATH' => $arParams['COMPARE_PATH']
			);
		}
		unset($emptyProductProperties);
?><script type="text/javascript">
var <? echo $strObName; ?> = new JCCatalogSection(<? echo CUtil::PhpToJSObject($arJSParams, false, true); ?>);
</script><?
	}
	else
	{
		if ('Y' == $arParams['PRODUCT_DISPLAY_MODE'])
		{
			$canBuy = $arItem['JS_OFFERS'][$arItem['OFFERS_SELECTED']]['CAN_BUY'];
			?>

<div class="kol_cena_fav">
		<? // ---------------------------------- Количество?>

		<div>
			<a class="btn btn-danger" 
			href="#" data-toggle="modal" 
			data-target="#callback_zakaz_<?=$arItem['ID']?>" 
			rel="nofollow" 
			style="width: 100%; <?if(!$pod_zakaz):?>display: none;<?endif?>">
										<i class="fa fa-clock-o"></i> <?=GetMessage('CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE')?>
										</a>
			<?

				form_zakaz($arItem['ID'],$arItem['NAME'], $cena_form, $arItem['DETAIL_PICTURE']['SRC'], GetMessage('CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE'));

			?>		
		<div class="bx_catalog_item_controls_blockone" style=" display: inline-block; float: left; width: 50%; padding-right: 5px;<?if($pod_zakaz):?>display: none;<?endif?>">

		<table width="100%" style=" border-collapse: separate;
    border-spacing: 0;" cellspacing=0>
			<tr>
				<td width="25%" class="td_minus">
				<a id="<? echo $arItemIDs['QUANTITY_DOWN']; ?>" href="javascript:void(0)" class="bx_bt_button_type_2 bx_small" rel="nofollow">-</a>
				</td>
				<td width="50%"  style="border: 1px #ddd solid; ">
				<input type="text" class="bx_col_input" id="<? echo $arItemIDs['QUANTITY']; ?>" name="<? echo $arParams["PRODUCT_QUANTITY_VARIABLE"]; ?>" value="<? echo $arItem['CATALOG_MEASURE_RATIO']; ?>" 
				style=" width: 100%">
				</td>
				<td width="25%"  class="td_plus">
				<a id="<? echo $arItemIDs['QUANTITY_UP']; ?>" href="javascript:void(0)" class="bx_bt_button_type_2 bx_small" rel="nofollow">+</a></td>
			</tr>
		</table>
			
			
			
			<!-- <span id="<? echo $arItemIDs['QUANTITY_MEASURE']; ?>"></span> -->
		</div>

			<?

			// -------------------------  Подписка на товар

			if($showSubscribeBtn):
				$APPLICATION->includeComponent('bitrix:catalog.product.subscribe','',
					array(
						'PRODUCT_ID' => $arItem['ID'],
						'BUTTON_ID' => $arItemIDs['SUBSCRIBE_LINK'],
						'BUTTON_CLASS' => 'bx_bt_button bx_medium',
						'DEFAULT_DISPLAY' => !$canBuy,
					),
					$component, array('HIDE_ICONS' => 'Y')
				);
			endif;
			?>
		
<?//=$arParams['USE_PRODUCT_QUANTITY']?>

<div class="tt cart" el="<?=$arItem['ID']?>" style="<?if($pod_zakaz):?>display: none;<?endif?>">
	<div id="<? echo $arItemIDs['BASKET_ACTIONS']; ?>" class="bx_catalog_item_controls_blocktwo" style="display: <? echo ($canBuy ? '' : 'none'); ?>;">
		<a id="<? echo $arItemIDs['BUY_LINK']; ?>" class="btn btn-danger  btn-sm car tt" href="javascript:void(0)"
		<?if(!$arParams['USE_PRODUCT_QUANTITY']):?>style=" margin-left: 0 -5px 0 -10px;"<?endif?>	
		 rel="nofollow"><?
		if ($arParams['ADD_TO_BASKET_ACTION'] == 'BUY')
		{
			echo ('' != $arParams['MESS_BTN_BUY'] ? $arParams['MESS_BTN_BUY'] : GetMessage('CT_BCS_TPL_MESS_BTN_BUY'));
		}
		else
		{
			echo ('' != $arParams['MESS_BTN_ADD_TO_BASKET'] ? $arParams['MESS_BTN_ADD_TO_BASKET'] : GetMessage('CT_BCS_TPL_MESS_BTN_ADD_TO_BASKET'));
		}
		?>  <i class="demo-icon icon-basket-1"></i></a>
	</div>
</div>


			<div style="clear: both;"></div>
			</div>

		<? // ---------------------------------- .Количество и кнопка?>
	
		<?
	// if ($arParams['DISPLAY_COMPARE'])
	// {
	?>
<!-- <div class="bx_catalog_item_controls_blocktwo">
	<a id="<? echo $arItemIDs['COMPARE_LINK']; ?>" class="bx_bt_button_type_2 bx_medium" href="javascript:void(0)"><? echo $compareBtnMessage; ?></a>
</div> -->

<!-- <i class="demo-icon icon-balance-scale"></i>
<i class="demo-icon icon-heart"></i>
 -->

<div class="plitki_more" id="show_kompz_fav">

<?

// ----------------------------------------- Добавление в сравнение

$iblockid = $arItem['IBLOCK_ID'];
$id=$arItem['ID'];
if(isset($_SESSION["CATALOG_COMPARE_LIST"][$iblockid]["ITEMS"][$id]))
{
$checked='checked';
$active = "active";
}
else
{
$checked='';
$active = "";
}
?>

<div class="btn-group" data-toggle="buttons" style="width: 100%" >

  <label class="btn <?=$active?>">
    <input style="display: none; padding: 0; margin: 0;" <?=$checked;?> type="checkbox" autocomplete="off" id="compareid_<?=$arItem['ID'];?>" onchange="compare_tov(<?=$arItem['ID'];?>,<?=$arItem['IBLOCK_ID']?>);"> <i class="demo-icon icon-balance-scale"></i> <? echo $compareBtnMessage; ?>
  </label>

<?

// ----------------------------------------- Добавление в избранное
// $frame = $this->createFrame()->begin("");
// echo $iblockid;
// echo "<pre>";
// print_r ($_SESSION["CATALOG_FAV_LIST"][$iblockid]["ITEMS"]);
// 	echo "</pre>";

$iblockid = $arItem['IBLOCK_ID'];
$id=$arItem['ID'];
if(isset($_SESSION["CATALOG_FAV_LIST"][$iblockid]["ITEMS"][$id]))
{
$checked='checked';
$active = "active";
}
else
{
$checked='';
$active = "";
}
// $frame->end();
?>
<?//$frame = $this->createFrame()->begin("");?>
  <label class="btn <?=$active?>">
    <input style="display: none;" checked type="checkbox" autocomplete="off" id="favid_<?=$arItem['ID'];?>" onchange="fav_tov(<?=$arItem['ID'];?>,<?=$arItem['IBLOCK_ID']?>);"><i class="demo-icon icon-heart"></i> <?=GetMessage('ADD_FAV')?>
  </label>
  <?//$frame->end();?>
	</div> 
</div>


<?
	// }
		?>



			<?
			unset($canBuy);
		}
		else
		{
			?>
		<div class="bx_catalog_item_controls no_touch">
			<a class="bx_bt_button_type_2 bx_medium" href="<? echo $arItem['DETAIL_PAGE_URL']; ?>"><?
			echo ('' != $arParams['MESS_BTN_DETAIL'] ? $arParams['MESS_BTN_DETAIL'] : GetMessage('CT_BCS_TPL_MESS_BTN_DETAIL'));
			?></a>
		</div>
			<?
		}
		?>
		<div class="bx_catalog_item_controls touch">
			<a class="bx_bt_button_type_2 bx_medium" href="<? echo $arItem['DETAIL_PAGE_URL']; ?>"><?
			echo ('' != $arParams['MESS_BTN_DETAIL'] ? $arParams['MESS_BTN_DETAIL'] : GetMessage('CT_BCS_TPL_MESS_BTN_DETAIL'));
			?></a>
		</div>
		<?
		$boolShowOfferProps = ('Y' == $arParams['PRODUCT_DISPLAY_MODE'] && $arItem['OFFERS_PROPS_DISPLAY']);
		$boolShowProductProps = (isset($arItem['DISPLAY_PROPERTIES']) && !empty($arItem['DISPLAY_PROPERTIES']));
		if ($boolShowProductProps || $boolShowOfferProps)
		{
?>
			<div class="bx_catalog_item_articul">
<?
			if (false)
			// if ($boolShowProductProps)
			{
				foreach ($arItem['DISPLAY_PROPERTIES'] as $arOneProp)
				{
				?><strong><? echo $arOneProp['NAME']; ?></strong> <?
					echo (
						is_array($arOneProp['DISPLAY_VALUE'])
						? implode(' / ', $arOneProp['DISPLAY_VALUE'])
						: $arOneProp['DISPLAY_VALUE']
					);
				}
			}
			if ($boolShowOfferProps)
			{
?>
				<span id="<? echo $arItemIDs['DISPLAY_PROP_DIV']; ?>" style="display: none;"></span>
<?
			}
?>
			</div>
<?
		}
?>
</div>

<?

	}
?></div></div>
<div class="row  nomargin"></div>

<?
}
?>
</div>
<div class="row  nomargin"></div>

<script type="text/javascript">
BX.message({
	BTN_MESSAGE_BASKET_REDIRECT: '<? echo GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT'); ?>',
	BASKET_URL: '<? echo $arParams["BASKET_URL"]; ?>',
	ADD_TO_BASKET_OK: '<? echo GetMessageJS('ADD_TO_BASKET_OK'); ?>',
	TITLE_ERROR: '<? echo GetMessageJS('CT_BCS_CATALOG_TITLE_ERROR') ?>',
	TITLE_BASKET_PROPS: '<? echo GetMessageJS('CT_BCS_CATALOG_TITLE_BASKET_PROPS') ?>',
	TITLE_SUCCESSFUL: '<? echo GetMessageJS('ADD_TO_BASKET_OK'); ?>',
	BASKET_UNKNOWN_ERROR: '<? echo GetMessageJS('CT_BCS_CATALOG_BASKET_UNKNOWN_ERROR') ?>',
	BTN_MESSAGE_SEND_PROPS: '<? echo GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_SEND_PROPS'); ?>',
	BTN_MESSAGE_CLOSE: '<? echo GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE') ?>',
	BTN_MESSAGE_CLOSE_POPUP: '<? echo GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE_POPUP'); ?>',
	COMPARE_MESSAGE_OK: '<? echo GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_OK') ?>',
	COMPARE_UNKNOWN_ERROR: '<? echo GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_UNKNOWN_ERROR') ?>',
	COMPARE_TITLE: '<? echo GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_TITLE') ?>',
	BTN_MESSAGE_COMPARE_REDIRECT: '<? echo GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT') ?>',
	SITE_ID: '<? echo SITE_ID; ?>'
});
</script>


<?
	if ($arParams["DISPLAY_BOTTOM_PAGER"])
	{
		?><? echo $arResult["NAV_STRING"]; ?><?
	}
}

?>

<?
	if($arParams['HIDE_SECTION_DESCRIPTION'] !== 'Y' && $arResult["DESCRIPTION"])
	{ ?>
<div class="bx-section-desc <? echo $templateData['TEMPLATE_CLASS']; ?>">
	<p class="bx-section-desc-post"><?=$arResult["DESCRIPTION"]?></p>
</div>
<? } ?>


<!-- Полет суммы в корзину-->
<script type="text/javascript">   
    $(document).ready(function(){

       $(".tt").click(function(){
            id = $(this).attr("el");
        tmp="#summa_"+id;
        $(tmp)
                .clone()
                .css({'position' : 'absolute', 'z-index' : '11100', top: $(this).offset().top-30, left:$(this).offset().left})
                .appendTo("body")
                .animate({opacity: 0.5,
                    left: $(".cart_b").offset()['left'],
                    top: $(".cart_b").offset()['top'],
                    width: 150}, 700, function() {
                    $(this).remove();
                });
     
        })
     
    });
</script>
<!--.Полет суммы в корзину-->