<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?><div class="row">
	<div class="col-md-5">
		<table class="table table-striped">
		<tbody>
		<tr>
			<th>
 <i class="fa fa-map-marker"></i> Адрес
			</th>
			<td>
             <?
                $APPLICATION->IncludeComponent(
                  "bitrix:main.include",
                  "",
                  Array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => SITE_DIR."/include/index_header_adress.php",
                    "EDIT_TEMPLATE" => ""
                    ),
                  false
                  );
                  ?>
			</td>
		</tr>
		<tr>
			<th>
 <i class="fa fa-phone"></i> Телефон
			</th>
			<td>
				              <?
                $APPLICATION->IncludeComponent(
                  "bitrix:main.include",
                  "",
                  Array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => SITE_DIR."/include/index_header_tel.php",
                    "EDIT_TEMPLATE" => ""
                    ),
                  false
                  );
                  ?>
			</td>
		</tr>
		<tr>
			<th>
 <i class="fa fa-skype"></i> Skype
			</th>
			<td>
				              <?
                $APPLICATION->IncludeComponent(
                  "bitrix:main.include",
                  "",
                  Array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => SITE_DIR."/include/index_header_skype.php",
                    "EDIT_TEMPLATE" => ""
                    ),
                  false
                  );
                  ?>
			</td>
		</tr>
		<tr>
			<th>
 <i class="fa fa-envelope-o"></i> E-mail
			</th>
			<td>
             <?
                $APPLICATION->IncludeComponent(
                  "bitrix:main.include",
                  "",
                  Array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => SITE_DIR."/include/index_header_e-mail.php",
                    "EDIT_TEMPLATE" => ""
                    ),
                  false
                  );
                  ?>
			</td>
		</tr>
		<tr>
			<th>
 <i class="fa fa-clock-o"></i> Режим работы
			</th>
			<td>
				              <?
                $APPLICATION->IncludeComponent(
                  "bitrix:main.include",
                  "",
                  Array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => SITE_DIR."/include/index_footer_regim.php",
                    "EDIT_TEMPLATE" => ""
                    ),
                  false
                  );
                  ?>
			</td>
		</tr>
		</tbody>
		</table>
		 <?
                  $page = $APPLICATION->GetCurPage();
                  ?> <!-- <img src="https://chart.googleapis.com/chart?cht=qr&chl=http%3A%2F%2F<?echo $_SERVER['HTTP_HOST'].$page?>&chs=200x200&choe=UTF-8&chld=L|2" alt="" style="margin: 0 15px 0 0"> -->
	</div>
	<div class="col-md-7">
                              <?
                // $APPLICATION->IncludeComponent(
                //   "bitrix:main.include",
                //   "",
                //   Array(
                //     "AREA_FILE_SHOW" => "file",
                //     "PATH" => SITE_DIR."/include/index_map.php",
                //     "EDIT_TEMPLATE" => ""
                //     ),
                //   false
                //   );
                  ?>

     <?$APPLICATION->IncludeComponent(
  "bitrix:map.yandex.view", 
  "", 
  array(
    "COMPONENT_TEMPLATE" => "map",
    "CONTROLS" => array(
      0 => "ZOOM",
      1 => "MINIMAP",
      2 => "TYPECONTROL",
      3 => "SCALELINE",
    ),
    "INIT_MAP_TYPE" => "MAP",
    "MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:55.755619828930655;s:10:\"yandex_lon\";d:37.62687328968782;s:12:\"yandex_scale\";i:13;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:37.627066408737;s:3:\"LAT\";d:55.755562351471;s:4:\"TEXT\";s:10:\"Ильнка, 98\";}}}",
    "MAP_HEIGHT" => "300",
    "MAP_ID" => "",
    "MAP_WIDTH" => "100%",
    "OPTIONS" => array(
      0 => "ENABLE_SCROLL_ZOOM",
      1 => "ENABLE_DBLCLICK_ZOOM",
      2 => "ENABLE_DRAGGING",
    )
  ),
  false
);?>                  
	</div>
</div>
<br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>