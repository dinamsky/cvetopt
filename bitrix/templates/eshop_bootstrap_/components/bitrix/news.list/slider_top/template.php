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
// print_r($arResult['ITEMS']);

// echo "</pre>";


?>

<div class="index_slider_top"  style="height: 445px;">
	<!-- Слайдер -->
	<div id="carousel_top" class="carousel slide" data-interval="12000" data-ride="carousel">
		<ol class="carousel-indicators" style=" text-align: right; margin-left: -13%;">
		<?
		$i = 0;
		foreach($arResult["ITEMS"] as $arElement):?>
			<li data-target="#carousel_top" data-slide-to="<?=$i?>" class="<?if($i == 0):?>active<?endif?>"></li>
		<?$i++?>

		<?endforeach?>
		</ol>
						<a class="left carousel-control" href="#carousel_top" role="button" data-slide="prev">
							<i class="demo-icon icon-left-open-big"></i>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#carousel_top" role="button" data-slide="next">
							<i class="demo-icon icon-right-open-big"></i>
							<span class="sr-only">Next</span>
						</a>
		<div class="carousel-inner">
						<?
						$i = 0;	
						foreach($arResult["ITEMS"] as $arElement):?>
						<!-- <div> -->

						<?
						$renderImage = CFile::ResizeImageGet($arElement["PREVIEW_PICTURE"], Array("width" => '1140', "height" => '445'), BX_RESIZE_IMAGE_EXACT, true);
			      // echo '<img alt="'.$arItem["NAME"].'" src="'.$renderImage["src"].' "/>';
						?>
							<div class="item <?if($i == 0):?>active<?endif?>"  style=" background: url(<?=$renderImage["src"]?>) no-repeat center;">

								<?if(!$arElement["PROPERTIES"]["NO_TEXT"]["VALUE"]):?>

								<div style="display: table; width: 100%">
								<div class="text" style="width: 100%">
									<div>

										<h2><?=$arElement["NAME"]?></h2>
										<div>
										<?=$arElement["PREVIEW_TEXT"]?>
										
										<?if($arElement["PROPERTIES"]["SKIDKA"]["VALUE"]):?>
											<div class="slider_top_skidka">
												-<?=$arElement["PROPERTIES"]["SKIDKA"]["VALUE"]?>%
											</div>
										<?endif?>	

										<?if($arElement["PROPERTIES"]["PERIOD"]["VALUE"]):?>
											<div class="slider_top_period">
												<?=$arElement["PROPERTIES"]["PERIOD"]["VALUE"]?>
											</div>
										<?endif?>
										<?if($arElement["PROPERTIES"]["LINK"]["VALUE"]):?>
										<br>
										<a style="z-index: 12000" href="<?=$arElement["PROPERTIES"]["LINK"]["VALUE"]?>"><?=GetMessage('link_slider_top_more')?> <i class="demo-icon icon-angle-right"></i></a>
										<?endif?>
										</div>
									</div>
								</div>
								</div>


								<?endif?>
								
						</div>
						<?
						$i ++;
						endforeach;?>
					</div>
				</div>

				<!-- .Слайдер -->

			</div>



