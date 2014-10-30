<?php

include_once('main.php');

if(check_login() != true) { exit; }

if(isset($_GET['make_reservation']))
{
	$week = mysql_real_escape_string($_POST['week']);
	$day = mysql_real_escape_string($_POST['day']);
	$time = mysql_real_escape_string($_POST['time']);
	echo make_reservation($week, $day, $time);
}
elseif(isset($_GET['delete_reservation']))
{
	$week = mysql_real_escape_string($_POST['week']);
	$day = mysql_real_escape_string($_POST['day']);
	$time = mysql_real_escape_string($_POST['time']);
	echo delete_reservation($week, $day, $time);
}
elseif(isset($_GET['read_reservation']))
{
	$week = mysql_real_escape_string($_POST['week']);
	$day = mysql_real_escape_string($_POST['day']);
	$time = mysql_real_escape_string($_POST['time']);
	echo read_reservation($week, $day, $time);
}
elseif(isset($_GET['read_reservation_details']))
{
	$week = mysql_real_escape_string($_POST['week']);
	$day = mysql_real_escape_string($_POST['day']);
	$time = mysql_real_escape_string($_POST['time']);
	echo read_reservation_details($week, $day, $time);
}
elseif(isset($_GET['week']))
{
	$week = $_GET['week'];

	echo '<table id="reservation_table"><colgroup span="1" id="reservation_time_colgroup"></colgroup><colgroup span="7" id="reservation_day_colgroup"></colgroup>';

	$days_row = '<tr><td id="reservation_corner_td"><input type="button" class="blue_button small_button" id="reservation_today_button" value="'.__('Today').'"></td><th class="reservation_day_th">'.__('Monday').'</th><th class="reservation_day_th">'.__('Tuesday').'</th><th class="reservation_day_th">'.__('Wednesday').'</th><th class="reservation_day_th">'.__('Thursday').'</th><th class="reservation_day_th">'.__('Friday').'</th><th class="reservation_day_th">'.__('Saturday').'</th><th class="reservation_day_th">'.__('Sunday').'</th></tr>';

	if($week == global_week_number)
	{
		echo highlight_day($days_row);
	}
	else
	{
		echo $days_row;
	}

	foreach($global_times as $time)
	{
		echo '<tr><th class="reservation_time_th">' . $time . '</th>';

		$i = 0;

		while($i < 7)
		{
			$i++;

			echo '<td><div class="reservation_time_div"><div class="reservation_time_cell_div" id="div:' . $week . ':' . $i . ':' . $time . '" onclick="void(0)">' . read_reservation($week, $i, $time) . '</div></div></td>';
		}

		echo '</tr>';
	}

	echo '</table>';
}
else
{
	echo '</div><div class="box_div" id="reservation_div"><div class="box_top_div" id="reservation_top_div"><div id="reservation_top_left_div"><a href="." id="previous_week_a">&lt; '.__('Previous week').'</a></div><div id="reservation_top_center_div">'.__('Reservations for week').' <span id="week_number_span">' . global_week_number . '</span></div><div id="reservation_top_right_div"><a href="." id="next_week_a">'.__('Next week').' &gt;</a></div></div><div class="box_body_div"><div id="reservation_table_div"></div></div></div><div id="reservation_details_div">';
}

?>
