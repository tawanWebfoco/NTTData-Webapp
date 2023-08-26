<?php
require_once(dirname(__FILE__, 3) . '/config/config.php');
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

$dataJSON = file_get_contents("php://input");
$data = json_decode($dataJSON, true);

if($data['type'] === 'pub')$likesDb = Pub::getOne(['id_pub' => $data['id_pub']], 'likes')->likes;
if($data['type'] === 'comment')$likesDb = Comment::getOne(['id_comment' => $data['id_comment']], 'likes')->likes;
   

$arrayLikes = explode(",", $likesDb);

if(in_array($data['id_user'], $arrayLikes)){
    $posicao = array_search($data['id_user'], $arrayLikes);
   array_splice($arrayLikes, $posicao, 1);

}else{
    if(count($arrayLikes) === 1 && $arrayLikes[0] === ''){
        $arrayLikes[0] = $data['id_user'];
    }else{

        print_r(count($arrayLikes) );
        array_push($arrayLikes,$data['id_user']);
    }
}


$newStringLikes = implode(",", $arrayLikes);

if($data['type'] === 'pub'){

    $likesdata = [
        'primary_key' => $data['id_pub'],
        'id_pub' => $data['id_pub'],
        'likes' => $newStringLikes,
    ];

    $pub = new Pub($likesdata);
    $pub->update();

}elseif($data['type'] === 'comment'){

    $likesdata = [
        'primary_key' => $data['id_comment'],
        'id_comment' => $data['id_comment'],
        'likes' => $newStringLikes,
    ];

    $comment = new Comment($likesdata);
    $comment->update();

}
    

