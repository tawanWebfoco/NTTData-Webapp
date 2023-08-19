<?php
session_start();
loadModel('Login');

$user = ($_SESSION) ? $_SESSION['user'] : null;
if(isset($user)){
    header('Location: app');
    exit();
}else{

    $exception = null;
if(count($_POST) > 0){
    $login = new Login($_POST);

    try{
        $user = $login->checkLogin();
        $_SESSION['user'] = $user;
        header("Location: app");
    }catch(AppException $e) {
        $exception=  $e;
    }
}

loadView('login', $_POST  + ['exception' => $exception]);
}