<?php

function requireValidSession(){
    $user = ($_SESSION) ? unserialize($_SESSION['user']) : null;
    $user->password = null;
    // $session_id = ($_SESSION) ? $_SESSION['session_id'] : null;
    
    if (!isset($user)) {
        getUserJs();
        $user = ($_SESSION) ? unserialize($_SESSION['user']) : null;
        $user->password = null;
        if (!isset($user)) {
            // usleep(1000000); // 500000 microssegundos = 500 milissegundos
        // header('Location: login');
        exit();
        }
    }
}


