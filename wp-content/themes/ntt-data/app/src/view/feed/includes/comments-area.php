<?php
$hasComment = Comment::get(['id_pub' => $pub->id_pub], '*', 'id_comment DESC');
if ($hasComment) {
    foreach ($hasComment as $key => $comment) {
        $userComment = User::getOne(['id_user' => $comment->id_user]);
        
    

        $arrayCommentLikes = explode(',', $comment->likes);
        $countCommentLikes = $arrayCommentLikes[0] == '' ? 0 : count($arrayCommentLikes);

        if ($countCommentLikes == 0)  $textLikes = '<number></number>' . '<text></text>';
        if ($countCommentLikes === 1) $textLikes = '<number>'.$countCommentLikes .'</number>' . ' <text>'. _t['feed_curtida'] .'</text>';
        if ($countCommentLikes > 1) $textLikes = '<number>'.$countCommentLikes .'</number>' . ' <text>'. _t['feed_curtidas'] .'</text>';

        $classLiked = null;
        if(in_array($user->id_user, $arrayCommentLikes)){
            $classLiked = 'liked';
        }

        // VERIFICA SE EXISTE IMAGEM NO BANCO DE DADOS
        if ($userComment->photo) {
            $image_path = ABSPATH . str_replace(home_url(), '', $userComment->photo);
            if (file_exists($image_path)) $url_img = $userComment->photo;
            if (!file_exists($image_path)) $url_img = get_stylesheet_directory_uri() . '/app/public\assets\img\photos/perfil/img-perfil.svg';
        } else {
            $url_img = get_stylesheet_directory_uri() . '/app/public\assets\img\photos/perfil/img-perfil.svg';
        }

        $dataAtual = new DateTime();
        $dataPublicacao = new DateTime($comment->date);

        $diferenca = $dataAtual->diff($dataPublicacao);

        $diffDate = "Recente";
        if ($diferenca->y > 0) $diffDate = _t['feed_anosantes'] . $diferenca->y . _t['feed_anos'];
        if ($diferenca->m > 0) $diffDate = _t['feed_mesesantes'] . $diferenca->m . _t['feed_meses'];
        if ($diferenca->d > 0) $diffDate = _t['feed_diasantes'] . $diferenca->d . _t['feed_dias'];
        if ($diferenca->h > 0) $diffDate = _t['feed_horasantes'] . $diferenca->h . _t['feed_horas'];
        if ($diferenca->i > 0) $diffDate = _t['feed_minutosantes'] . $diferenca->i . _t['feed_minutos'];
?>
        <div class="comments">
            <div class="imgPerfil">
                <img src="<?= $url_img; ?>" alt="<?=_t['feed_pub_alt_imagem']?>">
            </div>
            <div class="content">
                <div class="person">
                    <h2><?= $userComment->full_name; ?></h2>
                    <span><?= $diffDate; ?></span>
                </div>
                <div class="message">
                    <span><?= $comment->message; ?></span>
                </div>
                <div class="action">
                <div class="like <?= isset($classLiked) ? $classLiked : ''; ?>" <?php echo md5('id_comment') . '="' . $comment->id_comment . '"' ?> <?php echo md5('id_user') . '="' . $user->id_user . '"' ?>>
                    <svg width="22" height="19" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.08079 7.45061L5.35365 10.8021C6.53072 12.0074 8.46928 12.0074 9.64635 10.8021L12.9192 7.45061C14.3603 5.97494 14.3603 3.58242 12.9192 2.10675C11.4782 0.631083 9.14176 0.631084 7.70071 2.10675V2.10675C7.59064 2.21946 7.40936 2.21946 7.29929 2.10675V2.10675C5.85824 0.631084 3.52184 0.631083 2.08079 2.10675C0.639737 3.58242 0.639738 5.97494 2.08079 7.45061Z" stroke="#999999" />
                        </svg>
                        <div class="desc"><?=  isset($classLiked) ? _t['feed_descurtir'] : _t['feed_curtir'] ?></div>
                    </div>
                </div>
                <div class="peopleLiked">
                    <p><?= $textLikes ?></p>
                </div>
            </div>
            '
        </div>
    <?php
    }
    ?>
    <!-- <div class="seeMoreComments">Ver mais comentários</div> -->
<?php
}
