<?php
// require_once(dirname(__FILE__,2) . '/app/src/config/config.php');
/* Descobrir língua */
$user = ($_SESSION) ? unserialize($_SESSION['user']) : null;

$lang = '';
if ( empty($user) || $user == null ) {
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
} else {
    $language = strtolower($user->language);
    
    if($language == null || empty($language) || !isset($language)){
        $country = strtolower($user->country);
        switch ($country) {
            case 'brasil':
                $language = 'pt';
                break;
            case 'usa':
            case 'estados unidos':
                $language = 'en';
                break;
            default:
                $language = 'es';
                break;
                }
            } 
    

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