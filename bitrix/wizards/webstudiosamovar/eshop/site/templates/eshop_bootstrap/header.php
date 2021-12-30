<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");
?>

<!DOCTYPE html>

		<?$APPLICATION->ShowHead();?>
		<title><?$APPLICATION->ShowTitle();?></title>

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="/favicon_shop.ico" />

        <script src="<?=SITE_TEMPLATE_PATH?>/js/jquery-1.11.1.min.js"></script>
        <script src="<?=SITE_TEMPLATE_PATH?>/js/bootstrap.js"></script>

        <link href="<?=SITE_TEMPLATE_PATH?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?=SITE_TEMPLATE_PATH?>/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?=SITE_TEMPLATE_PATH?>/css/main.css" rel="stylesheet">
        <link href="<?=SITE_TEMPLATE_PATH?>/css/media.css" rel="stylesheet">
        <link href="<?=SITE_TEMPLATE_PATH?>/fonts/fonts.css" rel="stylesheet">
        <link href="<?=SITE_TEMPLATE_PATH?>/fonts/fonts_icon.css" rel="stylesheet">

        <script src='<?=SITE_TEMPLATE_PATH?>/js/imagesLoaded.js'></script>
        <script src='<?=SITE_TEMPLATE_PATH?>/js/masorny.js'></script>
        <script src="<?=SITE_TEMPLATE_PATH?>/js/jqBootstrapValidation-1.3.7.min.js"></script>
        
        <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/localscroll.js"></script>
        <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/scrollto.js"></script> 


        <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/panel.js"></script>
        <link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/panel_setup.css">
		


      <script type="text/javascript">

      $(function() {
      $.fn.scrollToTop = function() {
        $(this).hide().removeAttr("href");
        if ($(window).scrollTop() >= "250") $(this).fadeIn("slow")
          var scrollDiv = $(this);
        $(window).scroll(function() {
          if ($(window).scrollTop() <= "250") $(scrollDiv).fadeOut("slow")
            else $(scrollDiv).fadeIn("slow")
          });

        $(this).click(function() {
          $("html, body").animate({scrollTop: 0}, "slow")
        })
        }
        });

    $(function() {
      $("#Go_Top").scrollToTop();
    });

  </script>  

  <script>

$(document).ready(function(){

        var $menu = $("#menu");

        $(window).scroll(function(){
            if ( $(this).scrollTop() > 100 && $menu.hasClass("default") ){
                $menu.removeClass("default").addClass("fixed");
            } else if($(this).scrollTop() <= 100 && $menu.hasClass("fixed")) {
                $menu.removeClass("fixed").addClass("default");
            }
        });//scroll
    });
  </script>


<body>

<a class="go_top" href='#' id='Go_Top'>
<i class="fa fa-angle-double-up"></i>
</a>

		<div id="panel">
			<?$APPLICATION->ShowPanel();?>
		</div>


<?
include $_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/!panel.php'; // панель настройки сайта
?>
<link href="<?=SITE_TEMPLATE_PATH?>/css/themes/<?=$_SESSION['arr_set']['color']?>/style.css" rel="stylesheet">

<?
	
	// echo $_SESSION['arr_set']['color'].'<br>';
	// echo $_SESSION['arr_set']['theme'].'<br>';
	// echo $_SESSION['arr_set']['type_menu'].'<br>';
?>
<? if ($_SESSION['arr_set']['theme'] == 'dark' ):?>
<link href="<?=SITE_TEMPLATE_PATH?>/css/dark.css" rel="stylesheet">
<?endif?>

<? if ($_SESSION['arr_set']['type_menu'] == 'g' ):?>
<div class="top_menu_end_enter hidden-xs hidden-sm">
   <div class="container">
		<div class="row">
			<div class="col-md-9  col-sm-12 col-xs-12 top_menu hidden-xs hidden-sm">

