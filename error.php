<!DOCTYPE html>

<html>

<head>

<meta http-equiv="content-type" content="text/html;charset=utf-8">

<title><?php echo __('Error');?></title>

</head>

<body>

<p>

<?php

if(isset($_GET['error_code']))
{
	$error_code = $_GET['error_code'];
}
else
{
	$error_code = '0';
}

if($error_code == '1')
{
	echo __('Salt must be 9 characters. Check config.php.');
}
elseif($error_code == '2')
{
	echo __('You must enable JavaScript in your browser');
}
elseif($error_code == '3')
{
	echo __('You must enable cookies in your browser');
}
else
{
	echo __('Unknown error');
}

?>

</p>

<p><a href="."><?php echo __('Click here to go back'); ?></a></p>

</body>

</html>
