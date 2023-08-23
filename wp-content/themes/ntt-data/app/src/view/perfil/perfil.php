<div id="perfil" class="main">
    <section class="perfil">
       
    <?php   require_once(dirname(__FILE__,2) .'/perfil/includes/person.php'); ?>

    <?php if(get_class($user) === 'User'):; ?>
        <?php   require_once(dirname(__FILE__,2) .'/perfil/includes/invite.php'); ?> 
        <?php   require_once(dirname(__FILE__,2) .'/perfil/includes/guest.php'); ?> 
    <?php elseif(get_class($user) === 'Guest'):; ?>
        <?php   require_once(dirname(__FILE__,2) .'/perfil/includes/invitedFor.php'); ?> 
        <?php   require_once(dirname(__FILE__,2) .'/perfil/includes/about.php'); ?> 
    <?php endif; ?>
    
    <?php   require_once(dirname(__FILE__,2) .'/template/regulation.php'); ?> 
        
    </section>
</div>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\js\perfil/uploadImg.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\js\perfil/updatatePersonInfo.js"></script>
