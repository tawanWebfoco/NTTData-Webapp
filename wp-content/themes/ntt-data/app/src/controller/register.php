<?php
session_start();
Model::sanetizePost($_POST);

// id do colaborador que convidou
$invited = (isset($_GET[md5('invited')])) ? $_GET[md5('invited')] : null;
$invited = intval($invited);

// email do convidado
$email = (isset($_GET[md5('email')])) ? $_GET[md5('email')] : null;
$email = sanitize_text_field($email);

// id validação do formulário
$validationId = (isset($_GET[md5('validationId')])) ? $_GET[md5('validationId')] : null; 
// $validationId = sanitize_text_field($validationId);

// tipo registro colaborador / convidado 
$regType = (isset($_GET[md5('regType')])) ? $_GET[md5('regType')] : null; 
$regType = sanitize_text_field($regType);

$exception = null;

if(!$invited || !$email || !$validationId || !$regType) {
    header("Location: app"); 
    die('Error: Link not Found ');
}

if(count($_POST) > 0){
    $_POST['validationId'] = $validationId;
    switch ($regType) {
        case md5('convidado'):
            // print_r($_POST);
            $register = new Guest($_POST);
            break;
            
            case md5('colaborador'):
            $register = new User($_POST);
            break;
    }

    try{
        $id_user = $register->register();
        $user = User::getOne(['id_user' => $id_user]);
        $_SESSION['user'] = $user;
        header("Location:app");
    }catch(AppException $e) {
        $exception=  $e;
    }
}



switch ($regType) {
    case md5('colaborador'):
            loadView('register/clbRegister', $_POST  + ['exception' => $exception, 'invited' => $invited]);
        break;
        case md5('convidado'):
            loadView('register/cnvRegister', $_POST  + ['exception' => $exception, 'invited' => $invited]);
        # code...
        break;
}

