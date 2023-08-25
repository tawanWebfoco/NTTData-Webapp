<div class="sendpubbox sendcommentbox">
    <form id="sendComment" class="sendPub sendComment"  method="post" >
        <input type="hidden" name="type" value="comment">
        <input type="hidden" name="<?= md5('id_pub');?>" value="<?= $pub->id_pub?>">
        <input type="hidden" name="<?= md5('id_user');?>" value="<?= $user->id_user?>">
        <input type="hidden" name="<?= md5('full_name');?>" value="<?= $user->full_name?>">
        <input type="hidden" name="<?= md5('photo');?>" value="<?= $user->photo?>">

        <div class="boxMain">
            <textarea name="textareaComment" id="textareaComment" maxlength="140" placeholder="Escreve seu comentário" rows="4" required></textarea>
        </div>

        <div class="bottom">
            <div>
                <button id="btnSendComment" class="button dark-blue">Comentar</button>
            </div>
        </div>
    </form>
    <div id="messageError">
    </div>
</div>