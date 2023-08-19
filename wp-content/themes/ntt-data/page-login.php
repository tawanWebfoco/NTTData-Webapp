<?php
require_once(dirname(__FILE__) . '/app/src/config/config.php');


// Carrega o arquivo wp-config.php do WordPress
// require_once(dirname(__FILE__,4) . '/wp-config.php');

   
     $uri = 'login.php';

     require(CONTROLLER_PATH ."/$uri");


