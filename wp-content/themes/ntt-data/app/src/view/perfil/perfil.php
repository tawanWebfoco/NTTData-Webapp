<div id="perfil" class="main">
    <section class="perfil">
        <div class="perfilContainer">
            <div class="box">
                <div class="photo">
                    <?php
                    // print_r($user);
                    if($user->photo){
                        $image_path = ABSPATH . str_replace(home_url(), '', $user->photo);
                        if(file_exists($image_path)){
                            $url_img = $user->photo; 
                            
                            $image_extension = pathinfo($url_img, PATHINFO_EXTENSION);

                            // Adiciona "-100x100" antes da extensão
                            // $new_image_url = preg_replace('/\.' . $image_extension . '$/', '-100x100.' . $image_extension, $url_img);
                            // $url_img = $new_image_url;
                            
                        }else{
                            $url_img = get_stylesheet_directory_uri() . '/app/public\assets\img\photos/perfil/img-perfil.svg';
                        }   
                    }else{
                        $url_img = get_stylesheet_directory_uri() . '/app/public\assets\img\photos/perfil/img-perfil.svg';

                    }
                    ?>
                    <img class="imgPerfil" src="<?= $url_img;?>" alt="Imagem">
                    <span id="editImgPerfil">editar foto</span>
                    </div>
                
                <!-- Imagem clicável -->
                <a id="uploadLink" href="#">
                    <img class="camera"  id="uploadedImage" src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/perfil/camera.svg" alt="Imagem para Upload">
                </a>

                <!-- Formulário de upload oculto -->
                <!-- <form id="uploadImgPerfil" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" enctype="multipart/form-data"> -->
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
                        <label class="label" for="full_name">Nome</label>
                       
                        <input type="text" name="full_name" disabled value="<?= $user->full_name; ?>">
                    </div>
                    <div class="field">
                        <label class="label" for="email">Email</label>
                        <!-- <input type="email" name="email" disabled value="<?= $user->email; ?>"> -->
                        <span><?= $user->email; ?></span>
                    </div>
                    <div class="field">
                        <label class="label" for="country">País</label>
                        <!-- <input type="text" name="country" disabled value="<?= $user->country; ?>"> -->
                        <span><?= $user->country; ?></span>
                    </div>
                    <div class="field">
                        <label class="label" for="office">Cargo</label>
                        <!-- <input type="text" name="office" disabled value="<?= $user->office; ?>"> -->
                        <span><?= $user->office; ?></span>
                    </div>
                    <div class="field">
                        <label class="label" for="username">Usuário</label>
                        <!-- <input type="text" name="username" disabled value="<?= $user->username; ?>"> -->
                        <span><?= $user->username; ?></span>
                    </div>
                </div>
                </form >
                <div class="btnAction">
                        <button id="btn-edit-perfil" class="button dark-blue">Editar</button>
                        <button id="btn-save-perfil" class="button light-blue btn-disabled" >Salvar</button>
                </div>
            </div>
        </div>
        <?php if(isset($message['update']['status'])):; ?>
                        <div class="sendMessageReturn <?= $message['update']['status'];?>"><?= $message['update']['message']?></div>
                <?php endif; ?>
        <div class="invite">
            <div class="text">
                <h3>Convidar Amigo</h3>
                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc consequat congue magna in blandit. Phasellus at metus ut arcu mollis blandit. Aliquam sapien turpis.</span>
            </div>
            <form id="formGuest" class="inputs" method="post" enctype="multipart/form-data" action="">
                <div class="container">
                    <div class="field">
                        <label class="label" for="email[]">e-mail</label>
                        <input type="email" name="email[]">
                        <img id="addEmail" class="addEmail" src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/perfil/add-circle.svg" alt="Imagem">
                    </div>
                </div>
                                <input type="hidden" name="type" value="guest">
                <div class="submit">
                    <button type="submit" class="button convidar dark-blue">Convidar</button>
                </div>
            </form>

            <?php if(isset($message['sendEmail']['status'])):; ?>
                <div class="sendMessageReturn <?= $message['sendEmail']['status'];?>"><?= $message['sendEmail']['message']?></div>
           <?php endif; ?>
        </div>
        <div class="guest">
            <h4>Confira sua lista de convidado efetivadas</h4>
            <table>
                <?php 
                    if(isset($guest))
                    foreach ($guest as $key => $value) :  ?>
                        <tr>
                            <td><li id="lineName"><?= $value->full_name; ?></li><td>
                            <td><li>Pontos: <?= $value->score; ?></td></li>
                    </tr> 
                    <?php endforeach; ?>

                
            </table>
        </div>
        <div class="regulation">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/cron/regulation.svg" alt="Icone Regulamento">
                <span>Leia o regulamento</span>
            </div>
    </section>
</div>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\js\perfil/uploadImg.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\js\perfil/updatatePersonInfo.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\js\perfil/addRemoveEmail.js"></script>
