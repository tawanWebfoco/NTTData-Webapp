<?php
/* Descobrir língua */
$user = array();
if ( isset($_SESSION['user']) ) {
    $user = $_SESSION['user'];
}
$lang = '';
if ( empty($user) || $user == null ) {
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
} else {
    $country = strtolower($user->coutry);
    switch ($country) {
        case 'brasil':
            $lang = 'pt';
            break;
        case 'usa':
            $lang = 'en';
            break;
        default:
            $lang = 'es';
            break;
    }
}
/* Incluir arquivo com Strings na linguagem do país */
include_once 'lang.'.$lang.'.php';

/*
    Modelo para tradução:
    <?=_t['id_da_string']?>
 */