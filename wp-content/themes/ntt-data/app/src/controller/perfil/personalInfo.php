<?php

$full_name = filter_var($_POST['full_name'], FILTER_SANITIZE_STRING);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $update = [
        'id_user' => $_SESSION['user']->id_user,
        'full_name' => $full_name
       ];

       $updateUser = new User($update);
       
        if($updateUser->id_user) {
            $updateUser->update();
            $user->full_name =  $full_name;
        }
        header('Location: app?perfil');
        exit();
}