<?php
 
 $_SESSION['user'] = null;
 unset($_SESSION['user']);
 unset($_SESSION['session_id']);
session_destroy();
setcookie(session_name(), '', time() - 3600, '/');
session_unset();
 
 ?>
 <script>
    Document.prototype.homePath = "<?= home_url() ?>";
</script>

 <?php
 $html = <<<HTML
 <script>
  console.log(document.homePath);
   localStorage.clear(); // Isso limpará todos os dados armazenados no localStorage
   window.location.href = document.homePath
 </script>
HTML;

echo $html;
 
//  header("Location:". home_url());
?>