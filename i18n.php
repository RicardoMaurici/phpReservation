<?php
require_once('config.php');

$locale = LANG;
$textdomain = "reservation";
$locales_dir = dirname(__FILE__) . '/i18n';
 
if (isset($_GET['l']) && !empty($_GET['l']))
  $locale = $_GET['l'];
 
putenv('LANGUAGE=' . $locale);
putenv('LANG=' . $locale);
putenv('LC_ALL=' . $locale);
putenv('LC_MESSAGES=' . $locale);
 
require_once('lib/gettext.inc');
 
_setlocale(LC_ALL, $locale);
_setlocale(LC_CTYPE, $locale);
 
_bindtextdomain($textdomain, $locales_dir);
_bind_textdomain_codeset($textdomain, 'UTF-8');
_textdomain($textdomain);
 
function _e($string) {
  echo __($string);
}

?>