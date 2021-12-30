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