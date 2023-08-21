<?php

function requireValidSession(){
    $user = ($_SESSION) ? $_SESSION['user'] : null;
    if(!isset($user)){
        header('Location: login');
        exit();
    }
}