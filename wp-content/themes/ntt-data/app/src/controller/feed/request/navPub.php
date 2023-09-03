<?php
require_once(dirname(__FILE__, 4) . '/config/config.php');
session_start();
requireValidSession();
require_once(dirname(__FILE__,9) . '/wp-config.php');

$dataJSON = file_get_contents("php://input");

$data = json_decode($dataJSON, true);

if($data['type'] === 'deletePub'){
   $data['trash'] = true;
   $data['primary_key'] = $data['id_pub'];
   $pubDb = new Pub($data);
   $pubDb->validateDelete();
   // print_r($pubDb);
   $pubDb->update();
}elseif ($data['type'] === 'deleteComment') {
   $data['trash'] = true;
   $data['primary_key'] = $data['id_comment'];
   $pubDb = new Comment($data);
   $pubDb->validateDelete();
   $pubDb->update();
}
