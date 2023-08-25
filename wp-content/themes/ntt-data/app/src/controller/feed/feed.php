<?php 
Model::sanetizePost($_POST);
$type = isset($_POST['type']) ? $_POST['type'] : '';

$latestPub = Pub::get([],'*','DESC','',10);



switch ($type) {
    case 'pub':
            require(CONTROLLER_PATH . "/$page/pub.php");
        break;
 }


loadTempalteView($page,  ['user' => $user, 'latestPub' => $latestPub]);