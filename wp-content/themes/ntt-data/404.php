<?php 
    $language = isset($_POST['language']) ? $_POST['language'] : 'espanish' ;
    switch ($language) {
        case 'Português':
            $language = 'portuguese';
            break;
        
        case 'Español':
            $language = 'espanish';
            break;
        
        case 'English':
            $language = 'english';
            break;
        
        default:
            $language = 'espanish';
            break;
    }

    $page = 'page-home-' . $language . '.php';
    require_once($page);
