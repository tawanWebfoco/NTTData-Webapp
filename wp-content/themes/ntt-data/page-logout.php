<?php
 session_start(); ?>
 <script>
    Document.prototype.homePath = "<?= home_url() ?>";
</script>
 <?php
 $html = <<<HTML
 <script>
  //  const home =  'http://localhost/webfoco/nttdata/NTTData-Webapp/';
   const home =  'https://webapp.webfoco.com';
   console.log(home);
   localStorage.clear(); // Isso limpará todos os dados armazenados no localStorage
   window.location.href = home;
 </script>
HTML;

echo $html;

  echo $html;
 session_destroy();
//  header("Location:". home_url());
?>