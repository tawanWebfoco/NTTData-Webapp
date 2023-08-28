<div id="feed" class="main">
    <?php if (get_class($user) === 'User') {; ?>
        <section class="feed">

            <h1><?=_t['feed_h1']?></h1>

            <!-- CAIXA DE PUBLICAÇÃO -->
            <?php require_once(dirname(__FILE__, 2) . '/feed/includes/send-pub.php'); ?>

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
    } elseif (get_class($user) === 'Guest') {

        require_once(dirname(__FILE__, 5) . '/page-home.php');
    }
    ?>
</div>

<script>
    Document.prototype.homePath = "<?= home_url() ?>";
</script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\js\feed/uploadImgVideo.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\js\feed/sendComment.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\js\feed/likes.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\js\feed/requestMorePub.js"></script>