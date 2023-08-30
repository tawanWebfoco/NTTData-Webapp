<?php
get_header('login');
?>
<section class="conteudo">
    <div class="conteudo-container">
        <form class="form-login form-recover" action="" method="post" autocomplete="off">
            <input type="hidden" name="type" value="<?=md5('recover')?>">
            <div class="login-card">
                <div class="card-header">
                    <h1><?= _t['recover_h1'] ?></h1>
                </div>
                <div class="card-body">
                    <?php include(TEMPLATE_PATH . '/messages.php');
                    ?>
                    <div class="form-group">
                        <label for="email"><?=_t['login_email']?></label>
                        <div><input autocomplete="none" type="text" id="email" name="email"
                        class="form-control 
                        <?= isset($errors['email']) ? 'is-invalid' : ''; ?>" 
                        value="<?=  isset($email) ? $email : ''; ?>" 
                        placeholder="large.user@nttdata.com" autofocus></div>
                        <div class="invalid-feedback">
                            <?=  isset($errors['email']) ? $errors['email'] : '';
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <label></label>
                        <div class="linha-links-login">
                            <button class="btn btn-login btn-recover"><?= _t['recover_update'] ?></button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<?php
get_footer('login');
?>