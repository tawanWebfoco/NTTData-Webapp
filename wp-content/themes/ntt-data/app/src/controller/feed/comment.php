<?php
require_once(dirname(__FILE__,3) . '/config/config.php');
session_start();
requireValidSession();

// LOCAL
// define( 'DB_USER', 'root' );
// define( 'DB_NAME', 'webappwebfoco_nttdata' );
// define( 'DB_PASSWORD', '' );
// define( 'DB_HOST', 'localhost' );


// PRODUCAO
define( 'DB_NAME', "wp_lpnttdata" );
define( 'DB_USER', "root" );
define( 'DB_PASSWORD', "" );
define( 'DB_HOST', "127.0.0.1:3307" );

// require_once(dirname(__FILE__,7) . '/../wp-config.php');
Model::sanetizePost($_POST);

print_r($_POST);

$date = str_replace('=','T',date('Y-m-d=H:i:s'));
$commentData = [
    'id_pub' => $_POST[md5('id_pub')],
    'message' => $_POST['textareaComment'],
    'id_user' => $_POST[md5('id_user')],
    'date' => $date
];

$comment = new Comment($commentData);

$id_comment = $comment->insert();

echo($id_comment);

// $url = home_url();
// $url .= '/app?p=feed';
// header("Location:$url");
