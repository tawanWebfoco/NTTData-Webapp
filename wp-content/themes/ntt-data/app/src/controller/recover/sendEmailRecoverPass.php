<?php 

function generateUrl($id_user, $email, $validationId, $regType){
   $url = home_url();
   $message = "$url/updatepass?";
   $message .= md5('id_user') . "=" . $id_user . "&";
   $message .= md5('email') . "=" . md5($email) . "&";
   $message .= md5('validationId') . "=$validationId&";
   $message .= md5('regType') . "=". md5($regType)."&";
   $message .= md5('time') . "=".time();
   return $message;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') :
   if(isset($_POST)):
      $email = $_POST['email'];

      $user = User::getOne(['email' => $email]) ;

      if(!isset($user)){
      $user = Guest::getOne(['email' => $email]) ; 
      }

         if( !( isset($user) )){
            $errors['sendEmail'] = 'Email não cadastrado.';
         }else{

         // $type = 'convidado';
         $regType = 'convidado';
         if(get_class($user) === 'User'){ 
            $regType = 'colaborador';
         }

         // if(Model::validarEmailNTTDataWebfoco($email)){
         //   $type = 'colaborador';
         // }
        
         $validationId = Model::validationId($email);
         $subject = 'Redefina sua senha NTT DATA';
         
         $message = 'Redefina sua senha através do link abaixo.';
         $message .= '<br>';
         $message .= "<a href='";
         $message .= generateUrl($user->id_user, $email, $validationId, $regType);
         $message .= "'>";
         $message .= "Link de redefinição";
         $message .= '<a>';
         $message .= '<br>';
         $message .= '<br>';
         $message .= 'Se você não solicitou a redefinição ignore esta mensagem.';
         
         $headers = array('Content-Type: text/html; charset=UTF-8');
         
         // Envia o email
         $result = wp_mail($email, $subject, $message, $headers);

         if ($result) {
            $success['sendEmail']['status'] = 'success';
            $success['sendEmail']['message'] = 'Email enviado com sucesso.';
           
            $update = [
                'id_user' => $user->id_user,
                'primary_key' => $user->id_user,
                'validation' => $validationId
            ];
            if(get_class($user) === 'User'){ 
       
               $update = new User($update);
           }elseif( get_class($user) === 'Guest'){
               $update = [
                   'id_guest' => $user->id_guest,
                   'primary_key' => $user->id_guest,
                   'validation' => $validationId
               ];
       
               $update = new Guest($update);
           }
           if($update->id_user) {
            $update->update();
            }else{
               $errors['sendEmail'] = 'Processo de refinição incompleto.';
            }


            header("Location:".home_url()."/recover?".md5('invited').'='.true);
            // $url = home_url();
            // $url .= '/app?p=perfil';
            // $url .= '&' . md5('invited') . '=true' ;
            // usleep(500000); // 500000 microssegundos = 500 milissegundos
            // header("Location:$url");

         } else {
            $errors['sendEmail'] = 'Email não cadastrado.';
         }
      }
   endif;
endif;

if(isset($errors)) {
   $exception=  new ValidationException($errors,'Desculpe não foi possível enviar o e-mail ');
}