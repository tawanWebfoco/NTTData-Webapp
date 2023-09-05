<?php 
// session_start();
requireValidSession();
$user = !empty($_SESSION) ? $_SESSION['user'] : null;

print_r($user);

// $page = isset($_GET['p']) ? $_GET['p'] : 'cron';

// switch ($page) {
//    case !'feed':
//    case !'cron':
//    case !'perfil':
//    case !'rank':
//       # code...
//       $page = 'cron';
//       break;
// }

// require(CONTROLLER_PATH . "/$page/$page.php");