<?php 
session_start();
requireValidSession();

$user = ($_SESSION) ? $_SESSION['user'] : null;

// $page = isset(parse_url($_SERVER['REQUEST_URI'])['query']) ? parse_url($_SERVER['REQUEST_URI'])['query'] : 'feed';
$page = isset($_GET['p']) ? $_GET['p'] : 'feed';
switch ($page) {
   case !'feed':
   case !'cron':
   case !'perfil':
   case !'rank':
      # code...
      break;
}

require(CONTROLLER_PATH . "/$page/$page.php");