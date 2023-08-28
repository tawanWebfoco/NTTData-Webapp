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
    switch ($user->country) {
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
/* Escolher artquivo de língua */
/*switch ($lang) {
    case 'pt':
        $lang_arq = 'lang.pt.php';
        break;
    case 'en':
        $lang_arq = 'lang.en.php';
        break;
    default:
        $lang_arq = 'lang.es.php';
        break;
}*/
/* Incluir arquivo com Strings na linguagem do país */
include_once 'lang.'.$lang.'.php';