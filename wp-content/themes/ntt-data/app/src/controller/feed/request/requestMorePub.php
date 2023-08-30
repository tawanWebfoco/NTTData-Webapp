<?php
require_once(dirname(__FILE__, 4) . '/config/config.php');
session_start();
requireValidSession();
require_once(dirname(__FILE__,9) . '/wp-config.php');

include_once get_template_directory() . '/languages/common.php';

$dataJSON = file_get_contents("php://input");
$data = json_decode($dataJSON, true);
$pubView = unserialize($_SESSION['pubView']);

$latestPub = $pubView->getPub([],'*','id_pub DESC','',5);
if(count($latestPub) > 0){
   $arrayIdPubView = array_map(function($latestPub){
      return $latestPub->id_pub;
   }, $latestPub);
   
   
   $pubView->setArrayIdPubView($arrayIdPubView);
   $_SESSION['pubView'] = serialize($pubView);
   $user = $_SESSION['user'];
   
   
   
   include(dirname(__FILE__,4) .'/view/feed/includes/pub-area.php');
}else{
   echo '<div id="hasPub" class="invalid-feedback" haspub="false"></div>';
}



