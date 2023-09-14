<?php
// session_start();
Model::sanetizePost($_POST);

include_once(LANGUAGES_PATH.'/common.php');


// Capturar json com array de todos os países
// Lê o conteúdo do arquivo JSON
$jsonString = file_get_contents(CONTROLLER_PATH .'/paises_simples_'._t['registro_tr_countries'].'.json');

// Converte o JSON em um array associativo
$countryArray = json_decode($jsonString, true);

// id do colaborador que convidou
$invited = (isset($_GET[md5('invited')])) ? $_GET[md5('invited')] : null;
$invited = intval($invited);

// email do convidado
$email = (isset($_GET[md5('email')])) ? $_GET[md5('email')] : null;
// $email = sanitize_text_field($email);

// id validação do formulário
$validationId = (isset($_GET[md5('validationId')])) ? $_GET[md5('validationId')] : null; 
// $validationId = sanitize_text_field($validationId);

// tipo registro colaborador / convidado 
$regType = (isset($_GET[md5('regType')])) ? $_GET[md5('regType')] : null; 
$regType = sanitize_text_field($regType);

$twoFactors = null;

// mensagem enviada colaborador / convidado 
$twoFactors = (isset($_GET[md5('twofactors')])) ? $_GET[md5('twofactors')] : null; 
$twoFactors = sanitize_text_field($twoFactors);


$exception = null;


if($regType == md5('convidado')){
    if(!$invited || !$email || !$validationId || !$regType) {
        header("Location: app"); 
        die('Error: Link not Found ');
    }

    if(count($_POST) > 0){
        $_POST['validationId'] = $validationId;
        $_POST['password'] = md5($_POST['password']);
        $language = strtolower($_POST['country']);
        $lang= '';
        switch ($language) {
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
        $_POST['language'] = $lang;
        $_POST['confirmPassword'] = md5($_POST['confirmPassword']);
       
        $register = new Guest($_POST);
        try{
    
            $id_guest = $register->register();
            $user = Guest::getOne(['id_guest' => $id_guest]);
            $_SESSION['session_id'] = session_id();
            $_SESSION['user'] = serialize($user);
            usleep(300000); // 500000 microssegundos = 500 milissegundos
            header("Location:".home_url().'/app');
        }catch(AppException $e) {
            $exception=  $e;
        }
    
    }
    loadView('register/cnvRegister', $_POST  + ['exception' => $exception, 'invited' => $invited, 'countryArray'=> $countryArray]);


}else{

    if(count($_POST) > 0){
        // print_r($_POST);

        
        $_POST['password'] = md5($_POST['password']);
        $_POST['confirmPassword'] = md5($_POST['confirmPassword']);

        $language = strtolower($_POST['country']);
        
        $_POST['language']= '';

        switch ($language) {
            case 'brasil':
                $_POST['language'] = 'pt';
                break;
            case 'usa':
            case 'estados unidos':
                $_POST['language'] = 'en';
                break;
            default:
                $_POST['language'] = 'es';
                break;
        }
       
        try {
            $register = new User($_POST);
            // $register->validateLogin();
         
            $id_user = $register->register();
            $user = User::getOne(['id_user' => $id_user]);
            $_SESSION['session_id'] = session_id();
            $_SESSION['user'] = serialize($user);

            $subject = _t['registro_sendEmailExistSubject'];
         
            $message =_t['registro_sendEmailForValidate'];
           
            $headers = array('Content-Type: text/html; charset=UTF-8');
            
            // Envia o email
            $sendEmail = wp_mail($_POST['email'], $subject, $message, $headers);
                usleep(500000); // 500000 microssegundos = 500 milissegundos
                header("Location:app");
            
        }catch(AppException $e) {
            $exception=  $e;
        }
        }




loadView('register/clbRegister', $_POST  + ['exception' => $exception, 'twoFactors' => $twoFactors, 'countryArray'=> $countryArray]);
}

