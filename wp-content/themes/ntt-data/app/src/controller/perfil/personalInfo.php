<?php

$full_name = sanitize_text_field($_POST['full_name']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(get_class($user) === 'User'){ 
        $update = [
            'id_user' => $_SESSION['user']->id_user,
            'primary_key' => $_SESSION['user']->id_user,
            'full_name' => $full_name
        ];

        $update = new User($update);
    }elseif( get_class($user) === 'Guest'){
        $update = [
            'id_user' => $_SESSION['user']->id_guest,
            'primary_key' => $_SESSION['user']->id_guest,
            'full_name' => $full_name
        ];

        $update = new Guest($update);
    }
       
        if($update->id_user) {
            $update->update();
            $user->full_name =  $full_name;
        }
        $url = home_url();
        $url .= '/app?p=perfil';
        usleep(500000); // 500000 microssegundos = 500 milissegundos
        header("Location:$url");
        exit();
}