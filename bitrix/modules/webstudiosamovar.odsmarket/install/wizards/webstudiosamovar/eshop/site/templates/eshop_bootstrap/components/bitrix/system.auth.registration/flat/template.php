<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?$this->setFrameMode( true );?>
<?
ShowMessage($arParams["~AUTH_RESULT"]);
?>
<?if($arResult["USE_EMAIL_CONFIRMATION"] === "Y" && is_array($arParams["AUTH_RESULT"]) &&  $arParams["AUTH_RESULT"]["TYPE"] === "OK"):?>
<p><?echo GetMessage("AUTH_EMAIL_SENT")?></p>
<?else:?>

<?if($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):?>
	<p><?echo GetMessage("AUTH_EMAIL_WILL_BE_SENT")?></p>
<?endif?>
<noindex>
<form class="form-horizontal" method="post" action="<?=$arResult["AUTH_URL"]?>" name="bform">
<?
if (strlen($arResult["BACKURL"]) > 0)
{
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
}
?>
	<input type="hidden" name="AUTH_FORM" value="Y" />
	<input type="hidden" name="TYPE" value="REGISTRATION" />

	<div class="form-group">
	<label for="name" class="col-sm-4 control-label"><?=GetMessage("AUTH_NAME")?></label>
		<div class="col-sm-7">
		<input type="text" class="form-control" name="USER_NAME" maxlength="50" value="<?=$arResult["USER_NAME"]?>"/>
		</div>
	</div>

	<div class="form-group">
	<label for="name" class="col-sm-4 control-label"><?=GetMessage("AUTH_LAST_NAME")?></label>
		<div class="col-sm-7">
		<input type="text" class="form-control" name="USER_LAST_NAME" maxlength="50" value="<?=$arResult["USER_LAST_NAME"]?>"/>
		</div>
	</div>

	<div class="form-group">
	<label for="name" class="col-sm-4 control-label"><span class="starrequired">*</span><?=GetMessage("AUTH_LOGIN_MIN")?></label>
		<div class="col-sm-7">
		<input type="text"  class="form-control" name="USER_LOGIN" maxlength="50" value="<?=$arResult["USER_LOGIN"]?>"/>
		</div>
	</div>

	<div class="form-group">
	<label for="name" class="col-sm-4 control-label"><span class="starrequired">*</span><?=GetMessage("AUTH_PASSWORD_REQ")?></label>
		<div class="col-sm-7">
		<input type="password" class="form-control" name="USER_PASSWORD" maxlength="50" value="<?=$arResult["USER_PASSWORD"]?>"/>

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

		</div>
	</div>


	<div class="form-group">
	<label for="name" class="col-sm-4 control-label"><span class="starrequired">*</span><?=GetMessage("AUTH_CONFIRM")?></label>
		<div class="col-sm-7">
		<input type="password" class="form-control"  name="USER_CONFIRM_PASSWORD" maxlength="50" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>"/>
		</div>
	</div>

	<div class="form-group">
	<label for="name" class="col-sm-4 control-label"><?if($arResult["EMAIL_REQUIRED"]):?><span class="starrequired">*</span><?endif?><?=GetMessage("AUTH_EMAIL")?></label>
		<div class="col-sm-7">
		<input type="text"  class="form-control" name="USER_EMAIL" maxlength="255" value="<?=$arResult["USER_EMAIL"]?>"/>
		</div>
	</div>


<?// ******************** /User properties ***************************************************

	/* CAPTCHA */
	if ($arResult["USE_CAPTCHA"] == "Y")
	{
		?>




	<div class="form-group">
	<label for="name" class="col-sm-4 control-label"><b><?=GetMessage("CAPTCHA_REGF_TITLE")?></b></label>
		<div class="col-sm-7">
		
		<div class="row" style="padding: 10px 0;">		
			<div class="col-sm-6">
				<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
				<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
			</div>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="captcha_word" maxlength="50" value="" />

			</div>
		</div>


			<!-- <span class="starrequired">*</span><?=GetMessage("CAPTCHA_REGF_PROMT")?>: -->
		</div>
	</div>



		<?
	}
	/* CAPTCHA */
	?>
	<div class="row" style="margin-top: 20px">
		<div class="col-sm-7 col-sm-offset-4">
        <p><input type="checkbox" name="checkme" id="agree" /> <?=getmessage('submit_y')?></p>

			<hr>
			<input type="submit" class="btn btn-default" id="continue" name="Register" value="<?=GetMessage("AUTH_REGISTER")?>"/>
			<br><br>
			<p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>
			<p><span class="starrequired">*</span><?=GetMessage("AUTH_REQ")?></p>

			<p>
				<a href="<?=$arResult["AUTH_AUTH_URL"]?>" rel="nofollow"><b><i class="fa fa-sign-in"></i> <?=GetMessage("AUTH_AUTH")?></b></a>
			</p>

		</div>
	</div>

</form>
</noindex>
<script type="text/javascript">
document.bform.USER_NAME.focus();
</script>

<?endif?>


<script type="text/javascript">
$(document).ready(function(){

  $('#continue').prop('disabled', true);

  $('#agree').change(function() {

      $('#continue').prop('disabled', function(i, val) {
        return !val;
      })
  });
})
</script>