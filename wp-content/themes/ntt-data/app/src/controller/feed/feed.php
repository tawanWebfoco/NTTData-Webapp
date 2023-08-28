<?php 
Model::sanetizePost($_POST);
$type = isset($_POST['type']) ? $_POST['type'] : '';
$pagination = isset($_GET['type']) ? $_GET['type'] : '';

$latestPub = new Pub('');
$pubs = $latestPub->getPub([],'*','DESC','',4);

$arrayIdPubView = array_map(function($pubs){
    return $pubs->id_pub;
}, $pubs);

$latestPub->setArrayIdPubView($arrayIdPubView);

$_SESSION['pubView'] = serialize($latestPub);


$exception = null;


switch ($type) {
    case 'pub':
            require(CONTROLLER_PATH . "/$page/pub.php");
        break;
 }

loadTempalteView($page,  ['user' => $user, 'latestPub' => $pubs, 'exception' => $exception]);