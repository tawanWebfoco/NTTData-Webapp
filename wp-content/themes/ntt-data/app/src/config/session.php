<?php

function requireValidSession(){
    $user = ($_SESSION) ? $_SESSION['user'] : null;
    $session_id = ($_SESSION) ? $_SESSION['session_id'] : null;

    if (!isset($user)) {
        header('Location: login');
        exit();
    }
}