<?$APPLICATION->IncludeComponent(
  "bitrix:menu",
  "top",
  Array(
    "COMPONENT_TEMPLATE" => "top",
    "ROOT_MENU_TYPE" => "top",
    "MENU_CACHE_TYPE" => "N",
    "MENU_CACHE_TIME" => "3600",
    "MENU_CACHE_USE_GROUPS" => "Y",
    "MENU_CACHE_GET_VARS" => array(),
    "MAX_LEVEL" => "1",
    "CHILD_MENU_TYPE" => "left",
    "USE_EXT" => "N",
    "DELAY" => "N",
    "ALLOW_MULTI_SELECT" => "N"
  )
);?>			

			</div>

			<div class="col-md-3 col-sm-12 col-xs-12 reg_enter">
				<?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "enter", array(
					"REGISTER_URL" => SITE_DIR."login/?register=yes",
					"PROFILE_URL" => SITE_DIR."personal/",
					"SHOW_ERRORS" => "N"
					),
				false,
				array()
				);?>
			</div>

		</div>
	</div>
</div>
<?endif?>


<div class="top_menu_end_enter_vertical  visible-xs visible-sm" style=" position: fixed; top: 0; z-index: 1000; width: 100%;

">
   <!-- <div class="container"> -->
		<!-- <div class="row"> -->
			<div class="reg_enter">
				<?
				$APPLICATION->IncludeComponent("bitrix:system.auth.form", "enter", array(
					"REGISTER_URL" => SITE_DIR."login/?register=yes",
					"PROFILE_URL" => SITE_DIR."personal/",
					"SHOW_ERRORS" => "N"
					),
				false,
				array()
				);
				?>
			</div>

		<!-- </div> -->
	<!-- </div> -->
</div>


<div class="header">
	<div class="container">

			<div class="header_table">

				<div class="logo_cell">

					<div>
						<?
						$logo_file = file_get_contents($_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/index_header_logo.php');
						?>              
						<a href="<?=SITE_DIR?>">
						<div class="logo" <?if(trim($logo_file) !== ""):?>style="background: none;"<?else:?>style="width:190px; height: 50px; "<?endif?>>
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_DIR."/include/index_header_logo.php",
									"EDIT_TEMPLATE" => ""
									),
								false
								);?>
						</div>
					</a>
						<div class="slogan hidden-xs hidden-sm hidden-md" style=" background: none;">
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_DIR."/include/index_slogan.php",
									"EDIT_TEMPLATE" => ""
									),
								false
								);?>
						</div>
					</div>
				</div>

				<div class="form_search_cell">

					<!-- <div class="form_search"> -->

<?
include $_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/_templates_search_form.php'; // панель настройки сайта
?>	

				</div>

				<div class="regim_cell">

					<?=getmessage('headr_regim_title')?>
					<div>
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_DIR."/include/index_footer_regim.php",
									"EDIT_TEMPLATE" => ""
									),
								false
								);?>
					</div>

				</div>
				<div class="contacts_cell">

					<div class="tel">
						<!-- <strong> -->
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_DIR."/include/index_tel.php",
									"EDIT_TEMPLATE" => ""
									),
								false
								);?>
						<!-- </strong> -->
					</div>
					<div class="call_back"><a href="#" data-toggle="modal" data-target="#callback" ><?=GetMessage("index_callback")?></a></div>

				</div>

			</div>

	</div>
</div>


<div class="visible-xs visible-sm">

<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"mobile", 
	array(
		"ROOT_MENU_TYPE" => "catalog_top",
		"MAX_LEVEL" => "2",
		"CHILD_MENU_TYPE" => "catalog_top_submenu",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_THEME" => "site",
		"COMPONENT_TEMPLATE" => "catalog"
	),
	false
);?>

</div>


<div class="hidden-xs hidden-sm">

<? if ($_SESSION['arr_set']['type_menu'] == 'g' ):?>

<div class="default" id="menu">

<div class="main_menu_gorizontal">
   <div class="container">
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"catalog", 
	array(
		"ROOT_MENU_TYPE" => "catalog_top",
		"MAX_LEVEL" => "2",
		"CHILD_MENU_TYPE" => "catalog_top_submenu",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_THEME" => "site",
		"COMPONENT_TEMPLATE" => "catalog"
	),
	false
);?>
	</div>
</div>
	</div>

<?else:?>


<div class="default" id="menu">
<div class="top_menu_end_enter_vertical">
   <div class="container">
		<div class="row">
			<div class="col-md-9  col-sm-12 col-xs-12 top_menu">

