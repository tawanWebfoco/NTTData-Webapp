<?php /*
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/register-login.css">

    <title>NTT DATA</title>
</head>

<body>
    */
get_header('login');    
?>
<section class="conteudo">
    <div class="conteudo-container">
        <form class="formRegister formRegisterCnv" action="" method="post" autocomplete="off">
            <h1>Cadastro Indicado</h1>
            <input type="hidden" name="regType" value="convidado">
            <input type="hidden" name="id_user" value="<?= isset($invited) ? $invited : null ;?>">
            <input type="hidden" name="validationId" value="<?= isset($validationId) ? $validationId : null ;?>">
            <div class="register">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <?php  include(TEMPLATE_PATH . '/messages.php'); 
                    ?>
                    
                    <div class="form-group">
                        <label for="full_name"><?=_t['registro_frm_nome']?></label>
                        <div><input autocomplete="none" type="text" id="full_name" name="full_name"
                        class="form-control 
                        <?= isset($errors['full_name']) ? 'is-invalid' : ''; ?>" 
                        value="<?=  isset($full_name) ? $full_name : ''; ?>" 
                        placeholder="nome completo" autofocus></div>
                        <div class="invalid-feedback">
                            <?=  isset($errors['full_name']) ? $errors['full_name'] : '';
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email"><?=_t['registro_frm_email']?></label>
                        <div><input autocomplete="none" type="text" id="email" name="email"
                        class="form-control 
                        <?= isset($errors['email']) ? 'is-invalid' : ''; ?>" 
                        value="<?=  isset($email) ? $email : ''; ?>" 
                        placeholder="large.user@nttdata.com" autofocus></div>
                        <div class="invalid-feedback">
                            <?=  isset($errors['email']) ? $errors['email'] : '';
                            ?>
                            <?=  isset($errors['validationId']) ? $errors['validationId'] : '';
                            ?>
                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username"><?=_t['registro_frm_usuario']?></label>
                        <div><input autocomplete="none" type="text" id="username" name="username"
                        class="form-control 
                        <?= isset($errors['username']) ? 'is-invalid' : ''; ?>" 
                        value="<?=  isset($username) ? $username : ''; ?>" 
                        placeholder="nome de usuário" autofocus></div>
                        <div class="invalid-feedback">
                            <?=  isset($errors['username']) ? $errors['username'] : '';
                            ?>
                        </div>
                    </div>
                

                    <div class="form-group">
                        <label for="password"><?=_t['registro_frm_senha']?></label>
                        <div><input autocomplete="none" type="password" id="password" name="password"
                        class="form-control 
                        <?= isset($errors['password']) ? 'is-invalid' : ''; ?>" 
                        value="<?=  isset($password) ? $password : ''; ?>" 
                        placeholder="" autofocus></div>
                        <div class="invalid-feedback">
                            <?=  isset($errors['password']) ? $errors['password'] : '';
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword"><?=_t['registro_frm_confirmesenha']?></label>
                        <div><input autocomplete="off" type="password" id="confirmPassword" name="confirmPassword" 
                        class="form-control <?= isset($errors['confirmPassword']) ? 'is-invalid' : ''; ?>" 
                        placeholder=""></div>
                        <div class="invalid-feedback">
                            <?=  isset($errors['confirmPassword']) ? $errors['confirmPassword'] : '';
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="country"><?=_t['registro_frm_pais']?></label>

                        <select name="country" id="country" class="<?= isset($errors['country']) ? 'is-invalid' : ''; ?>">
                            <option value=""><?=_t['registro_frm_selecione']?></option>
                            <option value="Brasil" <?php (isset($country) && $country == 'Brasil') ? 'selected' : ''; ?>><?=_t['registro_frm_bra']?></option>
                            <option value="Mexico" <?= (isset($country) && $country == 'Mexico') ? 'selected' : ''; ?>><?=_t['registro_frm_mex']?></option>
                            <option value="Peru" <?= (isset($country) && $country == 'Peru') ? 'selected' : ''; ?>><?=_t['registro_frm_per']?></option>
                            <option value="Chile" <?= (isset($country) && $country == 'Chile') ? 'selected' : ''; ?>><?=_t['registro_frm_chi']?></option>
                            <option value="Colombia" <?= (isset($country) && $country == 'Colombia') ? 'selected' : ''; ?>><?=_t['registro_frm_col']?></option>
                            <option value="Argentina" <?= (isset($country) && $country == 'Argentina') ? 'selected' : ''; ?>><?=_t['registro_frm_arg']?></option>
                            <option value="Equador" <?= (isset($country) && $country == 'Equador') ? 'selected' : ''; ?>><?=_t['registro_frm_equ']?></option>
                            <option value="USA" <?= (isset($country) && $country == 'USA') ? 'selected' : ''; ?>><?=_t['registro_frm_usa']?></option>
                        </select>
                        <div class="invalid-feedback">
                            <?=  isset($errors['country']) ? $errors['country'] : '';
                            ?>
                        </div>
                    </div>
                
                    </div>
                <div class="card-footer">
                    <div class="form-group">
                        <label></label>
                        <div style="gap: 15px;"><button class="btn btn-login"><?=_t['registro_frm_enviar']?></button> <button id="btn-clean-pub" class="btn light-blue"><?=_t['registro_frm_limpar']?></button></div>
                    </div>
                </div>
            </div>
        </form>

        <div id="conteudo-pagina">
            <h2><?=_t['registro_h2']?></h2>
            <p><?=_t['registro_cnv_p_1']?></p>
            <p><?=_t['registro_cnv_p_2']?></p>
            <p><?=_t['registro_cnv_p_3']?></p>
            <p><?=_t['registro_cnv_p_4']?><a href="https://moveforthesdg.com/">https://moveforthesdg.com/</a></p>
            
            <div class="bottom-conteudo">
                <a target="_blank" href="https://moveforthesdg.com/"><button class="btn btn-login"><?=_t['registro_btn_cta']?></button></a>
                <img src="<?=get_template_directory_uri()?>/assets/img/Logo_ODS.png" width="115" height="78" />
            </div>
        </div>
    </div>
</section>

<?php    
get_footer('login');
/*
</body>

</html>*/
?>