<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/login.css">

    <title>NTT DATA</title>
</head>

<body>
    <form class="form-login" action="#" method="post" autocomplete="off">
        <div class="login-card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <?php include(TEMPLATE_PATH . '/messages.php'); 
                ?>
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
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input autocomplete="off" type="text" id="password" name="password" 
                    class="form-control <?= isset($errors['password']) ? 'is-invalid' : ''; ?>" 
                    placeholder="Informe a Senha">
                    <div class="invalid-feedback">
                        <?=  isset($errors['password']) ? $errors['password'] : '';
                        ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-login">Entrar</button>
            </div>
        </div>
    </form>
</body>

</html>