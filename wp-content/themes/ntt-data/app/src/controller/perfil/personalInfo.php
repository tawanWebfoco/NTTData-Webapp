<?php

$full_name = sanitize_text_field($_POST['full_name']);
$language = sanitize_text_field($_POST['language']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(get_class($user) === 'User'){ 
        $update = [
            'id_user' => $user->id_user,
            'primary_key' => $user->id_user,
            'full_name' => $full_name,
            'language' => $language
        ];

        $update = new User($update);
    }elseif( get_class($user) === 'Guest'){
        $update = [
            'id_user' => $user->id_guest,
            'primary_key' => $user->id_guest,
            'full_name' => $full_name,
            'language' => $language
        ];

        $update = new Guest($update);
    }
        if($update->id_user) {
            $update->update();
            $user->full_name =  $full_name;
            $user->language = $language;
            $_SESSION['user'] = serialize($user);
        }
     ;
        $url = home_url();
        $url .= '/app?p=perfil';
        // usleep(1000000); // 500000 microssegundos = 500 milissegundos
        echo "<script>window.location.href = '$url'</script>";
        // header("Location:$url");
        // exit();
}