<div class="perfilContainer">
            <div class="box">
                <div class="photo">
                    <?php
                    if ($user->photo) {
                        $image_path = ABSPATH . str_replace(home_url(), '', $user->photo);
                        if (file_exists($image_path)) {
                            $url_img = $user->photo;

                            $image_extension = pathinfo($url_img, PATHINFO_EXTENSION);

                        } else {
                            $url_img = get_stylesheet_directory_uri() . '/app/public\assets\img\photos/perfil/img-perfil.svg';
                        }
                    } else {
                        $url_img = get_stylesheet_directory_uri() . '/app/public\assets\img\photos/perfil/img-perfil.svg';
                    }
                    ?>
                    <img class="imgPerfil" src="<?= $url_img; ?>" alt="Imagem">
                    <br/>
                    <span id="editImgPerfil"><?=_t['perfil_editarfoto']?></span>
                </div>

                <!-- Imagem clicável -->
                <a id="uploadLink" href="#">
                    <img class="camera" id="uploadedImage" src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/perfil/camera.svg" alt="<?=_t['perfil_cameraalt']?>" title="<?=_t['perfil_cameratitle']?>">
                </a>

                <!-- Formulário de upload oculto -->
                <!-- <form id="uploadImgPerfil" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" enctype="multipart/form-data"> -->
                <form id="uploadImgPerfil" action="#" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="upload_image">
                    <input type="hidden" name="type" value="personalImg">
                    <input type="file" name="imagem" id="imagem" style="display: none;">
                    <input type="submit" value="Enviar" style="display: none;">
                </form>

            </div>

            <div class="content">
                <form id="uploadPersonInfo" method="post" enctype="multipart/form-data" action="">
                    <input type="hidden" name="type" value="personalInfo">
                    <div class="personalInfo">
                        <div class="field">
                            <label class="label" for="full_name"><?=_t['registro_frm_nome']?></label>

                            <input type="text" name="full_name" disabled value="<?= $user->full_name; ?>">
                        </div>
                        <div class="field">
                            <label class="label" for="email"><?=_t['registro_frm_email']?></label>
                            <!-- <input type="email" name="email" disabled value="<?= $user->email; ?>"> -->
                            <span><?= $user->email; ?></span>
                        </div>
                        <div class="field">
                            <label class="label" for="country"><?=_t['registro_frm_pais']?></label>
                            <!-- <input type="text" name="country" disabled value="<?= $user->country; ?>"> -->
                            <span><?= $user->country; ?></span>
                        </div>

                        <?php if(get_class($user) === 'User'):; ?>
                        <div class="field">
                            <label class="label" for="office"><?=_t['registro_frm_cargo']?></label>
                            <!-- <input type="text" name="office" disabled value="<?= $user->office; ?>"> -->
                            <span><?= $user->office; ?></span>
                        </div>
                        
                    <?php endif; ?>
                    
                        <div class="field">
                            <label class="label" for="username"><?=_t['registro_frm_usuario']?></label>
                            <!-- <input type="text" name="username" disabled value="<?= $user->username; ?>"> -->
                            <span><?= $user->username; ?></span>
                        </div>
                        <div class="field">
                            <label class="label" for="language">Idioma</label>


                            <!-- <input type="text" name="language" disabled value="<?= $user->language; ?>"> -->
                            <select name="language" id="language" disabled>
                                <option value="pt" <?= ($user->language === 'pt') ? 'selected' : ''; ?>>Português</option>
                                <option value="es" <?= ($user->language != 'pt' && $user->language != 'en') ? 'selected' : ''; ?>>Espanhol</option>
                                <option value="en" <?= ($user->language === 'en') ? 'selected' : ''; ?>>Inglês</option>
                            </select>
                        </div>
                    </div>
                </form>
                <div class="btnAction">
                    <button id="btn-edit-perfil" class="button dark-blue"><?=_t['perfil_btneditar']?></button>
                    <button id="btn-save-perfil" class="button light-blue btn-disabled"><?=_t['perfil_btnsalvar']?></button>
                    <button id="btn-logout-perfil" class="button light-blue logout"><a href="<?= home_url() . '/logout';?> "><?=_t['perfil_btnsair']?></a></button>
                </div>
            </div>
        </div>
        <?php if (isset($message['update']['status'])) :; ?>
            <div class="sendMessageReturn <?= $message['update']['status']; ?>"><?= $message['update']['message'] ?></div>
        <?php endif; ?>