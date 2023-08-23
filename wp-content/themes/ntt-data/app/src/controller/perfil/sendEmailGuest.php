<?php 


function generateUrl($user, $email, $validationId){
   $url = home_url();
   $message = "$url/register?";
   $message .= md5('invited') . "=$user->id_user&";
   $message .= md5('email') . "=" . md5($email) . "&";
   $message .= md5('validationId') . "=$validationId&";
   $message .= md5('regType') . "=" . md5('colaborador');
   return $message;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') :
   if(isset($_POST)):
      foreach ($_POST['email'] as $key => $email) {
         $validationId = Model::validationId($email);
         $subject = 'Participe da ODS junto com a NTT DATA';
         
         $message = 'Conteúdo do Email ';
         $message .= '<br>';
         $message .= '<br>';
         $message .= generateUrl($user, $email, $validationId);
         
         $headers = array('Content-Type: text/html; charset=UTF-8');
         
         // Envia o email
         $result = wp_mail($email, $subject, $message, $headers);
         
         if ($result) {
            $messageTemplate['sendEmail']['status'] = 'success';
            $messageTemplate['sendEmail']['message'] = 'Email enviado com sucesso.';
            Model::saveInvitationsSent([$email, date('Y-m-d'), $user->id_user, 'colaborador',$validationId]);
         } else {
            $messageTemplate['sendEmail']['status'] = 'error';
            $messageTemplate['sendEmail']['message'] = 'Erro ao enviar o email.';
         }
      }
   endif;
endif;
