<?php
get_header('login');
?>
<section class="conteudo">
    <div class="conteudo-container">
        <form class="form-login form-recover" action="" method="post" autocomplete="off">
            <input type="hidden" name="type" value="<?= md5('recover') ?>">
            <div class="login-card">
                <div class="card-header">
                    <h1><?= _t['recover_h1'] ?></h1>
                </div>
                <div class="card-body">
                    <?php include(TEMPLATE_PATH . '/messages.php');       ?>
                    <?php  if(isset($recover)): ; ?>
                        <div class="sendMessageReturn error">
                            <?= isset($recover) ? 'Falha na redefinição re-envie um novo e-mail.' : '';     ?>
                        </div>
                        <?php elseif(count($errors) <= 0): ; ?>
                         <?php if (isset($invited)) :; ?>
                    <div class="sendMessageReturn <?= $invited ? 'success' : ''; ?>"><?= $invited ? 'Email de redefinição enviado com sucesso.' : ''; ?></div>
                <?php endif; 
                        endif; ?>
                    
                    <div class="form-group">
                        <label for="email"><?= _t['login_email'] ?></label>
                        <div><input autocomplete="none" type="text" id="email" name="email" class="form-control 
                        <?= isset($errors['email']) ? 'is-invalid' : ''; ?>" value="<?= isset($email) ? $email : ''; ?>" placeholder="large.user@nttdata.com" autofocus></div>
                        <div class="invalid-feedback">
                            <?= isset($errors['email']) ? $errors['email'] : '';
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <label></label>
                        <div class="linha-links-login">
                            <button class="btn btn-login btn-recover"><?= _t['recover_recuperar'] ?></button>

                        </div>
                    </div>
                </div>
                

            </div>
        </form>
    </div>
</section>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\js\recover/recover.js"></script>
<?php
get_footer('login');
?>