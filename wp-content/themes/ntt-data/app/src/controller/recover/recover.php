<?php 
Model::sanetizePost($_POST);
// $messageTemplate = [];

// $guest  = Guest::get(['id_user' => $user->id_user], 'full_name, score');

// verifica se imagens de perfil e chama arquivo que realiza a troca
$type = isset($_POST['type']) ? $_POST['type'] : '';
$exception = null;
// $invited = isset($_GET[md5('invited')]) ? $_GET[md5('invited')] : false;



// if($invited){
//     $messageTemplate['sendEmail']['status'] = 'success';
//     $messageTemplate['sendEmail']['message'] = 'Email enviado com sucesso.';
// }


switch ($type) {
    case md5('recover'):
            require(CONTROLLER_PATH . "/recover/sendEmailRecoverPass.php");
            die;
        break;
    // case 'personalImg':
    //         require(CONTROLLER_PATH . "/$page/uploadImg.php");
    //     break;
    // case 'guest':
    //         require(CONTROLLER_PATH . "/$page/sendEmailGuest.php");
        // break;
    
 }

 loadView('recover/recover', $_POST + ['exception' => $exception]);


