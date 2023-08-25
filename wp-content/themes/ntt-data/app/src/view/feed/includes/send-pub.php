<div class="sendpubbox">
                <form id="sendPub" action="" method="post" enctype="multipart/form-data">

                    <div class="top">
                    </div>

                    <div class="boxMain">
                        <input type="hidden" name="type" value="pub">
                        <textarea name="textareaPub" id="textareaPub" maxlength="140" placeholder="CAIXA DE PUBLICAÇÃO" rows="4" required></textarea>
                        
                        <input type="file" name="arquivoImg" class="inputUploadImage" id="arquivoImg" accept="image/*" style="display: none;" />
                        <input type="file" name="arquivoVideo" class="inputUploadVideo" id="arquivoVideo" accept="video/*" style="display: none;" />
                    </div>

                    <div class="imagemContainer">
                        <div id="imageContent">
                            <div>
                                <img id="thumbnail" src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\photos/not-found.jpg" alt="Miniatura" />
                                <span id="nameImg"></span>
                            </div>
                            <button onclick="deleteAnexo()">Apagar Arquivo</button>
                        </div>

                        <div id="messageError">
                        </div>
                    </div>

                    <div class="bottom">
                        <div class="aneximg">
                            <!-- <i class="fi fi-rr-picture"></i> -->
                            <a id="uploadImg" href="#">
                                <img   src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/feed/icon-img.svg" alt="Imagem">
                            </a>
                        </div>
                        <div class="anexvid">
                            <!-- <i class="fi fi-rr-play-alt"></i> -->
                            <a id="uploadVideo" href="#">
                                <img  src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/feed/icon-video.svg" alt="Imagem">
                            </a>
                        </div>
                        <div >
                            <button id="btn-pub" class="button dark-blue">Publicar</button>
                        </div>
                        <div>
                            <button id="btn-clean-pub" class="button light-blue">Limpar</button>
                        </div>
                    </div>
                </form>
            
</div>