<?php 
session_start();
requireValidSession();

$user = ($_SESSION) ? $_SESSION['user'] : null;
$date = (new DateTime())->getTimeStamp();
$today = strftime('%d de %B de %Y', $date);

// verifica se imagens de perfil foi trocada
if(isset($_POST['upload'])  == 'perfil'){
   require(CONTROLLER_PATH . '/uploadImg.php');
}



loadTempalteView('app',  ['user' => $user, 'today' => $today]);