<?php
 session_start();
 
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
  //  const home =  'http://localhost/webfoco/nttdata/web2/NTTData-Webapp/';
   const home =  'https://webapp.webfoco.com';
  //  const home =  home_url();
   console.log(home);
   localStorage.clear(); // Isso limpará todos os dados armazenados no localStorage
   window.location.href = home;
 </script>
HTML;

  echo $html;
 
//  header("Location:". home_url());
?>