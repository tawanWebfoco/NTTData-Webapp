<div id="perfil" class="main">
    <section class="perfil">
        <div class="perfilContainer">
            <div class="box">
                <div class="photo">
                    <img class="imgPerfil" src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\photos/perfil/img-perfil.svg" alt="Imagem">
                    <span id="editImgPerfil">editar foto</span>
                </div>
                
                <!-- Imagem clicável -->
                <a id="uploadLink" href="#">
                    <img class="camera"  id="uploadedImage" src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/perfil/camera.svg" alt="Imagem para Upload">
                </a>

                <!-- Formulário de upload oculto -->
                <form id="uploadImgPerfil" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="upload_image">
                    <input type="hidden" name="upload" value="perfil">
                    <input type="file" name="imagem" id="imagem" style="display: none;">
                    <input type="submit" value="Enviar" style="display: none;">
                </form>

            </div>
            <div class="content">
                <div class="personalInfor">
                    <div class="field">
                        <label class="label" for="name">Nome</label>
                       
                        <input type="text" name="name" value="<?= $user->full_name; ?>">
                    </div>
                    <div class="field">
                        <label class="label" for="email">Email</label>
                        <input type="email" name="email" value="<?= $user->email; ?>">
                    </div>
                    <div class="field">
                        <label class="label" for="country">País</label>
                        <input type="text" name="country" value="<?= $user->country; ?>">
                    </div>
                    <div class="field">
                        <label class="label" for="office">Cargo</label>
                        <input type="text" name="office" value="<?= $user->office; ?>">
                    </div>
                    <div class="field">
                        <label class="label" for="username">Usuário</label>
                        <input type="text" name="username" value="<?= $user->username; ?>">
                    </div>
                </div>
                <div class="btnAction">
                        <button class="button dark-blue">Editar</button>
                        <button class="button light-blue">Salvar</button>
                </div>
            </div>
        </div>
        <div class="invite">
            <div class="text">
                <h3>Convidar Amigo</h3>
                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc consequat congue magna in blandit. Phasellus at metus ut arcu mollis blandit. Aliquam sapien turpis.</span>
            </div>
            <form class="inputs">
                <div class="field">
                    <label class="label" for="email">e-mail</label>
                    <input type="email" name="email">
                    <!-- <i class="addEmail"><b>|</b><b>|</b></i> -->
                    <img class="addEmail" src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/perfil/circle.svg" alt="Imagem">
                </div>
                <div class="field">
                    <label class="label" for="email">e-mail</label>
                    <input type="email" name="email">
                    <!-- <i class="addEmail"><b>|</b><b>|</b></i> -->
                    <img class="addEmail" src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/perfil/add-circle.svg" alt="Imagem">
                </div>
                <div class="submit">
                    <button type="submit" class="button convidar dark-blue">Convidar</button>
                </div>
            </form>
        </div>
        <div class="guest">
            <h4>Confira sua lista de convidado efetivadas</h4>
            <ul>
                <li>Alexandre Santos</li> 
                <li>Fernando Oliveira</li>
                <li>Viviane Siqueira</li> 
                <li>Denise Silva</li>
            </ul>
        </div>
        <div class="regulation">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/cron/regulation.svg" alt="Icone Regulamento">
                <span>Leia o regulamento</span>
            </div>
    </section>
</div>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\js\perfil/uploadImg.js"></script>