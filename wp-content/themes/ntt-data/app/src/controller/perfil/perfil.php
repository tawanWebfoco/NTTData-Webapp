<?php 
$messageTemplate = [];
$guest  = Guest::get(['id_user' => $user->id_user], 'full_name, score');

// verifica se imagens de perfil e chama arquivo que realiza a troca
$type = isset($_POST['type']) ? $_POST['type'] : '';

switch ($type) {
    case 'personalInfo':
            require(CONTROLLER_PATH . "/$page/personalInfo.php");
        break;
    case 'personalImg':
            require(CONTROLLER_PATH . "/$page/uploadImg.php");
        break;
    case 'guest':
            require(CONTROLLER_PATH . "/$page/sendEmailGuest.php");
        break;
    
 }

 loadTempalteView($page,  ['user' => $user, 'guest' => $guest, 'message' => $messageTemplate]);