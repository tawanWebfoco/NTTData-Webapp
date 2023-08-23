<?php
session_start();
Model::sanetizePost($_POST);
// id do colaborador que convidou
$invited = (isset($_GET[md5('invited')])) ? $_GET[md5('invited')] : null;
// email do convidado
$email = (isset($_GET[md5('email')])) ? $_GET[md5('email')] : null;
// id validação do formulário
$validationId = (isset($_GET[md5('validationId')])) ? $_GET[md5('validationId')] : null; 
// tipo registro colaborador / convidado 
$regType = (isset($_GET[md5('regType')])) ? $_GET[md5('regType')] : null; 

$exception = null;

if(!$invited || !$email || !$validationId || !$regType) exit();


if(count($_POST) > 0){
    
    $register = new User($_POST);

    try{
        $id_user = $register->register();
        $user = User::getOne(['id_user' => $id_user]);
        $_SESSION['user'] = $user;
        header("Location: app");
    }catch(AppException $e) {
        $exception=  $e;
    }
}


loadView('register/clbRegister', $_POST  + ['exception' => $exception]);

switch ($regType) {
    case md5('colaborador'):
        # code...
        break;
        case md5('convidado'):
            loadView('register/cnvRegister', $_POST  + ['exception' => $exception]);
        # code...
        break;
}

