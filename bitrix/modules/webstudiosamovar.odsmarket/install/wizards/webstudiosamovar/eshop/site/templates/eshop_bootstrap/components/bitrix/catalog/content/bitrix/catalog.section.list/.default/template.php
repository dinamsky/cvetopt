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

$arViewModeList = $arResult['VIEW_MODE_LIST'];

if (0 < $arResult["SECTIONS_COUNT"])
{
?>
<div class="razdel">
<?
			foreach ($arResult['SECTIONS'] as &$arSection)
			{

				switch ($arSection['CODE']) {
					case 'obzory':
					$icon = 'fa fa-info-circle';
					break;
					case 'strelby':
					$icon = 'fa fa-dot-circle-o';
					break;
					case 'mneniya-ekspertov':
					$icon = 'fa fa-exclamation-circle';
					break;

					default:
					$icon = 'fa fa-arrow-circle-right';
					break;
				}				
?>

<div id="<? echo $this->GetEditAreaId($arSection['ID']); ?>" class="razdel_list">
 <a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"><i class="<?=$icon?>"></i> <? echo $arSection['NAME']; ?>
<?
				if ($arParams["COUNT_ELEMENTS"])
				{
					?> <!-- <span class="badge"><? echo $arSection['ELEMENT_CNT']; ?></span> --><?
				}
?>
 </a>


			</div>
<?}?>
</div>

<?} else {?>
<br>
<?}?>
