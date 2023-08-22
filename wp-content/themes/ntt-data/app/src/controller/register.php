<?php
session_start();
// id do colaborador que convidou
$invited = ((isset($_GET['0f9642bcff1dc3cd224f1f3e2f1ca629'])) ? $_GET['0f9642bcff1dc3cd224f1f3e2f1ca629'] : null);
// email do convidado
$email = ((isset($_GET['0c83f57c786a0b4a39efab23731c7ebc'])) ? $_GET['0c83f57c786a0b4a39efab23731c7ebc'] : null);
// id validação do formulário
$validationId = ((isset($_GET['aba055ffcec3070533a8378b48bd7567'])) ? $_GET['aba055ffcec3070533a8378b48bd7567'] : null); 
// tipo registro colaborador / convidado 
$regType = ((isset($_GET['c3294cc5ca02391d653bd1cf0b8d4004'])) ? $_GET['c3294cc5ca02391d653bd1cf0b8d4004'] : null); 

$exception = null;

// if(!$invited || !$email || !$validationId || $regType) exit();


// print_r($_POST);



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

