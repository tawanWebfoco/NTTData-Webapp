<?php
require_once(dirname(__FILE__, 4) . '/config/config.php');
session_start();
requireValidSession();
require_once(dirname(__FILE__,9) . '/wp-config.php');

date_default_timezone_set('America/Sao_Paulo');
Model::sanetizePost($_POST);


$date = str_replace('=','T',date('Y-m-d=H:i:s'));
$commentData = [
    'id_pub' => $_POST[md5('id_pub')],
    'message' => $_POST['textareaComment'],
    'id_user' => $_POST[md5('id_user')],
    'date' => $date
];

$comment = new Comment($commentData);

$id_comment = $comment->insert();
die;

// $url = home_url();
// $url .= '/app?p=feed';
// header("Location:$url");
