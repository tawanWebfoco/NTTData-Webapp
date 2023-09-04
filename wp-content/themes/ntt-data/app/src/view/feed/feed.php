<div id="feed" class="main">
    
        <section class="feed">

            <h1><?=_t['feed_h1']?></h1>

            <!-- CAIXA DE PUBLICAÇÃO -->
            <?php if (get_class($user) === 'User') :; ?>
                <?php require_once(dirname(__FILE__, 2) . '/feed/includes/send-pub.php'); ?>
            <?php endif; ?>
            <!-- PUBLICAÇÃO DOS USUÁRIOS -->
            <div class="receivepubbox">
                <?php require(dirname(__FILE__, 2) . '/feed/includes/pub-area.php'); ?>
                <div id="divHasPub" class="invalid-feedback"><?=_t['feed_sem_publicacoes']?></div>
                <div id="seeMorePublish" <?php ;// echo md5('lastPub') . '="' . $idPubLastString . '"'; ?>>
                    <span><?=_t['feed_ver_mais']?></span>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/feed/arrow-down.svg" alt="Icon Arrow Down">
                </div>
            </div>
            

        </section>
    <?php
    
    ?>
</div>

<script>
    Document.prototype.homePath = "<?= home_url() ?>";
    Document.prototype.language = "<?= $user->language?>";

    /* Textos */

    let feed_erroimggrande = "<?=_t['feed_erroimggrande']?>";
    let feed_erroimginvalida = "<?=_t['feed_erroimginvalida']?>";
    let feed_errovidgrande = "<?=_t['feed_errovidgrande']?>";
    let feed_errovidinvalido = "<?=_t['feed_errovidinvalido']?>";
    
    let feed_curtida = "<?=_t['feed_curtida']?>";
    let feed_curtidas = "<?=_t['feed_curtidas']?>";
    let feed_curtir = "<?=_t['feed_curtir']?>";
    let feed_descurtir = "<?=_t['feed_descurtir']?>";

</script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\js\feed/uploadImgVideo.js"></script>
<?php if (get_class($user) === 'User') :; ?>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\js\feed/sendComment.js"></script>
<?php endif; ?>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\js\feed/navPub.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\js\feed/likes.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\js\feed/requestMorePub.js"></script>