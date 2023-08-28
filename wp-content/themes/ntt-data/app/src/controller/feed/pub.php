<?php


if(empty($_FILES['arquivoVideo']['error'])){
    $files =  $_FILES['arquivoVideo'];
    $files['typeFile'] = 'Vídeo';
   }elseif(empty($_FILES['arquivoImg']['error'])){
      $files =  $_FILES['arquivoImg'];
      $files['typeFile'] = 'Imagem';
}

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   // Certifique-se de que o campo de arquivo existe no POST

   $pubData = [];
   $imgData = [];
   
   
   if (isset($files)) {
      // print_r($files);
     
      // Verifica o tamanho máximo permitido (em bytes)
      if($files['typeFile'] === 'Vídeo') $max_file_size = 15 * 1024 * 1024;
      if($files['typeFile'] === 'Imagem') $max_file_size = 5 * 1024 * 1024;

      // Verifica o tamanho do arquivo carregado
      if ($files['size'] <= $max_file_size) {
         // Resto do código para upload da imagem

         // Caminho para a pasta onde as imagens serão armazenadas
         $imgData['upload_dir'] = wp_upload_dir();
         $imgData['temp_dir'] = wp_upload_dir()['path'] . '/temp/';

         // Nome original do arquivo
         $imgData['original_filename'] = $files['name'];
         $file_extension = pathinfo($imgData['original_filename'], PATHINFO_EXTENSION);

         // Gere um nome único baseado no timestamp atual
         $imgData['tempImageName'] = time() . '.' . $file_extension;

         // Caminho completo para o arquivo com nome único
         $imgData['upload_file'] = $imgData['upload_dir']['path'] . '/' . $imgData['tempImageName'];


      } else {
         $errors['arquivo'] = $files['typeFile'].' Muito Grande';
      }
   }

   function sendImgForDb( $files, $imgData){  

    if (move_uploaded_file($files['tmp_name'], $imgData['upload_file'])) {

       // Dados para a nova mídia
       $attachment = array(
          'guid' => $imgData['upload_dir']['url'] . '/' . $imgData['original_filename'],
          'post_mime_type' => $files['type'],
          'post_title' => sanitize_text_field(preg_replace('/\.[^.]+$/', '', $imgData['original_filename'])),
          'post_content' => '',
          'post_status' => 'inherit'
       );


       // Insere a mídia no banco de dados
       $attachment_id = wp_insert_attachment($attachment, $imgData['upload_file']);

       // Atualiza metadados da mídia
      //  require_once(ABSPATH . 'wp-admin/includes/image.php');
      //  $attachment_data = wp_generate_attachment_metadata($attachment_id, $upload_file);
      //  wp_update_attachment_metadata($attachment_id, $attachment_data);
     

       $file_url['url'] = wp_get_attachment_url($attachment_id);
       $file_url['type'] = $files['typeFile'];


       return $file_url;
    } else {
         $errors['arquivo'] = 'Erro ao enviar o(a)' . $files['typeFile']; 
    }
   }

if($_SESSION['user']->id_user){

    $pubData['id_user'] = $_SESSION['user']->id_user;
    $pubData['message'] = $_POST['textareaPub'];
    $pubData['date'] = str_replace('=','T',date('Y-m-d=H:i:s'));
    $pubData['file'] = null;
    $pubData['type_file'] = null;
    
    
    if(isset($imgData['upload_file'])){
        
        $dataFile = sendImgForDb($files, $imgData);
        $pubData['file'] = $dataFile['url'];
        $pubData['type_file'] = $dataFile['type'];
    }
  
    $publication = new Pub($pubData);
    $publication->insert($user);


    $url = home_url();
    $url .= '/app?p=feed';
    usleep(500000); // 500000 microssegundos = 500 milissegundos
    header("Location:$url");

}else{
   $errors['arquivo'] = 'Não foi possível enviar sua publicação';
}
}
if(isset($errors)) {
   $exception=  new ValidationException($errors,'Desculpe, não conseguimos Enviar sua publicação');
}