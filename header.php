<?php include_once('main.php'); 
require_once('config.php');
?>
<div id="header_inner_div"><div id="header_inner_left_div">

<a href="#about"><?php echo __('About'); ?></a>

<?php

if(isset($_SESSION['logged_in']))
{
	echo ' | <a href="#help">'.__('Help').'</a>';
}

?>

</div><div id="header_inner_center_div">

<?php

if(isset($_SESSION['logged_in']))
{
	$now = new DateTime(null,new DateTimeZone(TIMEZONE)); //data atual no brasil
	$formatter = new IntlDateFormatter(LANG, IntlDateFormatter::MEDIUM, IntlDateFormatter::MEDIUM,TIMEZONE, IntlDateFormatter::GREGORIAN);
	echo '<b>'.__('Week').' '. global_week_number . ' - ' . global_day_name . ' ' . $formatter->format($now) . '</b>';

}

?>

</div><div id="header_inner_right_div">

<?php

if(isset($_SESSION['logged_in']))
{
	echo '<a href="#cp">'.__('Control panel').'</a> | <a href="#logout">'.__('Log out').'</a>';
}
else
{
	echo __('Not logged in');
}

?>

</div></div>
