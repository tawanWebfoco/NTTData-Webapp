<?php

function requireValidSession(){
    $user = ($_SESSION) ? $_SESSION['user'] : null;
    // $session_id = ($_SESSION) ? $_SESSION['session_id'] : null;
    
    if (!isset($user)) {
        getUserJs();
        $user = ($_SESSION) ? $_SESSION['user'] : null;
        if (!isset($user)) {
            // usleep(1000000); // 500000 microssegundos = 500 milissegundos
        // header('Location: login');
        exit();
        }
    }
}


