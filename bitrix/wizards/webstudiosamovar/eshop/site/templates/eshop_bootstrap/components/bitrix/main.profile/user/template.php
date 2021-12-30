<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
?>

  <link href="/css/user.css" rel="stylesheet" type="text/css" />

<div class="bx-auth_">

<?ShowError($arResult["strProfileError"]);?>
<?
if ($arResult['DATA_SAVED'] == 'Y')
	ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>
<script type="text/javascript">
<!--
var opened_sections = [<?
$arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"]."_user_profile_open"];
$arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
if (strlen($arResult["opened"]) > 0)
{
	echo "'".implode("', '", explode(",", $arResult["opened"]))."'";
}
else
{
	$arResult["opened"] = "reg";
	echo "'reg'";
}
?>];
//-->

var cookie_prefix = '<?=$arResult["COOKIE_PREFIX"]?>';
</script>

<form class="form-horizontal" method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
<?=$arResult["BX_SESSION_CHECK"]?>
<input type="hidden" name="lang" value="<?=LANG?>" />
<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />

<div class="profile-block-<?=strpos($arResult["opened"], "reg") === false ? "hidden" : "shown"?>" id="user_div_reg">
	<!--
	<?
	if($arResult["ID"]>0)
	{
	?>
		<?
		if (strlen($arResult["arUser"]["TIMESTAMP_X"])>0)
		{
		?>

			<?=GetMessage('LAST_UPDATE')?>
			<?=$arResult["arUser"]["TIMESTAMP_X"]?>

		<?
		}
		?>
		<?
		if (strlen($arResult["arUser"]["LAST_LOGIN"])>0)
		{
		?>

			<?=GetMessage('LAST_LOGIN')?>
			<?=$arResult["arUser"]["LAST_LOGIN"]?>

		<?
		}
		?>
	<?
	}
	?>
	-->
	<div class="form-group">
	<label for="name" class="col-sm-4 control-label"><?=GetMessage('NAME')?></label>
		<div class="col-sm-7">
		<input type="text" class="form-control" name="NAME" value="<?=$arResult["arUser"]["NAME"]?>">
		</div>
	</div>

	<div class="form-group">
	<label for="last_name" class="col-sm-4 control-label"><?=GetMessage('LAST_NAME')?></label>
		<div class="col-sm-7">
		<input type="text" class="form-control" name="LAST_NAME" value="<?=$arResult["arUser"]["LAST_NAME"]?>">
		</div>
	</div>


	<div class="form-group">
	<label for="second_name" class="col-sm-4 control-label"><?=GetMessage('SECOND_NAME')?></label>
		<div class="col-sm-7">
		<input type="text" class="form-control" name="SECOND_NAME" value="<?=$arResult["arUser"]["SECOND_NAME"]?>">
		</div>
	</div>

	<div class="form-group">
	<label for="email" class="col-sm-4 control-label"><?=GetMessage('EMAIL')?><?if($arResult["EMAIL_REQUIRED"]):?><span class="starrequired">*</span><?endif?></label>
		<div class="col-sm-7">
		<input type="text" class="form-control" name="EMAIL" value="<?=$arResult["arUser"]["EMAIL"]?>">
		</div>
	</div>

	<div class="form-group">
	<label for="second_name" class="col-sm-4 control-label"><?=GetMessage('LOGIN')?><span class="starrequired">*</span></label>
		<div class="col-sm-7">
		<input type="text" class="form-control" name="LOGIN" value="<? echo $arResult["arUser"]["LOGIN"]?>">
		</div>
	</div>

		

<?if($arResult["arUser"]["EXTERNAL_AUTH_ID"] == ''):?>

		<!-- <?=GetMessage('NEW_PASSWORD_REQ')?> -->

	<div class="form-group">
	<label for="second_name" class="col-sm-4 control-label"><?=GetMessage('NEW_PASSWORD_REQ')?></label>
		<div class="col-sm-7">
		<input type="password" class="form-control" name="NEW_PASSWORD" value="" autocomplete="off" class="bx-auth-input" />
		</div>
	</div>

<?if($arResult["SECURE_AUTH"]):?>
				<span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
					<div class="bx-auth-secure-icon"></div>
				</span>
				<noscript>
				<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
					<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
				</span>
				</noscript>
<script type="text/javascript">
document.getElementById('bx_auth_secure').style.display = 'inline-block';
</script>


<?endif?>


	<div class="form-group">
	<label for="second_name" class="col-sm-4 control-label"><?=GetMessage('NEW_PASSWORD_CONFIRM')?></label>
		<div class="col-sm-7">
		<input type="password" class="form-control" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" autocomplete="off" />
		</div>
	</div>

		

