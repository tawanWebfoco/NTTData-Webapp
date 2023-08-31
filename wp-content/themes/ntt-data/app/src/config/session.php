<?php

function requireValidSession(){
    $user = ($_SESSION) ? $_SESSION['user'] : null;
    if (!isset($user) && $_SESSION['session_id'] != session_id()) {
        header('Location: login');
        exit();
    }
}
