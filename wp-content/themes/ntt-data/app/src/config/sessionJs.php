<?php
session_start();
require_once(dirname(__FILE__, 2) . '/config/config.php');
// requireValidSession();
require_once(dirname(__FILE__,7) . '/wp-config.php');

$dataJSON = file_get_contents("php://input");

$data = json_decode($dataJSON, true);
$user = null;
if($data['type'] == 'User'){
   $user = User::getOne(['id_user' => $data['id_user']]);
}elseif ($data['type'] == "Guest") {
   $user = Guest::getOne(['id_guest' => $data['id_guest']]);
}
if($user){
   $_SESSION['user'] = serialize($user);
}
