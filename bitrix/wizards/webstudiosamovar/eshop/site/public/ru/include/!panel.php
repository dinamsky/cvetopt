
<?
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php"); 
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/panel.php");

// -----------------------------   default


$set_saved = array(
	'color' => 'red', 
	'theme' => 'light', 
	'type_menu' => 'g', 
	'show_y_n_slider' => 'y', 
	'show_y_n_plitki' => 'y', 
	'show_y_n_priem' => 'y', 
	'show_y_n_content' => 'y', 
	'show_y_n_akcii' => 'y', 
	'show_y_n_about' => 'y', 
	'show_y_n_brands' => 'y', 
	);

// -----------------------------   .default

$set_saved = file_get_contents($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/site.set');
$set_saved = unserialize($set_saved); 

$color_default = isset($_GET['color']) ? $_GET['color'] : $set_saved['color'];
$theme_default = isset($_GET['theme']) ? $_GET['theme'] : $set_saved['theme'];
$type_menu_default = isset($_GET['type_menu']) ? $_GET['type_menu'] : $set_saved['type_menu'];
$show_y_n_slider_default = isset($_GET['show_y_n_slider']) ? $_GET['show_y_n_slider'] : $set_saved['show_y_n_slider'];
$show_y_n_plitki_default = isset($_GET['show_y_n_plitki']) ? $_GET['show_y_n_plitki'] : $set_saved['show_y_n_plitki'];
$show_y_n_priem_default = isset($_GET['show_y_n_priem']) ? $_GET['show_y_n_priem'] : $set_saved['show_y_n_priem'];
$show_y_n_content_default = isset($_GET['show_y_n_content']) ? $_GET['show_y_n_content'] : $set_saved['show_y_n_content'];
$show_y_n_akcii_default = isset($_GET['show_y_n_akcii']) ? $_GET['show_y_n_akcii'] : $set_saved['show_y_n_akcii'];
$show_y_n_about_default = isset($_GET['show_y_n_about']) ? $_GET['show_y_n_about'] : $set_saved['show_y_n_about'];
$show_y_n_brands_default = isset($_GET['show_y_n_brands']) ? $_GET['show_y_n_brands'] : $set_saved['show_y_n_brands'];



$arr_set =  array(
	'color' => $color_default, 
	'theme' => $theme_default, 
	'type_menu' => $type_menu_default, 
	'show_y_n_slider' => $show_y_n_slider_default, 
	'show_y_n_plitki' => $show_y_n_plitki_default, 
	'show_y_n_priem' => $show_y_n_priem_default, 
	'show_y_n_content' => $show_y_n_content_default, 
	'show_y_n_akcii' => $show_y_n_akcii_default, 
	'show_y_n_about' => $show_y_n_about_default, 	
	'show_y_n_brands' => $show_y_n_brands_default, 	
	);


 $_SESSION['arr_set'] = $arr_set;



// echo "<pre>";
// print_r($arr_set);
// echo "</pre>";


if  (isset($_GET['color']) ||
	isset($_GET['theme']) ||
	isset($_GET['type_menu']) ||
	isset($_GET['show_y_n_slider']) ||
	isset($_GET['show_y_n_plitki']) ||
	isset($_GET['show_y_n_priem']) ||
	isset($_GET['show_y_n_content']) ||
	isset($_GET['show_y_n_akcii']) ||
	isset($_GET['show_y_n_brands']) ||
	isset($_GET['show_y_n_about'])) 
{
	$show_class = 'class="visible" style="left: 0px;"';
file_put_contents($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/site.set', serialize($arr_set));

	
}


?>
<?if ($USER->IsAdmin()):?>

<div id="panel_setup"  <?=$show_class?> class=" hidden-xs hidden-sm">
    <div id="panel-content" class="panel_set">
<form method="get" action="">

	<?//-------------------------------------------- Р¦РІРµС‚Р° ?>

	<div class="color">

	<h4><?=GetMessage('title_color')?></h4>

	<label class="btn" style="background: red;">
		<input type="radio" name="color" value="red" onclick='this.form.submit()'>
		<i class="fa fa-check" style="color:<?if($color_default == 'red'):?> white <?else:?> red<?endif?>;"></i>
	</label>

	<label class="btn" style="background: #cd3367;">
		<input type="radio" name="color" value="rose" onclick='this.form.submit()'>
		<i class="fa fa-check" style="color:<?if($color_default == 'rose'):?> white <?else:?> #cd3367<?endif?>;"></i>
	</label>

	<label class="btn" style="background: #9dc21a;">
		<input type="radio" name="color" value="green" onclick='this.form.submit()'>
		<i class="fa fa-check" style="color:<?if($color_default == 'green'):?> white <?else:?> #9dc21a<?endif?>;"></i>
	</label>

	<label class="btn" style="background: #349933;">
		<input type="radio" name="color" value="darkgreen" onclick='this.form.submit()'>
		<i class="fa fa-check" style="color:<?if($color_default == 'darkgreen'):?> white <?else:?> #349933<?endif?>;"></i>
	</label>

	<label class="btn" style="background: cornflowerblue;">
		<input type="radio" name="color" value="cornflowerblue" onclick='this.form.submit()'>
		<i class="fa fa-check" style="color:<?if($color_default == 'cornflowerblue'):?> white <?else:?> cornflowerblue<?endif?>;"></i>
	</label>
	
	<label class="btn" style="background: royalblue;">
		<input type="radio" name="color" value="royalblue" onclick='this.form.submit()'>
		<i class="fa fa-check" style="color:<?if($color_default == 'royalblue'):?> white <?else:?> royalblue<?endif?>;"></i>
	</label>
		
	<label class="btn" style="background: orange;">
		<input type="radio" name="color" value="orange" onclick='this.form.submit()'>
		<i class="fa fa-check" style="color:<?if($color_default == 'orange'):?> white <?else:?> orange<?endif?>;"></i>
	</label>

	<label class="btn" style="background: darkorange;">
		<input type="radio" name="color" value="darkorange" onclick='this.form.submit()'>
		<i class="fa fa-check" style="color:<?if($color_default == 'darkorange'):?> white <?else:?> darkorange<?endif?>;"></i>
	</label>

	</div>

	<?//-------------------------------------------- РўРµРјР° ?>

	<h4><?=GetMessage('title_theme')?></h4>
	
	<label class="btn <?if($theme_default == 'light'):?>active<?endif?>">
		<input type="radio" name="theme" value="light" onclick='this.form.submit()'>
		<?if($theme_default == 'light'):?><i class="fa fa-check"></i><?endif?> <?=GetMessage('theme_light')?>
	</label>

	<label class="btn <?if($theme_default == 'dark'):?>active<?endif?>">
		<input type="radio" name="theme" value="dark" onclick='this.form.submit()'>
		<?if($theme_default == 'dark'):?><i class="fa fa-check"></i><?endif?> <?=GetMessage('theme_dark')?>
	</label>

	<?//-------------------------------------------- РўРёРї РјРµРЅСЋ ?>

	<h4><?=GetMessage('title_type_menu')?></h4>

	<label class="btn <?if($type_menu_default == 'g'):?>active<?endif?>">
		<input type="radio" name="type_menu" value="g" onclick='this.form.submit()'>
		<?if($type_menu_default == 'g'):?><i class="fa fa-check"></i><?endif?> <?=GetMessage('type_menu_g')?>
	</label>

	<label class="btn <?if($type_menu_default == 'v'):?>active<?endif?>">
		<input type="radio" name="type_menu" value="v" onclick='this.form.submit()'>
		<?if($type_menu_default == 'v'):?><i class="fa fa-check"></i><?endif?> <?=GetMessage('type_menu_v')?>
	</label>

	<?//-------------------------------------------- РџРѕРєР°Р·С‹РІР°С‚СЊ РЅР° РіР»Р°РІРЅРѕР№ ?>

	<h4><?=GetMessage('title_show_index')?></h4>

	<div class="btn-checked">

	<label class="btn checked <?if($show_y_n_priem_default == 'y'):?>active<?endif?>">
		<input type="radio" name="show_y_n_priem" value="<?if($show_y_n_priem_default == 'y'):?>n<?else:?>y<?endif?>" onclick='this.form.submit()'>
		<i class="fa fa-check"></i> <?=GetMessage('show_y_n_priem')?>
	</label>
	<br>

	<label class="btn checked <?if($show_y_n_slider_default == 'y'):?>active<?endif?>">
		<input type="radio" name="show_y_n_slider" value="<?if($show_y_n_slider_default == 'y'):?>n<?else:?>y<?endif?>" onclick='this.form.submit()'>
		<i class="fa fa-check"></i> <?=GetMessage('show_y_n_slider')?>
	</label>
	<br>
	
	<label class="btn checked <?if($show_y_n_plitki_default == 'y'):?>active<?endif?>">
		<input type="radio" name="show_y_n_plitki" value="<?if($show_y_n_plitki_default == 'y'):?>n<?else:?>y<?endif?>" onclick='this.form.submit()'>
		<i class="fa fa-check"></i> <?=GetMessage('show_y_n_plitki')?>
	</label>
	<br>

	<label class="btn checked <?if($show_y_n_brands_default == 'y'):?>active<?endif?>">
		<input type="radio" name="show_y_n_brands" value="<?if($show_y_n_brands_default == 'y'):?>n<?else:?>y<?endif?>" onclick='this.form.submit()'>
		<i class="fa fa-check"></i> <?=GetMessage('show_y_n_brands')?>
	</label>
<br>

	<label class="btn checked <?if($show_y_n_about_default == 'y'):?>active<?endif?>">
		<input type="radio" name="show_y_n_about" value="<?if($show_y_n_about_default == 'y'):?>n<?else:?>y<?endif?>" onclick='this.form.submit()'>
		<i class="fa fa-check"></i> <?=GetMessage('show_y_n_about')?>
	</label>
<br>
	<label class="btn checked <?if($show_y_n_akcii_default == 'y'):?>active<?endif?>">
		<input type="radio" name="show_y_n_akcii" value="<?if($show_y_n_akcii_default == 'y'):?>n<?else:?>y<?endif?>" onclick='this.form.submit()'>
		<i class="fa fa-check"></i> <?=GetMessage('show_y_n_akcii')?>
	</label>
	


	</div>

</form>
    </div>
    <div id="panel-sticker">
        <span><i class="fa fa-cogs"></i></span>
    </div>
</div>

<?endif?>


