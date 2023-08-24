
<div id="feed" class="main">
<?php if(get_class($user) === 'User'){; ?>
    <section class="feed">

        <h2>Compartilhe sua atividade</h2>
        
        <!-- CAIXA DE PUBLICAÇÃO -->
        <?php require_once('send-pub.php'); ?> 
        
        <!-- PUBLICAÇÃO DOS USUÁRIOS -->
        <?php require_once('receive-pub.php'); ?> 
    </section>
        <?php 
            }elseif( get_class($user) === 'Guest'){ 
                
            require_once(dirname(__FILE__,5).'/page-home.php'); 
            }
     ?>
</div>