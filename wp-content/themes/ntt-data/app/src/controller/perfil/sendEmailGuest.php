<?php 


function generateUrl($user, $email, $validationId){
   $url = home_url();
   $message = "$url/register?";
   $message .= md5('invited') . "=$user->id_user&";
   $message .= md5('email') . "=" . md5($email) . "&";
   $message .= md5('validationId') . "=$validationId&";
   $message .= md5('regType') . "=" . md5('convidado');
   return $message;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') :
   if(isset($_POST)):
      foreach ($_POST['email'] as $key => $email) {
         if( User::getOne(['email' => $email]) ||  Guest::getOne(['email' => $email])){
            $messageTemplate['sendEmail']['status'] = 'error';
            $messageTemplate['sendEmail']['message'] = 'Email já está cadastrado.';
            continue;
         }

         $type = 'convidado';

         if(Model::validarEmailNTTDataWebfoco($email)){
           $type = 'colaborador';
         }
        
         $validationId = Model::validationId($email);
         $subject = 'NTT DATA te convida a fazer parte! Mova-se pelos ODS!';
         
         $message .='<h2><b>Faça parte do grande movimento da NTT DATA</b></h2>';
         $message .= '<p>Tudo começa com um movimento. E queremos que você seja parte dessa iniciativa que visa unir mais uma vez nossa região em prol dos Objetivos de Desenvolvimento Sustentável da ONU.
         Nosso propósito é contribuir para uma sociedade melhor para todos, valorizando e apoiando as ações que promovem a saúde e o bem-estar físico e mental de todos.</p>';
         $message .= '<p>Corra, dance, pule, medite, brinque com os filhos no parque, faça esgrima, pádel, vôlei, jogue futebol com os colegas do trabalho, ande de skate, leve seu animal de estimação para passear... Movimente-se! Cuide do corpo e da mente, incentive o seu entorno a fazer o mesmo e participe da nossa ação!</p>';
         $message .= "<h3><a href='";
         $message .= generateUrl($user, $email, $validationId);
         $message .= "'>";
         $message .= "Registre-se";
         $message .= '<a></h3>';
         
         $headers = array('Content-Type: text/html; charset=UTF-8');
         
         // Envia o email
         $result = wp_mail($email, $subject, $message, $headers);

         
         
         if ($result) {
            $messageTemplate['sendEmail']['status'] = 'success';
            $messageTemplate['sendEmail']['message'] = 'Email enviado com sucesso.';
            Model::saveInvitationsSent([$email,  date('Y-m-d-H') . 'h', $user->id_user, $type ,$validationId]);
            header('Location: app?p=perfil&invited');
            $url = home_url();
            $url .= '/app?p=perfil';
            $url .= '&' . md5('invited') . '=true' ;
            usleep(500000); // 500000 microssegundos = 500 milissegundos
            header("Location:$url");
         } else {
            $messageTemplate['sendEmail']['status'] = 'error';
            $messageTemplate['sendEmail']['message'] = 'Erro ao enviar o email.';
         }
      }
   endif;
endif;
