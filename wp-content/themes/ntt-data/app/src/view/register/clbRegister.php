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

<section class="Conteúdo">
    <form class="formRegisterClb" action="" method="post" autocomplete="off">
        <input type="hidden" name="regType" value="colaborador">
        <input type="hidden" name="id_user" value="<?= isset($invited) ? $invited : null ;?>">
        <input type="hidden" name="validationId" value="<?= isset($validationId) ? $validationId : null ;?>">
        <div class="register">
            <div class="card-header">
            </div>
            <div class="card-body">
                <?php  include(TEMPLATE_PATH . '/messages.php'); 
                ?>
                 
                <div class="form-group">
                    <label for="full_name">Nome</label>
                    <input autocomplete="none" type="text" id="full_name" name="full_name"
                     class="form-control 
                    <?= isset($errors['full_name']) ? 'is-invalid' : ''; ?>" 
                    value="<?=  isset($full_name) ? $full_name : ''; ?>" 
                    placeholder="Informe o e-mail" autofocus>
                    <div class="invalid-feedback">
                        <?=  isset($errors['full_name']) ? $errors['full_name'] : '';
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input autocomplete="none" type="text" id="email" name="email"
                     class="form-control 
                    <?= isset($errors['email']) ? 'is-invalid' : ''; ?>" 
                    value="<?=  isset($email) ? $email : ''; ?>" 
                    placeholder="Informe o e-mail" autofocus>
                    <div class="invalid-feedback">
                        <?=  isset($errors['email']) ? $errors['email'] : '';
                        ?>
                        <?=  isset($errors['validationId']) ? $errors['validationId'] : '';
                        ?>
                  
                    </div>
                </div>
                <div class="form-group">
                    <label for="username">Usuário</label>
                    <input autocomplete="none" type="text" id="username" name="username"
                     class="form-control 
                    <?= isset($errors['username']) ? 'is-invalid' : ''; ?>" 
                    value="<?=  isset($username) ? $username : ''; ?>" 
                    placeholder="Informe o e-mail" autofocus>
                    <div class="invalid-feedback">
                        <?=  isset($errors['username']) ? $errors['username'] : '';
                        ?>
                    </div>
                </div>
             

                <div class="form-group">
                    <label for="password">Senha</label>
                    <input autocomplete="none" type="text" id="password" name="password"
                     class="form-control 
                    <?= isset($errors['password']) ? 'is-invalid' : ''; ?>" 
                    value="<?=  isset($password) ? $password : ''; ?>" 
                    placeholder="Informe o e-mail" autofocus>
                    <div class="invalid-feedback">
                        <?=  isset($errors['password']) ? $errors['password'] : '';
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirmação Senha</label>
                    <input autocomplete="off" type="text" id="confirmPassword" name="confirmPassword" 
                    class="form-control <?= isset($errors['confirmPassword']) ? 'is-invalid' : ''; ?>" 
                    placeholder="Informe a Senha">
                    <div class="invalid-feedback">
                        <?=  isset($errors['confirmPassword']) ? $errors['confirmPassword'] : '';
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="country">País</label>

                    <select name="country" id="country" <?= isset($errors['country']) ? 'is-invalid' : ''; ?>>
                        <option value="">Selecione</option>
                        <option value="Brasil" <?= isset($errors['country']) ? 'selected' : ''; ?>>Brasil</option>
                        <option value="Mexico" <?= isset($errors['country']) ? 'selected' : ''; ?>>México</option>
                        <option value="Peru" <?= isset($errors['country']) ? 'selected' : ''; ?>>Peru</option>
                        <option value="Chile" <?= isset($errors['country']) ? 'selected' : ''; ?>>Chile</option>
                        <option value="Colombia" <?= isset($errors['country']) ? 'selected' : ''; ?>>Colômbia</option>
                        <option value="Argentina" <?= isset($errors['country']) ? 'selected' : ''; ?>>Argentina</option>
                        <option value="Equador" <?= isset($errors['country']) ? 'selected' : ''; ?>>Equador</option>
                        <option value="USA" <?= isset($errors['country']) ? 'selected' : ''; ?>>USA</option>
                    </select>
                    <div class="invalid-feedback">
                        <?=  isset($errors['country']) ? $errors['country'] : '';
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="office">Cargo</label>
                    <select name="office" id="office" <?= isset($errors['office']) ? 'class="is-invalid"' : ''; ?>>
                        <option value="">Selecione</option>
                        <option value="Talent" <?= isset($errors['office']) ? 'selected' : ''; ?>>Talent</option>
                        <option value="Leader" <?= isset($errors['office']) ? 'selected' : ''; ?>>Leader</option>
                        <option value="Manager" <?= isset($errors['office']) ? 'selected' : ''; ?>>Manager</option>
                        <option value="Director" <?= isset($errors['office']) ? 'selected' : ''; ?>>Director</option>
                        <option value="Senior Manager" <?= isset($errors['office']) ? 'selected' : ''; ?>>Senior Manager</option>
                        <option value="Executive Director" <?= isset($errors['office']) ? 'selected' : ''; ?>>Executive Director</option>
                        <option value="Top Executive" <?= isset($errors['office']) ? 'selected' : ''; ?>>Top Executive</option>
                        <option value="Partner" <?= isset($errors['office']) ? 'selected' : ''; ?>>Partner</option>
                    </select>

                    <div class="invalid-feedback">
                        <?=  isset($errors['office']) ? $errors['office'] : '';
                        ?>
                    </div>
                </div>
                

            </div>
            <div class="card-footer">
                <button class="btn btn-login">Entrar</button>
            </div>
        </div>
    </form>

<?php    
get_footer('login');
/*
</body>

</html>*/
?>