<?php 


// verifica se imagens de perfil e chama arquivo que realiza a troca
$type = isset($_POST['type']) ? $_POST['type'] : '';
if($type == 'personalImg'){
    require(CONTROLLER_PATH . "/$page/uploadImg.php");
 }
 
if($type == 'personalInfo'){
    require(CONTROLLER_PATH . "/$page/personalInfo.php");
 }

 
 loadTempalteView($page,  ['user' => $user, 'today' => $today]);