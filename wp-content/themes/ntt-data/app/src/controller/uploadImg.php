<?php 

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   // Certifique-se de que o campo de arquivo existe no POST
   if (isset($_FILES['imagem'])) {

       // Verifica o tamanho máximo permitido (em bytes)
       $max_file_size = 1.5 * 1024 * 1024; // 2 MB
       // Verifica o tamanho do arquivo carregado
       if ($_FILES['imagem']['size'] <= $max_file_size) {
         // Resto do código para upload da imagem
         // ...
   
       // Caminho para a pasta onde as imagens serão armazenadas
       $upload_dir = wp_upload_dir();


        // Nome original do arquivo
        $original_filename = $_FILES['imagem']['name'];
        $file_extension = pathinfo($original_filename, PATHINFO_EXTENSION);

        // Gere um nome único baseado no timestamp atual
        $unique_filename = time() . '.' . $file_extension;

        // Caminho completo para o arquivo com nome único
        $upload_file = $upload_dir['path'] . '/' . $unique_filename;



       // Move o arquivo temporário para o local desejado
       if (move_uploaded_file($_FILES['imagem']['tmp_name'], $upload_file)) {
           // Dados para a nova mídia
           $attachment = array(
               'guid' => $upload_dir['url'] . '/' . $original_filename,
               'post_mime_type' => $_FILES['imagem']['type'],
               'post_title' => sanitize_text_field(preg_replace('/\.[^.]+$/', '', $original_filename)),
               'post_content' => '',
               'post_status' => 'inherit'
           );

           // Insere a mídia no banco de dados
           $attachment_id = wp_insert_attachment($attachment, $upload_file);

           // Atualiza metadados da mídia
           require_once(ABSPATH . 'wp-admin/includes/image.php');
           $attachment_data = wp_generate_attachment_metadata($attachment_id, $upload_file);
           wp_update_attachment_metadata($attachment_id, $attachment_data);


         $image_info = wp_get_attachment_image_url($attachment_id, 'full');

         if ($image_info) {
         
           $update = [
            'id_user' => $_SESSION['user']->id_user,
            'photo' => $image_info
           ];

           $updateUser = new User($update);

            if($updateUser->id_user) {
               $updateUser->update();
                  // addSuccessMsg('Usuário alterado com sucesso!');

                  $image_path = ABSPATH . str_replace(home_url(), '', $user->photo);
                  if (file_exists($image_path)) {
                     unlink($image_path); // Exclui o arquivo fisicamente
                  }
                  
                  $user->photo =  $image_info;

                  // wp_redirect(get_permalink()); // Redireciona para a mesma página
                  // exit();
            }
         }

       } else {
           echo 'Erro ao enviar a imagem.';
       }
      } else {
         echo 'O tamanho da imagem excede o limite permitido.';
     }
   } else {
       echo 'Campo de imagem não encontrado no formulário.';
   }
    
}