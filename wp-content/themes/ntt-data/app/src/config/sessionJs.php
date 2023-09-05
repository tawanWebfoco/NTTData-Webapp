<?php
require_once(dirname(__FILE__, 2) . '/config/config.php');
session_start();
// requireValidSession();
require_once(dirname(__FILE__,7) . '/wp-config.php');

$dataJSON = file_get_contents("php://input");

$data = json_decode($dataJSON, true);

$user = null;
if($data['type'] == 'User'){
   $user = User::getOne(['id_user' => $data['id_user']]);
}elseif ($data['type'] == "Guest") {
   $user = Guest::getOne(['id_guest' => $data['id_user']]);
}

if($user){
   $_SESSION['user'] = $user;
}
