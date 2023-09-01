<?php
session_start();
Model::sanetizePost($_POST);

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
        $_POST['confirmPassword'] = md5($_POST['confirmPassword']);
       
        $register = new Guest($_POST);
        try{
    
            $id_guest = $register->register();
            $user = Guest::getOne(['id_guest' => $id_guest]);
            $_SESSION['session_id'] = session_id();
            $_SESSION['user'] = $user;
            usleep(300000); // 500000 microssegundos = 500 milissegundos
            header("Location:".home_url().'/app');
        }catch(AppException $e) {
            $exception=  $e;
        }
    
    }
    loadView('register/cnvRegister', $_POST  + ['exception' => $exception, 'invited' => $invited]);


}else{

if(isset($validationId)){
    // country do colaborador
        $country = (isset($_GET[md5('country')])) ? $_GET[md5('country')] : null;
        $country = sanitize_text_field($country);

    // office do colaborador
        $office = (isset($_GET[md5('office')])) ? $_GET[md5('office')] : null;
        $office = sanitize_text_field($office);

    // username do colaborador
        $username = (isset($_GET[md5('username')])) ? $_GET[md5('username')] : null;
        $username = sanitize_text_field($username);
        
    // full name do colaborador
        $full_name = (isset($_GET[md5('full_name')])) ? $_GET[md5('full_name')] : null;
        $full_name = sanitize_text_field($full_name);

        if(!$full_name || !$username || !$office || !$country) {
            $invalid = 'Erro de validação, envie um novo email';
            header("Location:".home_url()."/register?".md5('invalid').'='.$invalid); 
            die('Error: Link not Found ');
        }


    $compareDbRegister = (Model::getValidationId($email)) ? Model::getValidationId($email) : null;

    $dataRegister['full_name'] = $full_name;
    $dataRegister['email'] = $email;
    $dataRegister['username'] = $username;
    $dataRegister['password'] = $compareDbRegister->password;
    $dataRegister['country'] = $country;
    $dataRegister['office'] = $office;
    $dataRegister['validationId'] = $validationId;
    $dataRegister['confirmValidationDb'] = $compareDbRegister->validationId;
    $dataRegister['confirmEmail'] = $compareDbRegister->email;
    $dataRegister['confirmPassword'] = $compareDbRegister->password;

   
    $register = new User($dataRegister);
    try{
        $id_user = $register->register();
        $user = User::getOne(['id_user' => $id_user]);
        $_SESSION['session_id'] = session_id();
        $_SESSION['user'] = $user;
        usleep(500000); // 500000 microssegundos = 500 milissegundos
        header("Location:app");
    }catch(AppException $e) {
        $exception=  $e;
    }
}else{

    if(count($_POST) > 0){
    // if(!Model::validarEmailNTTDataWebfoco($_POST['email'])){
        try {
            $validation = new User($_POST);
            $validation->validateLogin();

 
    $generateValidationId = Model::validationId($_POST['email']);
    date_default_timezone_set('America/Sao_Paulo');
    $date = str_replace('=','T',date('Y-m-d=H:i:s'));
    Model::twoFactors([$_POST['email'],  $date , 'colaborador' ,$generateValidationId, $_POST['password'] ]);

    function generateUrl($validationId,$email,$username,$country,$full_name,$office){
        $url = home_url();
        $message = "$url/register?";
        $message .= md5('email') . "=$email&";
        $message .= md5('country') . "=$country&";
        $message .= md5('office') . "=$office&";
        $message .= md5('full_name') . "=$full_name&";
        $message .= md5('username') . "=$username&";
        $message .= md5('validationId') . "=$validationId";
        return $message;
     }

        $subject = 'Valide seu email para fazer parte! Mova-se pelos ODS!';
         
         $message ='<h2><b>Faça parte do grande movimento da NTT DATA</b></h2>';
         $message .= '<p>Valide seu email clicando no link abaixo!</p>';
         $message .= "<a href='";
         $message .= generateUrl($generateValidationId,$_POST['email'],$_POST['username'],$_POST['country'],$_POST['full_name'],$_POST['office']);
         $message .= "'>";
         $message .= "Validar.";
         $message .= '<a>';
         $message .= '<p>Saiba mais em nosso site oficial: <a href="https://moveforthesdg.com/">moveforthesdgs.com</a></p>'; 
         
         $headers = array('Content-Type: text/html; charset=UTF-8');
         
         // Envia o email
         $result = wp_mail($_POST['email'], $subject, $message, $headers);


         $successMenssage = 1;
         
         header("Location:".home_url()."/register?".md5('twofactors').'='.$successMenssage); 
}catch(AppException $e) {
    $exception=  $e;
}
}
}


loadView('register/clbRegister', $_POST  + ['exception' => $exception, 'twoFactors' => $twoFactors]);
}