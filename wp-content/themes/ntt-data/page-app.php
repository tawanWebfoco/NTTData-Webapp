<?php
require_once(dirname(__FILE__) . '/app/src/config/config.php');

?>
 <script>
    Document.prototype.homePath = "<?= home_url() ?>";
</script>
<?php

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
   );
//  print_r($uri)
   
   if($uri === '/htdocs/Webfoco/nttdata/LP-site/app/index.php' || $uri === '/htdocs/Webfoco/nttdata/LP-site/app' || $uri === '/htdocs/Webfoco/nttdata/LP-site/app/'){
  }
  $uri = 'app.php';
 

     require(CONTROLLER_PATH ."/$uri");


