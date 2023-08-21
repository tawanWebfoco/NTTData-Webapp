<?php 
session_start();
requireValidSession();

$user = ($_SESSION) ? $_SESSION['user'] : null;
$date = time();
$today = date("Y-m-d H:i:s", $date);

$page = isset(parse_url($_SERVER['REQUEST_URI'])['query']) ? parse_url($_SERVER['REQUEST_URI'])['query'] : 'feed';

require(CONTROLLER_PATH . "/$page/$page.php");