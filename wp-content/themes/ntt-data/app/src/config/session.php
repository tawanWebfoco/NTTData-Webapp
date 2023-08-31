<?php

function requireValidSession(){
    $user = ($_SESSION) ? $_SESSION['user'] : null;
    $session_id = ($_SESSION) ? $_SESSION['session_id'] : null;

    if (!isset($user) && $session_id != session_id()) {
        header('Location: login');
        exit();
    }
}


