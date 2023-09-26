<?php
ini_set('memory_limit', '1024M');
use Intervention\Image\ImageManagerStatic as Image;
use Maestroerror\HeicToJpg as HeicToJpg;


if (empty($_FILES['arquivoVideo']['error'])) {
   $files =  $_FILES['arquivoVideo'];
   $files['typeFile'] = 'Vídeo';
} elseif (empty($_FILES['arquivoImg']['error'])) {
   $files =  $_FILES['arquivoImg'];
   $files['typeFile'] = 'Imagem';
}

function convertHEIFToJPG($inputPath, $outputPath){
   try {
      HeicToJpg::convertFromUrl($inputPath)->saveAs($outputPath);
      resizeImg($outputPath);

      return true;
   } catch (\Exception $e) {
      return false;
   }
}

function convertToJPG($inputPath, $outputPath){
   try {
      // Abra a imagem PNG de entrada com o Intervention Image
      $image = Image::make($inputPath);

      // Converta a imagem PNG para JPG
      $image->encode('jpg', 80); // 100 é a qualidade da imagem (0 a 100)
      // Salve a imagem JPG no caminho de saída
      $image->save($outputPath);
      $image->destroy();
      resizeImg($outputPath);

      return true;
   } catch (\Exception $e) {
      return false;
   }
}

function resizeImg($inputImagePath, $newWidth = 800){
   $image = Image::make($inputImagePath);
   $width = $image->width();
   if($width > 800){

      $image->orientate();
      $image->resize($newWidth, null, function ($constraint) {
         $constraint->aspectRatio();
      });
      $image->save($inputImagePath);
      $image->destroy();
   }
}

// Verifica se o formulário foi enviado via POST

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   // Certifique-se de que o campo de arquivo existe no POST

   $pubData = [];
   $imgData = [];

   if (isset($files)) {
      // Verifica o tamanho máximo permitido (em bytes)
      if ($files['typeFile'] === 'Vídeo') $max_file_size = 50 * 1024 * 1024;
      if ($files['typeFile'] === 'Imagem') $max_file_size = 30 * 1024 * 1024;

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
         $errors['arquivo'] = $files['typeFile'] . ' Muito Grande';
      }
   }


   $user = isset($_SESSION) ? unserialize($_SESSION['user']) : null;
   if ($user->id_user) {

      $pubData['id_user'] = $user->id_user;
      $pubData['message'] = $_POST['textareaPub'];
      $pubData['date'] = str_replace('=', 'T', date('Y-m-d=H:i:s'));
      $pubData['file'] = null;
      $pubData['type_file'] = null;


      if (isset($imgData['upload_file'])) {

         $fileExtension = strtolower(pathinfo($imgData['original_filename'], PATHINFO_EXTENSION));
         $convertedImagePath = $imgData['upload_dir']['path'] . '/' . time() . '.jpg';

         switch ($fileExtension) {
            case 'heic':
            case 'heif':
               convertHEIFToJPG($files['tmp_name'],$convertedImagePath);
               break;
            default:
               convertToJPG($files['tmp_name'],$convertedImagePath);
               break;
         }

        
         $pathInfo =  pathinfo($convertedImagePath);
         
         $urlImage = $imgData['upload_dir']['url'] .'/'. $pathInfo['basename'];
         

         $pubData['file'] = $urlImage;
         $pubData['type_file'] = $files['typeFile'];
      }

       $publication = new Pub($pubData);
       $publication->insert($user);


       $url = home_url();
       $url .= '/app?p=feed';
       usleep(500000); // 500000 microssegundos = 500 milissegundos
       header("Location:$url");

   } else {
      $errors['arquivo'] = 'Não foi possível enviar sua publicação';
   }
}
if (isset($errors)) {
   $exception =  new ValidationException($errors, 'Desculpe, não conseguimos Enviar sua publicação');
}