<?endif?>
<?if($arResult["TIME_ZONE_ENABLED"] == true):?>

		<td colspan="2" class="profile-header"><?echo GetMessage("main_profile_time_zones")?>


		<?echo GetMessage("main_profile_time_zones_auto")?>

			<select name="AUTO_TIME_ZONE" onchange="this.form.TIME_ZONE.disabled=(this.value != 'N')">
				<option value=""><?echo GetMessage("main_profile_time_zones_auto_def")?></option>
				<option value="Y"<?=($arResult["arUser"]["AUTO_TIME_ZONE"] == "Y"? ' SELECTED="SELECTED"' : '')?>><?echo GetMessage("main_profile_time_zones_auto_yes")?></option>
				<option value="N"<?=($arResult["arUser"]["AUTO_TIME_ZONE"] == "N"? ' SELECTED="SELECTED"' : '')?>><?echo GetMessage("main_profile_time_zones_auto_no")?></option>
			</select>

<!--

		<?echo GetMessage("main_profile_time_zones_zones")?>

			<select name="TIME_ZONE"<?if($arResult["arUser"]["AUTO_TIME_ZONE"] <> "N") echo ' disabled="disabled"'?>>
<?foreach($arResult["TIME_ZONE_LIST"] as $tz=>$tz_name):?>
				<option value="<?=htmlspecialcharsbx($tz)?>"<?=($arResult["arUser"]["TIME_ZONE"] == $tz? ' SELECTED="SELECTED"' : '')?>><?=htmlspecialcharsbx($tz_name)?></option>
<?endforeach?>
			</select>

-->
<?endif?>

</div>

<?

///////////////////////////////////////////////////////////////////////////////////////////////

?>

	<?if($arResult["IS_ADMIN"] && false):?>
	<div class="profile-link profile-user-div-link"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('admin')"><?=GetMessage("USER_ADMIN_NOTES")?></a></div>
	<div id="user_div_admin" class="profile-block-<?=strpos($arResult["opened"], "admin") === false ? "hidden" : "shown"?>">
	<table class="data-table profile-table">
		<thead>

				<td colspan="2">&nbsp;

		</thead>
		<tbody>

				<?=GetMessage("USER_ADMIN_NOTES")?>:
				<textarea cols="30" rows="5" name="ADMIN_NOTES"><?=$arResult["arUser"]["ADMIN_NOTES"]?></textarea>

		</tbody>
	</table>
	</div>
	<?endif;?>
	<?// ********************* User properties ***************************************************?>
	<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
	<div class="profile-link profile-user-div-link"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('user_properties')"><?=strlen(trim($arParams["USER_PROPERTY_NAME"])) > 0 ? $arParams["USER_PROPERTY_NAME"] : GetMessage("USER_TYPE_EDIT_TAB")?></a></div>
	<div id="user_div_user_properties" class="profile-block-<?=strpos($arResult["opened"], "user_properties") === false ? "hidden" : "shown"?>">
	<table class="data-table profile-table">
		<thead>

				<td colspan="2">&nbsp;

		</thead>
		<tbody>
		<?$first = true;?>
		<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>
		<td class="field-name">
			<?if ($arUserField["MANDATORY"]=="Y"):?>
				<span class="starrequired">*</span>
			<?endif;?>
			<?=$arUserField["EDIT_FORM_LABEL"]?>:<td class="field-value">
				<?$APPLICATION->IncludeComponent(
					"bitrix:system.field.edit",
					$arUserField["USER_TYPE"]["USER_TYPE_ID"],
					array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField), null, array("HIDE_ICONS"=>"Y"));?>
		<?endforeach;?>
		</tbody>
	</table>
	</div>
	<?endif;?>
	<?// ******************** /User properties ***************************************************?>

	<div class="row">
	<div class="col-sm-7 col-sm-offset-4"><p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p></div>
	</div>

	<div class="row" style="margin-top: 20px">
	<div class="col-sm-7 col-sm-offset-4">
	<input class="btn btn-default" type="submit" name="save" value="<?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>">
	<input class="btn" type="reset" value="<?=GetMessage('MAIN_RESET');?>">
	</div>
	</div>



</form>
<?
if($arResult["SOCSERV_ENABLED"])
{
	// $APPLICATION->IncludeComponent("bitrix:socserv.auth.split", ".default", array(
	// 		"SHOW_PROFILES" => "Y",
	// 		"ALLOW_DELETE" => "Y"
	// 	),
	// 	false
	// );
}
?>
</div>
