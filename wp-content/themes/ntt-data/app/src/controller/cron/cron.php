<?php 

$sql_get_score_from_current_date = "SELECT SUM(score) as score FROM wp_app_time WHERE id_user = $user->id_user AND DATE(date) = CURDATE();";

 $currentTimeFromDb =  Connection::one($sql_get_score_from_current_date)['score'];


loadTempalteView($page,  ['user' => $user, 'currentTimeFromDb' => $currentTimeFromDb]);