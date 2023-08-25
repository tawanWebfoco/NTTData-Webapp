<?php


if(empty($_FILES['arquivoVideo']['error'])){
    $files =  $_FILES['arquivoVideo'];
}elseif(empty($_FILES['arquivoImg']['error'])){
    $files =  $_FILES['arquivoImg'];
}

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   // Certifique-se de que o campo de arquivo existe no POST

   $pubData = [];
   $imgData = [];

   if (isset($files)) {
      // Verifica o tamanho máximo permitido (em bytes)
      $max_file_size = 1 * 1024 * 1024; // 1 MB
      // Verifica o tamanho do arquivo carregado
      if ($files['size'] <= $max_file_size) {
         // Resto do código para upload da imagem

         // Caminho para a pasta onde as imagens serão armazenadas
         $upload_dir = wp_upload_dir();

         // Nome original do arquivo
         $original_filename = $files['name'];
         $file_extension = pathinfo($original_filename, PATHINFO_EXTENSION);

         // Gere um nome único baseado no timestamp atual
         $unique_filename = time() . '.' . $file_extension;

         // Caminho completo para o arquivo com nome único
         $upload_file = $upload_dir['path'] . '/' . $unique_filename;

         // Move o arquivo temporário para o local desejado

        $imgData['upload_file'] = $upload_file;
        $imgData['original_filename'] = $original_filename;
        $imgData['upload_dir'] = $upload_dir;

      } else {
         $messageTemplate['insertFeed']['status'] = 'error';
         $messageTemplate['insertFeed']['message'] = 'O tamanho da imagem excede o limite permitido.';
      }
   } 


   function sendImgForDb( $files, $upload_file, $original_filename, $upload_dir){  
    if (move_uploaded_file($files['tmp_name'], $upload_file)) {
       // Dados para a nova mídia
       $attachment = array(
          'guid' => $upload_dir['url'] . '/' . $original_filename,
          'post_mime_type' => $files['type'],
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


       return $image_info;
    } else {
       $messageTemplate['insertFeed']['status'] = 'error';
       $messageTemplate['insertFeed']['message'] = 'Erro ao enviar a imagem.';
    }

   }

if($_SESSION['user']->id_user){

    $pubData['id_user'] = $_SESSION['user']->id_user;
    $pubData['message'] = $_POST['textareaPub'];
    $pubData['date'] = str_replace('=','T',date('Y-m-d=H:i:s'));
    

    if(isset($imgData['upload_file'])){
        $pubData['file'] = sendImgForDb($files, $imgData['upload_file'], $imgData['original_filename'], $imgData['upload_dir']);
    }

    $publication = new Pub($pubData);

    $publication->insert();
    $url = home_url();
    $url .= '/app?p=feed';
    header("Location:$url");

}else{
    $messageTemplate['insertFeed']['status'] = 'error';
    $messageTemplate['insertFeed']['message'] = 'Não foi possível enviar sua publicação';
}
}
