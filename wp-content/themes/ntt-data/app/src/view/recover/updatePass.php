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
                        <label for="password"><?= _t['recover_new_password'] ?></label>
                        <div><input autocomplete="none" type="text" id="password" name="password" class="form-control 
                        <?= isset($errors['password']) ? 'is-invalid' : ''; ?>" value="<?= isset($password) ? $password : ''; ?>" placeholder="" autofocus></div>
                        <div class="invalid-feedback">
                            <?= isset($errors['password']) ? $errors['password'] : '';
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword"><?= _t['recover_confirmPassword'] ?></label>
                        <div><input autocomplete="off" type="text" id="confirmPassword" name="confirmPassword" class="form-control <?= isset($errors['confirmPassword']) ? 'is-invalid' : ''; ?>" placeholder=""></div>
                        <div class="invalid-feedback">
                            <?= isset($errors['confirmPassword']) ? $errors['confirmPassword'] : '';
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