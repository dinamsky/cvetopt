<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?

ShowMessage($arParams["~AUTH_RESULT"]);
?>
<?$this->setFrameMode( true );?>
<div class="row">
<div class="col-md-12 text-center">

<form name="bform" class="form-inline" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
<?
if (strlen($arResult["BACKURL"]) > 0)
{
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
}
?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="SEND_PWD">
	<p>
	<?=GetMessage("AUTH_FORGOT_PASSWORD_1")?>
	</p>

			<!-- <td colspan="2"><b><?=GetMessage("AUTH_GET_CHECK_STRING")?></b> -->
		<br>
	    <label class="sr-only" for="exampleInputEmail2"><?=GetMessage("AUTH_LOGIN")?></label>
	    <?=GetMessage("AUTH_LOGIN")?>
	    <input type="text"  class="form-control" name="USER_LOGIN" maxlength="45" value="<?=$arResult["LAST_LOGIN"]?>" />

			<!-- <td><?=GetMessage("AUTH_LOGIN")?><br><input type="text" name="USER_LOGIN" maxlength="45" value="<?=$arResult["LAST_LOGIN"]?>" /> -->
			<?=GetMessage('AUTH_OR')?>
			<?=GetMessage("AUTH_EMAIL")?>
    		<input  class="form-control" type="text" name="USER_EMAIL" maxlength="255" />
			<input type="submit" class="btn btn-default" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" />

<p class="form-control-static" style="padding-left: 10px">
<a href="<?=$arResult["AUTH_AUTH_URL"]?>"><b> <i class="fa fa-sign-in"></i> <?=GetMessage("AUTH_AUTH")?></b></a>
</p>

</form>
</div>
</div>
<script type="text/javascript">
document.bform.USER_LOGIN.focus();
</script>

