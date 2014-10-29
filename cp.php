<?php 

include_once('main.php');

if(check_login() != true) { exit; }

if($_SESSION['user_is_admin'] == '1' && isset($_GET['list_users']))
{
	echo list_users();
}
elseif($_SESSION['user_is_admin'] == '1' && isset($_GET['reset_user_password']))
{
	$user_id = mysql_real_escape_string($_POST['user_id']);
	echo reset_user_password($user_id);
}
elseif($_SESSION['user_is_admin'] == '1' && isset($_GET['change_user_permissions']))
{
	$user_id = mysql_real_escape_string($_POST['user_id']);
	echo change_user_permissions($user_id);
}
elseif($_SESSION['user_is_admin'] == '1' && isset($_GET['delete_user_data']))
{
	$user_id = mysql_real_escape_string($_POST['user_id']);
	$data = $_POST['delete_data'];
	echo delete_user_data($user_id, $data);
}
elseif($_SESSION['user_is_admin'] == '1' && isset($_GET['delete_all']))
{
	$data = $_POST['delete_data'];
	echo delete_all($data);
}
elseif($_SESSION['user_is_admin'] == '1' && isset($_GET['save_system_configuration']))
{
	$price = mysql_real_escape_string($_POST['price']);
	echo save_system_configuration($price);
}
elseif(isset($_GET['get_usage']))
{
	echo get_usage();
}
elseif(isset($_GET['get_reservation_reminders']))
{
	echo get_reservation_reminders();
}
elseif(isset($_GET['toggle_reservation_reminder']))
{
	echo toggle_reservation_reminder();
}
elseif(isset($_GET['change_user_details']))
{
	$user_name = mysql_real_escape_string(trim($_POST['user_name']));
	$user_email = mysql_real_escape_string($_POST['user_email']);
	$user_password = mysql_real_escape_string($_POST['user_password']);
	echo change_user_details($user_name, $user_email, $user_password);
}
else
{
	echo '<div class="box_div" id="cp_div"><div class="box_top_div"><a href="#">'.__('Start').'</a> &gt;' .__('Control panel').'</div><div class="box_body_div">';

	if($_SESSION['user_is_admin'] == '1')
	{



		echo '<h3>'.__('User administration').'</h3>';
?>
		<div id="users_div"><?php echo list_users(); ?></div>

		<p class="center_p"><input type="button" class="small_button blue_button" id="reset_user_password_button" value="<?php echo __('Reset password'); ?>"> <input type="button" class="small_button blue_button" id="change_user_permissions_button" value="<?php echo __('Change permissions'); ?>"> <input type="button" class="small_button" id="delete_user_reservations_button" value="<?php echo __('Delete reservations'); ?>"> <input type="button" class="small_button" id="delete_user_button" value="<?php echo __('Delete user'); ?>"></p>
		<p class="center_p" id="user_administration_message_p"></p>

		<hr>

		<h3><?php echo __('Database administration'); ?></h3>

		<p class="smalltext_p"><?php echo __('These will require a confirmation. Your user and reservations will not be deleted unless you delete everything.'); ?></p>

		<p><input type="button" class="small_button" id="delete_all_reservations_button" value="<?php echo __('Delete all reservations'); ?>"> <input type="button" class="small_button" id="delete_all_users_button" value="<?php echo __('Delete all users'); ?>"> <input type="button" class="small_button" id="delete_everything_button" value="<?php echo __('Delete everything'); ?>"></p>

		<p id="database_administration_message_p"></p>

		<hr>

		<h3><?php echo __('System configuration'); ?></h3>

		<p class="smalltext_p"><?php echo __('Changing the price will not affect previous reservations.');?></p>

		<form action="." id="system_configuration_form"><p>

		<input type="text" id="price_input" value="<?php echo get_configuration('price'); ?>"> <label for="price_input"><?php echo __('Price per reservation, in');?> <?php echo global_currency; ?></label><br><br>

		<input type="submit" class="blue_button small_button" value="<?php echo __('Save configuration'); ?>">

		</p></form>

		<p id="system_configuration_message_p"></p>

		<hr class="blue_hr thick_hr">

<?php

	}

?>

	<h3><?php echo __('Your usage');?></h3>

	<p class="smalltext_p"><?php echo __('If you have used without making a reservation first, please click the button below. It can\'t be undone.');?></p>

	<div id="usage_div"><?php echo get_usage(); ?></div>

	<p><input type="button" class="blue_button small_button" id="add_one_reservation_button" value="<?php echo __('Add 1 to my reservations');?>"></p>

	<p id="usage_message_p"></p>

	<hr>

<?php

	if(global_reservation_reminders == '1')
	{

?>

	<h3><?php echo __('Your settings');?></h3>

	<p class="smalltext_p"><?php echo __('Before changing any setting, please verify that your details below are correct.');?></p>
	<p><span id="reservation_reminders_span"><?php echo get_reservation_reminders(); ?></span> <label for="reservation_reminders_checkbox"><?php echo __('Send me reservation reminders by email');?></label></p>

	<p id="settings_message_p"></p>

	<hr>

<?php

	}

?>

	<h3><?php echo __('Your details');?></h3>

	<p class="smalltext_p"><?php echo __('If you change your email, you must use the new one to log in. Password can be left blank to leave unchanged.');?></p>

	<form action="." id="user_details_form" autocomplete="off"><p>

	<div id="user_details_div"><div>
	<label for="user_name_input"><?php echo __('Name');?>:</label><br>
	<input type="text" id="user_name_input" value="<?php echo $_SESSION['user_name']; ?>"><br><br>
	<label for="user_email_input"><?php echo __('Email');?>:</label><br>
	<input type="text" id="user_email_input" autocapitalize="off" value="<?php echo $_SESSION['user_email']; ?>">
	</div><div>
	<label for="user_password_input"><?php echo __('Password');?>:</label><br>
	<input type="password" id="user_password_input"><br><br>
	<label for="user_password_confirm_input"><?php echo __('Confirm password');?>:</label><br>
	<input type="password" id="user_password_confirm_input">
	</div></div>

	<p><input type="submit" class="small_button blue_button" value="<?php echo __('Update my details');?>"></p>

	</p></form>

	<p id="user_details_message_p"></p>

	</div></div>

<?php

}

?>
