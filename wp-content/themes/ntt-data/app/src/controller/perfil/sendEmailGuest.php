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
         $message .= '<p>Olá!</p>';
         $message .= '<p>Você foi convidado a participar do "Mova-se Pelas ODS" uma ação em que colaboradores da NTT DATA e apoiadores como você se unem para contribuir com os Objetivos de Desenvolvimento Sustentável das Nações Unidas.</p>';
         $message .= '<p>O "Mova-se Pelas ODS" é uma demonstração do nosso compromisso com questões globais importantes, como igualdade, saúde, educação, meio ambiente e muito mais. Acreditamos que cada ação, não importa o quão pequena, pode criar um impacto positivo no mundo. É por isso que estamos convidando pessoas como você, que compartilham dos mesmos valores e desejam fazer a diferença, a se juntar a nós nesse movimento.</p>';
         $message .= '<p>Como parte deste movimento, realizamos uma série de atividades, incluindo eventos de conscientização, voluntariado, arrecadação de fundos e ações práticas que apoiam diretamente os ODS. Através da colaboração e do trabalho em equipe, acreditamos que podemos alcançar mudanças reais e significativas.</p>';
         $message .= '<p>Juntos, podemos "Mova-se Pelas ODS" e tornar nosso mundo um lugar melhor para as gerações futuras. Acesse nosso aplicativo  e '; 
         $message .= "<a href='";
         $message .= generateUrl($user, $email, $validationId);
         $message .= "'>";
         $message .= "Cadastre-se";
         $message .= '<a>';
         $message .= ' para começar a somar nessa jornada!'; 
         $message .= '<p>Saiba mais em nosso site oficial: <a href="https://moveforthesdg.com/">moveforthesdgs.com</a></p>'; 
         
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
