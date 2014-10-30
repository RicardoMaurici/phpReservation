<?php

include_once('main.php');

if(check_login() != true) { exit; }

?>

<div class="box_div" id="help_div">
<div class="box_top_div"><a href="#"><?php echo __('Start');?></a> &gt; <?php echo __('Help');?></div>
<div class="box_body_div">

<h3><?php echo __('Reservations');?></h3>

<ul>
<li><b><?php echo __('How much does it cost?');?></b><br><?php echo __('The current price per reservation is ').global_price . ' ' . global_currency; ?>.</li>
<li><b><?php echo __('How do I make a reservation?'); ?></b><br><?php echo __('Click on the time you wish to reserve.'); ?></li>
<li><b><?php echo __('How do I remove a reservation?'); ?></b><br><?php echo __('Click on the reservation you wish to remove.'); ?></li>
<li><b><?php echo __('If I have used without making a reservation first, how do I register it?'); ?></b><br><?php echo sprintf(__('Go to the %s and click on "Add 1 to my reservations."'), '<a href="#cp">'.__('control panel').'</a>'); ?></li>
<li><b><?php echo __('How do I check my usage?'); ?></b><br><?php echo __('You can check your usage in the'); ?> <a href="#cp"><?php echo __('control panel'); ?></a>.</li>
<li><b><?php echo __('What reservation restrictions are there?'); ?></b><br><?php echo __('You can\'t make or remove reservations back in time or remove other user\'s reservations. The webmaster may restrict how many weeks forward in time you can make reservations.'); ?></li>
<li><b><?php echo __('Can I get reservation reminders?'); ?></b><br><?php echo __('If the webmaster has enabled it, you can turn it on in the'); ?> <a href="#cp"><?php echo __('control panel'); ?></a>.</li>
</ul>

<h3><?php echo __('Other'); ?></h3>

<ul>
<li><b><?php echo __('How do I change my name, email and/or password?'); ?></b><br><?php echo __('You can do that in the'); ?> <a href="#cp"><?php echo __('control panel'); ?></a>.</li>
</ul>

<?php

if($_SESSION['user_is_admin'] == '1')
{

?>

<h3><?php echo __('Admin help'); ?></h3>

<ul>
<li><b><?php echo __('Are there any reservation restrictions for admins?'); ?></b><br><?php echo __('No, you can make and remove reservations back and forward in time as you wish, and you can delete other user\'s reservations. It will require a confirmation.'); ?></li>
<li><b><?php echo __('How do I manage users and reservations?'); ?></b><br><?php echo __('You can do that in the'); ?> <a href="#cp"><?php echo __('control panel'); ?></a>. <?php echo __('You can reset a user\'s passwords (if the user has forgot it), change a user\'s permissions (admin or not), delete a user\'s reservations and delete a user. Just pick a user and choose what to do. All the red buttons will require a confirmation.'); ?></li>
<li><b><?php echo __('Can I delete all users and reservations?'); ?></b><br><?php echo __('You can do that in the'); ?> <a href="#cp"><?php echo __('control panel'); ?></a>. <?php echo __('Your user and reservations will not be deleted unless you choose to delete everything.'); ?></li>
<li><b><?php echo __('How do I change the other options, like possible reservation times, secret code etc?'); ?></b><br><?php echo __('The webmaster must do that in the configuration file (config.php).'); ?></li>
<li><b><?php echo __('Will changing the price affect previous reservations?'); ?></b><br><?php echo __('No. A new price will only apply for reservations made after the price change.'); ?></li>
</ul>

<?php

}

?>

</div></div>
