<div class="receivepubbox">

    <?php
    foreach ($latestPub as $key => $pub) :;
        $userPub = User::getOne(['id_user' => $pub->id_user]);
        if ($userPub->photo) {
            $image_path = ABSPATH . str_replace(home_url(), '', $userPub->photo);
            if (file_exists($image_path)) {
                $url_img = $userPub->photo;
                $image_extension = pathinfo($url_img, PATHINFO_EXTENSION);
            } else {
                $url_img = get_stylesheet_directory_uri() . '/app/public\assets\img\photos/perfil/img-perfil.svg';
            }
        } else {
            $url_img = get_stylesheet_directory_uri() . '/app/public\assets\img\photos/perfil/img-perfil.svg';
        }
        $dataAtual = new DateTime();
        $dataPublicacao = new DateTime($pub->date);

        $diferenca = $dataAtual->diff($dataPublicacao);

        if ($diferenca->y > 0) {
            $diffDate = $diferenca->y . " anos atrás";
        } elseif ($diferenca->m > 0) {
            $diffDate = $diferenca->m . " meses atrás";
        } elseif ($diferenca->d > 0) {
            $diffDate = $diferenca->d . " dias atrás";
        } elseif ($diferenca->h > 0) {
            $diffDate = $diferenca->h . " horas atrás";
        } elseif ($diferenca->i > 0) {
            $diffDate = $diferenca->i . " minutos atrás";
        } else {
            $diffDate = "Recente";
        }
    ?>

        <div class="container">
            <div class="imgPerfil">
                <img src="<?= $url_img; ?>" alt="Imagem">
                <!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\photos/img-perfil.jpg" alt="Imagem"> -->
            </div>

           
            <div class="content">
                <div class="person">
                    <h2><?= $userPub->full_name; ?></h2>
                    <p><?= $diffDate; ?></p>
                </div>
                <div class="message">
                    <!-- <span>lOrem ipsum dolor sit amet, consectetur adipiscing elit. Nunc consequat congue.</span> -->
                    <span><?= $pub->message; ?></span>
                    <!-- <div class="seeMore">Ver mais.</div> -->
                    <img src="<?= $pub->file; ?>" alt="Imagem">
                </div>
                <div class="action">
                    <div class="like">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/feed/heart.svg" alt="Imagem">
                        <div class="desc">Curtir</div>
                    </div>
                    <div class="comment">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/feed/comment.svg" alt="Imagem">
                        <div class="desc">Comentar</div>
                    </div>
                </div>
                <?php
                    require('comments-area.php');
                ?>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="seeMorePublish">
        <span>Ver Mais</span>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/feed/arrow-down.svg" alt="Icon Arrow Down">
    </div>
</div>