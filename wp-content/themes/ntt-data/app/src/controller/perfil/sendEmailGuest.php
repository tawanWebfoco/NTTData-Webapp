<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') :
   if(isset($_POST)):
      foreach ($_POST['email'] as $key => $email) {
         
         $subject = 'Participe da ODS junto com a NTT DATA';
         $message = 'Conteúdo do Email ';
         $headers = array('Content-Type: text/html; charset=UTF-8');
   
         // Envia o email
         $result = wp_mail($email, $subject, $message, $headers);
   
         if ($result) {
            $messageTemplate['sendEmail']['status'] = 'success';
            $messageTemplate['sendEmail']['message'] = 'Email enviado com sucesso.';
         } else {
            $messageTemplate['sendEmail']['status'] = 'error';
            $messageTemplate['sendEmail']['message'] = 'Erro ao enviar o email.';
         }
      }
   endif;
endif;
