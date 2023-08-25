<?php
$hasComment = Comment::get(['id_pub' => $pub->id_pub]);
if ($hasComment) {
    foreach ($hasComment as $key => $comment) {
        $userComment = User::getOne(['id_user' => $comment->id_user]);
        if ($userComment->photo) {
            $image_path = ABSPATH . str_replace(home_url(), '', $userComment->photo);
            if (file_exists($image_path)) {
                $url_img = $userComment->photo;
                $image_extension = pathinfo($url_img, PATHINFO_EXTENSION);
            } else {
                $url_img = get_stylesheet_directory_uri() . '/app/public\assets\img\photos/perfil/img-perfil.svg';
            }
        } else {
            $url_img = get_stylesheet_directory_uri() . '/app/public\assets\img\photos/perfil/img-perfil.svg';
        }
?>
<div class="commentsArea">
        <div class="imgPerfil">
            <img src="<?= $url_img; ?>" alt="Imagem">
            <!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\photos/img-perfil2.jpg" alt="Imagem"> -->
        </div>
        <div class="content">
        <div class="person">
                    <h2><?= $userComment->full_name; ?></h2>
                </div>
            <div class="message">
            <span><?= $comment->message; ?></span>
                <!-- <span>lOrem ipsum dolor sit amet, consectetur adipiscing elit. Nunc consequat congue.</span> -->
            </div>
            <div class="action">
                <div class="like">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/feed/heart-full.svg" alt="Imagem">
                    <div class="desc">Curtir</div>
                </div>
            </div>
        </div>
'</div>
<?php 
  }
  ?>
  <div class="seeMoreComments">Ver mais comentários</div>
  <?php
}