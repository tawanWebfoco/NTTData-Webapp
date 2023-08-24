<div class="invite">
    <div class="text">
        <h3>Convidar Amigo</h3>
        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc consequat congue magna in blandit. Phasellus at metus ut arcu mollis blandit. Aliquam sapien turpis.</span>
    </div>
    <form id="formGuest" class="inputs" method="post" enctype="multipart/form-data" action="">
        <div class="container">
            <div class="field">
                <label class="label" for="email[]">e-mail</label>
                <input type="email" name="email[]" required>
                <img id="addEmail" class="addEmail" src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/perfil/add-circle.svg" alt="Imagem">
            </div>
        </div>
        <input type="hidden" name="type" value="guest">
        <div class="submit">
            <button type="submit" class="button convidar dark-blue">Convidar</button>
        </div>
    </form>

    <?php if(isset($message['sendEmail']['status'])) :; ?>
        <div class="sendMessageReturn <?= $message['sendEmail']['status']; ?>"><?= $message['sendEmail']['message'] ?></div>
    <?php endif; ?>
</div>