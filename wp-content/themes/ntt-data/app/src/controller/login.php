<?php
session_start();
// session_id($session_id);
loadModel('Login');

$user = ($_SESSION) ? $_SESSION['user'] : null;
if (isset($user)) {
    header('Location: app');
    exit();
} else {
      
    $exception = null;
    if (count($_POST) > 0) {
        $_POST['password'] = md5($_POST['password']);
        $login = new Login($_POST);

        try {
            
            $user = $login->checkLogin();
            // $_SESSION['session_id'] = session_id();
            $_SESSION['user'] = $user;
            userLoginJS($user);
            // getUserJs();
            // session_regenerate_id();
            usleep(500000); // 500000 microssegundos = 500 milissegundos
            // header("Location: app?p=feed");
        } catch (AppException $e) {
            $exception = $e;
        }
    }

    loadView('login', $_POST + ['exception' => $exception ]);
}