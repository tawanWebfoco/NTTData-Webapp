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


if($regType == md5('convidado')){
    if(!$invited || !$email || !$validationId || !$regType) {
        header("Location: app"); 
        die('Error: Link not Found ');
    }

    if(count($_POST) > 0){
        $_POST['validationId'] = $validationId;
       
        $register = new Guest($_POST);
        try{
    
            $id_guest = $register->register();
            $user = Guest::getOne(['id_guest' => $id_guest]);
            
            $_SESSION['user'] = $user;
            usleep(500000); // 500000 microssegundos = 500 milissegundos
            header("Location:app");
        }catch(AppException $e) {
            $exception=  $e;
        }
    
    }
    loadView('register/cnvRegister', $_POST  + ['exception' => $exception, 'invited' => $invited]);


}else{

$regType = md5('colaborador');
if(count($_POST) > 0){
    $_POST['validationId'] = $validationId;
    $register = new User($_POST);
    try{

        $id_user = $register->register();
        $user = User::getOne(['id_user' => $id_user]);
        
        $_SESSION['user'] = $user;
        usleep(500000); // 500000 microssegundos = 500 milissegundos
        header("Location:app");
    }catch(AppException $e) {
        $exception=  $e;
        print_r($exception);
    }
}

loadView('register/clbRegister', $_POST  + ['exception' => $exception, 'invited' => $invited]);
}