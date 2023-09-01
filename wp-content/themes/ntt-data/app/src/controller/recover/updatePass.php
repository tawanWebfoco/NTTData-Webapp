<?php
session_start();
Model::sanetizePost($_POST);

// time
$time = (isset($_GET[md5('time')])) ? $_GET[md5('time')] : null;

// id do colaborador que convidou
$id_user = (isset($_GET[md5('id_user')])) ? $_GET[md5('id_user')] : null;
$id_user = intval($id_user);

// email do convidado
$email = (isset($_GET[md5('email')])) ? $_GET[md5('email')] : null;
$email = sanitize_text_field($email);

// tipo registro colaborador / convidado 
$regType = (isset($_GET[md5('regType')])) ? $_GET[md5('regType')] : null; 
$regType = sanitize_text_field($regType);

// id validação do formulário
$validationId = (isset($_GET[md5('validationId')])) ? $_GET[md5('validationId')] : null; 
// $validationId = sanitize_text_field($validationId);

$exception = null;

$validationTime = strtotime('+10 minutes', $time);

if(!$id_user || !$email || !$validationId || (time() > $validationTime) || !$regType) {
    header("Location:".home_url()."/recover?".md5('recover').'='.true);
    die('Error: Link not Found ');
}

if(count($_POST) > 0){
    $_POST['validationId'] = $validationId;
    $_POST['id_user'] = $id_user;
    $_POST['primary_key'] = $id_user;
    $_POST['validationId'] = $validationId;

    $_POST['password'] = md5($_POST['password']);
    $_POST['confirmPassword'] = md5($_POST['confirmPassword']);

    switch ($regType) {
        case md5('convidado'):
            $register = new Guest($_POST);
            try{
               $register->validateUpdatePass();
               $id_guest = $register->updatePass();
               $user = Guest::getOne(['id_guest' => $id_guest]);
               $_SESSION['session_id'] = session_id();
                $_SESSION['user'] = $user;
                usleep(300000); // 500000 microssegundos = 500 milissegundos
                header("Location:app");
            }catch(AppException $e) {
                $exception=  $e;
            }
            break;
            
         case md5('colaborador'):
            $register = new User($_POST);
            try{
               $register->validateUpdatePass();
               $register->updatePass();
               $user = User::getOne(['id_user' => $id_user]);
               $_SESSION['session_id'] = session_id();
                $_SESSION['user'] = $user;
                usleep(300000); // 500000 microssegundos = 500 milissegundos
                header("Location:app");
            }catch(AppException $e) {
                $exception=  $e;
                print_r($exception);
            }
            break;
    }

}

loadView('recover/updatePass', ['exception' => $exception]);