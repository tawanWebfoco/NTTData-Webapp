<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// require_once(dirname(__FILE__,2) . '/app/src/config/config.php');
/* Descobrir língua */
$user = array();

if ( isset($_SESSION['user']) ) {
    $user = $_SESSION['user'];
}

$lang = '';
if ( empty($user) || $user == null ) {
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
} else {
    // print($_SESSION);
    $language = strtolower($user->language);
    switch ($language) {
        case 'pt':
            $lang = 'pt';
            break;
            case 'en':
                $lang = 'en';
                break;
                default:
                $lang = 'es';
                break;
            }
        }
        // $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
/* Incluir arquivo com Strings na linguagem do país */
include_once 'lang.'.$lang.'.php';

/*
    Modelo para tradução:
    <?=_t['id_da_string']?>
 */