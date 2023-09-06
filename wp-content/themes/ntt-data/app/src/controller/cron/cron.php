<?php 

$id = $user->id_user;
$typeUser = get_class($user);

if($typeUser === 'Guest') $id = $user->id_guest;

   $sql_get_score_from_current_date = "SELECT SUM(score) as score FROM wp_app_time WHERE id_user = $id AND typeUser = '$typeUser' AND DATE(date) = CURDATE();";

 $currentTimeFromDb =  Connection::one($sql_get_score_from_current_date)['score'];


loadTempalteView($page,  ['user' => $user, 'currentTimeFromDb' => $currentTimeFromDb]);