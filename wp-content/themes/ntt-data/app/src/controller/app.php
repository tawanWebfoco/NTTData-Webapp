<?php 
session_start();
requireValidSession();

$user = ($_SESSION) ? $_SESSION['user'] : null;
$date = (new DateTime())->getTimeStamp();
$today = strftime('%d de %B de %Y', $date);

// print_r($_POST);
// print_r($_FILES);

// if($_POST['page'] == 'perfil'){
//     echo 'oi';
// }



loadTempalteView('app',  ['user' => $user, 'today' => $today]);