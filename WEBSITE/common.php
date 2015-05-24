<?php
/**
 * Created by PhpStorm.
 * User: hiepnc
 * Date: 4/23/2015
 * Time: 9:52 PM
 */
if(!isset($_SESSION)){
    session_start();
}
header('Cache-control: private'); // IE 6 FIX

if(isSet($_GET['lang']))
{
    $lang = $_GET['lang'];

// register the session and set the cookie
    $_SESSION['lang'] = $lang;

    setcookie('lang', $lang, time() + (3600 * 24 * 30));
}
else if(isSet($_SESSION['lang']))
{
    $lang = $_SESSION['lang'];
}
else if(isSet($_COOKIE['lang']))
{
    $lang = $_COOKIE['lang'];
}
else
{
    $lang = 'vn';
}

switch ($lang) {
    case 'en':
        $lang_file = 'lang.en.php';
        break;

    case 'vn':
        $lang_file = 'lang.vn.php';
        break;

    default:
        $lang_file = 'lang.vn.php';

}

include_once '_LANGUAGES/'.$lang_file;
?>