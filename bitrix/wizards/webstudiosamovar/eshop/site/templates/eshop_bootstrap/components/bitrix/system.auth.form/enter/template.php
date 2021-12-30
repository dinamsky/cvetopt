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

CJSCore::Init(array("popup"));
?>
<?\Bitrix\Main\Page\Frame::getInstance()->startDynamicWithID("user-block");?>
	<!-- <span class="bx_login_top_inline_icon"></span> -->
	<?
	$frame = $this->createFrame("login-line", false)->begin();
		if ($arResult["FORM_TYPE"] == "login")
		{
		?>

			<table class="table_reg_enter">
				<tr>
					<td style=" vertical-align: middle; width: 1px;"><a href= '<?=SITE_DIR?>login/' ><i class="demo-icon icon-login-1"></i></a></td>
					<td style=" vertical-align: middle;"  class=" hidden-xs hidden-sm"><a href= '<?=SITE_DIR?>login/'><?=GetMessage("AUTH_LOGIN")?></a></td>
					<td style=" vertical-align: middle; width: 1px; padding-left: 10px;"><a href="<?=$arResult["AUTH_REGISTER_URL"]?>"><i class="demo-icon icon-user-o"></i></a></td>
					<td style=" vertical-align: middle;" class=" hidden-xs hidden-sm"><a href="<?=$arResult["AUTH_REGISTER_URL"]?>"><?=GetMessage("AUTH_REGISTER")?></a></td>
				</tr>
			</table>

			<!-- <a href='#' data-toggle="modal" data-target="#enter" class='outh'><i class="fa fa-sign-in"></i> Вход</a>  -->
			
			<?//if($arResult["NEW_USER_REGISTRATION"] == "Y"):?>
			
			<?//endif;
		}
		else
		{
			$name = trim($USER->GetFullName());
			if (strlen($name) <= 0)
				$name = $USER->GetLogin();
		?>
			
			<!--  <?=htmlspecialcharsEx($name);?></a> -->

			<table class="table_reg_enter">
				<tr>
					<td style=" vertical-align: middle; width: 1px;"><i class="demo-icon icon-login-1"></i></td>
					<td style=" vertical-align: middle;" class=" hidden-xs hidden-sm"><a href="<?=$arResult['PROFILE_URL']?>"><?=GetMessage("AUTH_KABINET")?></a></td>
					<td style=" vertical-align: middle; width: 1px; padding-left: 10px;"><i class="demo-icon icon-user-o"></i></td>
					<td style=" vertical-align: middle;" class=" hidden-xs hidden-sm"><a id="exit_user" href="<?=$APPLICATION->GetCurPageParam("logout=yes", Array("logout"))?>"><?=GetMessage("AUTH_LOGOUT")?></a></td>
				</tr>
			</table>

			
			

		<?
		}
	$frame->beginStub();
		?>
		<a class="btn btn-warning  btn-xs" href="javascript:void(0)<?//=$arResult["AUTH_URL"]?>" onclick="openAuthorizePopup()"><?=GetMessage("AUTH_LOGIN")?></a> / 
		<?if($arResult["NEW_USER_REGISTRATION"] == "Y"):?>
			<a class="btn btn-warning  btn-xs" href="<?=$arResult["AUTH_REGISTER_URL"]?>" ><?=GetMessage("AUTH_REGISTER")?></a>
		<?endif;
	$frame->end();
	?>

<?\Bitrix\Main\Page\Frame::getInstance()->finishDynamicWithID("user-block", "");?>

