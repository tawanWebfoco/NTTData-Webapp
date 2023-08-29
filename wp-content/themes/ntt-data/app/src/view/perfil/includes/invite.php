<div class="invite">
    <div class="text">
        <h3><?=_t['perfil_convtitulo']?></h3>
        <span><?=_t['perfil_convtexto']?></span>
    </div>
    <form id="formGuest" class="inputs" method="post" enctype="multipart/form-data" action="">
        <div class="container">
            <div class="field">
                <label class="label" for="email[]"><?=_t['perfil_convemail']?></label>
                <input type="email" name="email[]" required>
                <img id="addEmail" class="addEmail" src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/perfil/add-circle.svg" alt="<?=_t['perfil_addemailalt']?>">
            </div>
        </div>
        <input type="hidden" name="type" value="guest">
        <div class="submit">
            <button type="submit" class="button convidar dark-blue"><?=_t['perfil_convbotao']?></button>
        </div>
    </form>

    <?php if(isset($message['sendEmail']['status'])) :; ?>
        <div class="sendMessageReturn <?= $message['sendEmail']['status']; ?>"><?= $message['sendEmail']['message'] ?></div>
    <?php endif; ?>
</div>