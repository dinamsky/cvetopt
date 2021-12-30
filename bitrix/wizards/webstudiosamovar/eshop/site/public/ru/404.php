<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("404 Not Found");

IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");
?>
	<div style=" border: 1px solid #dcbbbb; padding: 40px 30px; border-radius: 5px;">	
	<div class="row">
		<div class="col-md-3 text-center hidden-xs">
		<i class="fa fa-frown-o" style="font-size: 120px; color: #c27272"></i>
		</div>

		<div class="col-md-9">

			<h3 style="margin: 0 0 15px; font-family: 'normal">
				
	<?=GetMessage("404_title");?>
			
			</h3>
	<?=GetMessage("404_text");?>
					<br><br>
					<a href="<?=SITE_DIR?>" class="btn btn-default"><?=GetMessage('home')?> </a> 
					
				</div>
			</div>	
</div>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>