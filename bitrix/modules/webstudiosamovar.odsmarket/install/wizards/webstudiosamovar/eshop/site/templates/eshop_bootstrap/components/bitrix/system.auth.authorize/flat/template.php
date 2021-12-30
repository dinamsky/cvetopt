<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?$this->setFrameMode( true );?>

<div class="bx-auth_">
		<?
ShowMessage($arParams["~AUTH_RESULT"]);
ShowMessage($arResult['ERROR_MESSAGE']);
?>

<?//if($arResult["AUTH_SERVICES"]):?>
	<!--div class="bx-auth-title"--><?//echo GetMessage("AUTH_TITLE")?><!--/div-->
<?//endif?>

	<!--div class="bx-auth-note"><?=GetMessage("AUTH_PLEASE_AUTH")?></div-->

	<form class="form-horizontal" name="form_auth" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">

		<input type="hidden" name="AUTH_FORM" value="Y" />
		<input type="hidden" name="TYPE" value="AUTH" />
		
		<?if (strlen($arResult["BACKURL"]) > 0):?>
		<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
		<?endif?>
		
		<?foreach ($arResult["POST"] as $key => $value):?>
		<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
		<?endforeach?>

	<div class="form-group">
	<label for="name" class="col-sm-3 control-label"><?=GetMessage("AUTH_LOGIN")?></label>
		<div class="col-sm-7">
		<!-- <input type="text" class="form-control" name="NAME" value="<?=$arResult["arUser"]["NAME"]?>"> -->
		<input  class="form-control" type="text" name="USER_LOGIN" maxlength="255" value="<?=$arResult["LAST_LOGIN"]?>" />
		</div>
	</div>			
				
			
	<div class="form-group">
	<label for="name" class="col-sm-3 control-label"><?=GetMessage("AUTH_PASSWORD")?></label>
		<div class="col-sm-7">
		<input class="form-control" type="password" name="USER_PASSWORD" maxlength="255" />
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
				
			
			<?if($arResult["CAPTCHA_CODE"]):?>
				
					
					<input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />
					<img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
				
				
					<?echo GetMessage("AUTH_CAPTCHA_PROMT")?>:
					<input class="bx-auth-input" type="text" name="captcha_word" maxlength="50" value="" size="15" />
				
			<?endif;?>
<?if ($arResult["STORE_PASSWORD"] == "Y"):?>
			
<!-- 				
				<input type="checkbox" id="USER_REMEMBER" name="USER_REMEMBER" value="Y" /><label for="USER_REMEMBER">&nbsp;<?=GetMessage("AUTH_REMEMBER_ME")?></label> -->
			
<?endif?>
<div class="row" style="margin-top: 20px">
	<div class="col-sm-7 col-sm-offset-3">			
<div class="checkbox" style="margin-top: 0; padding-top: 0; ">
	<label style="font-size: 14px !important">
   <input type="checkbox" style="margin-top: 0" id="USER_REMEMBER" name="USER_REMEMBER" value="Y"><?=GetMessage("AUTH_REMEMBER_ME")?>
	</label>
</div>
	</div>
	</div>

	<div class="row" style="margin-top: 5px">
		<div class="col-sm-2 col-sm-offset-3">	
		<input type="submit"class="btn btn-default" name="Login" value="<?=GetMessage("AUTH_AUTHORIZE")?>" />
		</div>
			
		<div class="col-sm-5 text-right" style="padding-top: 10px">
			
				<a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a> | 
				<a href="<?=$arResult["AUTH_REGISTER_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_REGISTER")?></a>	
		</div>	

	</div>			
<br>
				<?//=GetMessage("AUTH_FIRST_ONE")?>


	</form>
</div>

<script type="text/javascript">
<?if (strlen($arResult["LAST_LOGIN"])>0):?>
try{document.form_auth.USER_PASSWORD.focus();}catch(e){}
<?else:?>
try{document.form_auth.USER_LOGIN.focus();}catch(e){}
<?endif?>
</script>

<?if(false && $arResult["AUTH_SERVICES"]):?>
<?
$APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "",
	array(
		"AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
		"CURRENT_SERVICE" => $arResult["CURRENT_SERVICE"],
		"AUTH_URL" => $arResult["AUTH_URL"],
		"POST" => $arResult["POST"],
		"SHOW_TITLES" => $arResult["FOR_INTRANET"]?'N':'Y',
		"FOR_SPLIT" => $arResult["FOR_INTRANET"]?'Y':'N',
		"AUTH_LINE" => $arResult["FOR_INTRANET"]?'N':'Y',
	),
	$component,
	array("HIDE_ICONS"=>"Y")
);
?>
<?endif?>
