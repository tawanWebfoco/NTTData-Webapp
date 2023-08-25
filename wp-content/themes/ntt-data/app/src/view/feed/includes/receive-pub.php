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
            </div>

           
            <div class="content">
                <div class="person">
                    <h2><?= $userPub->full_name; ?></h2>
                    <span><?= $diffDate; ?></span>
                </div>
                <div class="message">
                    <p><?= $pub->message; ?></p>
                    <img src="<?= $pub->file; ?>" alt="Imagem">
                </div>
                <div class="action">
                <div class="like">
                    <svg width="22" height="19" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.08079 7.45061L5.35365 10.8021C6.53072 12.0074 8.46928 12.0074 9.64635 10.8021L12.9192 7.45061C14.3603 5.97494 14.3603 3.58242 12.9192 2.10675C11.4782 0.631083 9.14176 0.631084 7.70071 2.10675V2.10675C7.59064 2.21946 7.40936 2.21946 7.29929 2.10675V2.10675C5.85824 0.631084 3.52184 0.631083 2.08079 2.10675C0.639737 3.58242 0.639738 5.97494 2.08079 7.45061Z" stroke="#999999"/>
                    </svg>
                    <div class="desc">Curtir</div>
                </div>
                    <div id="comment">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/feed/comment.svg" alt="Imagem">
                        <div class="desc">Comentar</div>
                    </div>
                </div>
                <?php
                    require('send-comment.php');
                ?>
                <div class="commentsArea">
                    <?php
                    require('comments-area.php');
                    ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="seeMorePublish">
        <span>Ver Mais</span>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/feed/arrow-down.svg" alt="Icon Arrow Down">
    </div>
</div>