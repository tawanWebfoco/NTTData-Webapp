
<div id="feed" class="main">
<?php if(get_class($user) === 'User'){; ?>
    <section class="feed">

        <h2>Compartilhe sua atividade</h2>
        
        <!-- CAIXA DE PUBLICAÇÃO -->
        <?php  require_once(dirname(__FILE__,2) .'/feed/includes/send-pub.php'); ?> 
        
        <!-- PUBLICAÇÃO DOS USUÁRIOS -->
        <?php require_once(dirname(__FILE__,2) .'/feed/includes/receive-pub.php'); ?> 
    </section>
        <?php 
            }elseif( get_class($user) === 'Guest'){ 
                
            require_once(dirname(__FILE__,5).'/page-home.php'); 
            }
     ?>
</div>

<script>Document.prototype.homePath = "<?= home_url() ?>";</script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\js\feed/uploadImgVideo.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\js\feed/sendComment.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\js\feed/likes.js"></script>
