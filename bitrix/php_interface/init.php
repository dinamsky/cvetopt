<?
/*
You can place here your functions and event handlers

AddEventHandler("module", "EventName", "FunctionName");
function FunctionName(params)
{
	//code
}
*/
function s($array, $user_id = false)
{
	if(intval($user_id))
	{
		global $USER;
		if($USER->GetId() == $user_id)
		{
			echo "<pre>"; print_r($array); echo "</pre>";
		}
	}
	else
	{
		echo "<pre>"; print_r($array); echo "</pre>";
	}
}
  function removeDirectory($dir)
{
    if ($objs = glob($dir."/*")) {
       foreach($objs as $obj) {
         is_dir($obj) ? removeDirectory($obj) : unlink($obj);
       }
    }
    rmdir($dir);
}
// принадлежит ли пользователь группе
function userAccessory($id)
{
	global $USER;
	$arGroups = $USER->GetUserGroupArray();
	foreach($arGroups as $group)
	{
		if($group == $id)
		{
			return 1;
			break;
		}
	}
}

function tovar_sklonenie($number, $endingArray)

{

$number = $number % 100;

if ($number>=11 && $number<=19)

{

$ending=$endingArray[2];

} else 	{

$i = $number % 10;

switch ($i)	{

case (1): $ending = $endingArray[0]; break;

case (2):	case (3):	case (4): $ending = $endingArray[1]; break;

default: $ending=$endingArray[2];	}

}

return $ending;

}


/**
 * Меняет значение параметра в URL.
 * Если параметра нет, то он добавляется в конец URL.
 * Если значение параметра равно NULL, то он вырезается из URL.
 * Так же дописывает или удаляет идентификатор сессии.
 *
 * @param    string        $url         если не задан, то берется из $_SERVER['REQUEST_URI']
 * @param    string/array  $arg         может быть так же ассоциативным массивом,
 *                                      в этом случае третий параметр не используется
 * @param    string/null   $value
 * @param    bool          $is_use_sid  дописывать/вырезать параметр с идентификатором сессии?
 *                                      идентификатор сессии дописывается для только для текущего хоста
 * @return   string
 * @see      http_build_query()
 *
 * @author   Nasibullin Rinat <n a s i b u l l i n  at starlink ru>
 * @charset  ANSI
 * @version  1.2.0
 */

function urlReplaceArg($url, $arg, $value = null, $is_use_sid = false)
{
    static $tr_table = array(
        '\['  => '(?:\[|%5B)',
        '\]'  => '(?:\]|%5D)',
        '%5B' => '(?:\[|%5B)',
        '%5D' => '(?:\]|%5D)',
    );

    if (is_string($arg))    $args = array($arg => $value);
    elseif (is_array($arg)) $args = $arg;
    else
    {
        trigger_error('An array or string type expected in second parameter, ' . gettype($arg) . ' given ', E_USER_WARNING);
        return $url;
    }
    if (! $url) $url = $_SERVER['REQUEST_URI'];
    $original_url = $url;

    /*
    при необходимости дописываем/вырезаем параметр с идентификатором сессси,
    т.к. output_add_rewrite_var() тупо добавит еще один
    May be good idea to make output_REPLACE_rewrite_var() function? :)
    http://bugs.php.net/bug.php?id=43234
    */
    $args[session_name()] = null;
    if ($is_use_sid && session_id())
    {
        $host = parse_url($url, PHP_URL_HOST);
        if (! $host || $host === $_SERVER['HTTP_HOST']) $args[session_name()] = session_id();
    }

    $count = 0;

//echo "<b>$url</b><br>";

    $url = str_replace('?', '?&', $url, $count);
    if ($count > 1)
    {
        trigger_error('Incorrect URL with more then one "?"!', E_USER_WARNING);
        return $original_url;
    }

    foreach ($args as $arg => $value)
    {
        #проверяем название параметра на допустимые символы
        if (! preg_match('/^[^\?&#=\x00-\x20\x7f]+$/s', $arg))
        {
            trigger_error('Illegal characters found in arguments. See second parameter (' . gettype($arg) . ' type given)!', E_USER_WARNING);
            return $original_url;
        }
        $re_arg = strtr(preg_quote($arg, '/'), $tr_table);
        if (preg_match('/(&' . $re_arg . '=)[^\?&#=\x00-\x20\x7f]*/s', $url, $m))
        {
            #заменяем или вырезаем параметр, если он существует
            $v = is_null($value) ? '' : $m[1] . rawurlencode($value);
            $url = str_replace($m[0], $v, $url);
            continue;
        }
        if (is_null($value)) continue; #вырезаем параметр из URL
        #добавляем параметр в конец URL
        $div = strpos($url, '?') !== false ? '&' : '?';
        $url = $url . $div . $arg . '=' . rawurlencode($value);
    }#foreach
    return rtrim(str_replace('?&', '?', $url), '?');
}

// ------------------------------------------------   Количесво товара на странице

function kol_tovar_page()

{
if (isset($_GET['kol']) )
{
    $_SESSION['kol_tovar_page_catalog'] = $_GET['kol'];
} else {
    if( !isset($_SESSION['kol_tovar_page_catalog'])) $_SESSION['kol_tovar_page_catalog'] = 30;
}

$kol_tovar_page_catalog_temp = $_SESSION['kol_tovar_page_catalog'];

// echo $kol_tovar_page_catalog_temp;

return $kol_tovar_page_catalog_temp;

}


// ------------------------------------------------   Количесво товара на странице

function type_show_catalog()

{
if (isset($_GET['type_show']) )
{
    $_SESSION['type_show'] = $_GET['type_show'];
} else {
    if( !isset($_SESSION['type_show'])) $_SESSION['type_show'] = "pl";
}

$type_show_temp = $_SESSION['type_show'];

// echo $kol_tovar_page_catalog_temp;

return $type_show_temp;

}

// ----------------------------------------------------------  Склонение товаров

function sklonenie_tovarov($number, $endingArray)

{

$number = $number % 100;

if ($number>=11 && $number<=19)

{

$ending=$endingArray[2];

} else  {

$i = $number % 10;

switch ($i) {

case (1): $ending = $endingArray[0]; break;

case (2):   case (3):   case (4): $ending = $endingArray[1]; break;

default: $ending=$endingArray[2];   }

}

return $ending;

}

?>