<?$APPLICATION->IncludeComponent(
  "bitrix:menu",
  "top",
  Array(
    "COMPONENT_TEMPLATE" => "top",
    "ROOT_MENU_TYPE" => "top",
    "MENU_CACHE_TYPE" => "N",
    "MENU_CACHE_TIME" => "3600",
    "MENU_CACHE_USE_GROUPS" => "Y",
    "MENU_CACHE_GET_VARS" => array(),
    "MAX_LEVEL" => "1",
    "CHILD_MENU_TYPE" => "left",
    "USE_EXT" => "N",
    "DELAY" => "N",
    "ALLOW_MULTI_SELECT" => "N"
  )
);?>	

			</div>

			<div class="col-md-3 col-sm-12 col-xs-12 reg_enter">
				<?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "enter", array(
					"REGISTER_URL" => SITE_DIR."login/?register=yes",
					"PROFILE_URL" => SITE_DIR."personal/",
					"SHOW_ERRORS" => "N"
					),
				false,
				array()
				);?>
			</div>

		</div>
	</div>
</div>

</div>
<?endif?>
</div>
<?if ($_SESSION['arr_set']['type_menu'] == 'v' ):?>
<div class="container">
	<div class="row">
		<div <? if($APPLICATION->GetCurPage(false) == SITE_DIR): ?>class="col-md-12" <?else:?> style=" /*background: white; margin: 0 15px;*/"<?endif?>>
<?else:?>
<div>
	<div>
		<div >
<?endif?>



			<div class="main" <?if($APPLICATION->GetCurPage(false) == SITE_DIR && $_SESSION['arr_set']['theme'] == 'dark' ):?> style="padding: 0 15px;"<?endif?>>

 
  <?
              $arr_url = explode('/', str_replace ( SITE_DIR,"/", $APPLICATION->GetCurPage(false)));
              $url_2 = $arr_url[1];
              $url_3 = $arr_url[2];
              $url_4 = $arr_url[3];
  ?>
<? 
if($APPLICATION->GetCurPage(false) !== SITE_DIR): // Внутренняя?>

		<?if ($_SESSION['arr_set']['type_menu'] == 'g' ):?>
			<div class="container">
			<div class="row">
		<?endif?>	

      <?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb", 
	"main", 
	array(
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "s1",
		"COMPONENT_TEMPLATE" => "main"
	),
	false
);
?>
		<?if ($_SESSION['arr_set']['type_menu'] == 'g' ):?>
			</div>
			</div>
		<?endif?>	

<div class="cl"></div>
<div class="white">

<?if (!($url_2 == 'catalog' && $url_4) || $APPLICATION->GetCurPage(false) == SITE_DIR.'catalog/' || $url_4 == "filter"): ?>

		<?if ($_SESSION['arr_set']['type_menu'] == 'g' ):?>
			<div class="container">
			<div class="row">
		<?endif?>	

      <div class="page-header">
      <h1>
        <?if($url_3):?>
        <?$APPLICATION->ShowTitle()?>
        <?else:?>
        <?
        $sSectionName = "";
        $sPath = $_SERVER["DOCUMENT_ROOT"].$APPLICATION->GetCurDir().".section.php";
        include($sPath);
        echo $sSectionName;
        ?>

        <?if(isset($_GET['q'])):?>
				<?//$APPLICATION->AddChainItem(GetMessage('search_title'));?>
        		<?//=GetMessage('search_title')?> <span style="color:RED"><?=trim(htmlspecialcharsbx($_GET['q']))?></span>
		<?endif?>

        <?endif?>
      </h1>
      </div>

		<?if ($_SESSION['arr_set']['type_menu'] == 'g' ):?>
			</div>
			</div>
		<?endif?>	


<?endif?>

	<!--div class="row no_margin" <?if ($url_2 !== 'catalog'):?> style="padding: 0 15px 30px;"<?endif?>-->
	<div>
	
	<?if ($url_2 !== 'catalog' && $_SESSION['arr_set']['type_menu'] == 'v'):?>

	<div class="col-md-3">
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"catalog_left", 
	array(
		"ROOT_MENU_TYPE" => "catalog_top",
		"MAX_LEVEL" => "2",
		"CHILD_MENU_TYPE" => "catalog_top_submenu",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_THEME" => "site",
		"COMPONENT_TEMPLATE" => "catalog"
	),
	false
);?>

	</div>

	<div>
	<div>
	<div class="col-md-9">
	<?else:?>
	<div class="container">
	<div class="row">
	<div class="col-md-12">
	<?endif?>


<?endif // .Внутренняя?>


