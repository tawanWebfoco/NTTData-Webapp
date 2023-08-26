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
        <form class="form-login" action="#" method="post" autocomplete="off">
            <div class="login-card">
                <div class="card-header">
                    <h1>Lorem Ipsom Dolor</h1>
                </div>
                <div class="card-body">
                    <?php include(TEMPLATE_PATH . '/messages.php'); 
                    ?>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <div><input autocomplete="none" type="text" id="email" name="email"
                        class="form-control 
                        <?= isset($errors['email']) ? 'is-invalid' : ''; ?>" 
                        value="<?=  isset($email) ? $email : ''; ?>" 
                        placeholder="" autofocus></div>
                        <div class="invalid-feedback">
                            <?=  isset($errors['email']) ? $errors['email'] : '';
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <div><input autocomplete="off" type="text" id="password" name="password" 
                        class="form-control <?= isset($errors['password']) ? 'is-invalid' : ''; ?>" 
                        placeholder=""></div>
                        <div class="invalid-feedback">
                            <?=  isset($errors['password']) ? $errors['password'] : '';
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <label></label>
                        <div class="linha-links-login">
                            <button class="btn btn-login">Entrar</button>
                            <p>
                                <a href="#">Esqueceu Senha</a>
                                <a href="#">Cadastre-Se</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<?php    
get_footer('login');
/*
</body>

</html>*/
?>