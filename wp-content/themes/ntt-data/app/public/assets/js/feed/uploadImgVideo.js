var uploadImg = document.getElementById('uploadImg');
var uploadVideo = document.getElementById('uploadVideo');
var messageError = document.getElementById('messageError');
var imageContent = document.getElementById('imageContent');
var inputUploadImage = document.querySelector('.inputUploadImage');
var inputUploadVideo = document.querySelector('.inputUploadVideo');
var nameImg = document.getElementById('nameImg');
var removeImg = document.getElementById('removeImg');

uploadImg.addEventListener('click', function(e) {
    console.log(e);
    e.preventDefault();
    inputUploadImage.click();
});

uploadVideo.addEventListener('click', function(e) {
    console.log(e);
    e.preventDefault();
    inputUploadVideo.click();
});


inputUploadImage.addEventListener('change', function() {
    var maxFileSize = 5 * 1024 * 1024; // tamanho maximo de imagem 5mb
    selectedImage = inputUploadImage.files[0];

    if(selectedImage.size > maxFileSize) {
        messageError.textContent = "A imagem é muito grande. Tamanho máximo: 1MB.";
        deleteAnexo();
        return
    }else{

    if (inputUploadImage.files && selectedImage && isValidImageType(selectedImage.type)) {
        console.log(inputUploadImage.files);
        var reader = new FileReader();

        reader.onload = function(event) {
            nameImg.innerHTML = selectedImage.name;
            messageError.textContent = "";
            imageContent.classList.add('active')
            thumbnail.src = event.target.result;
        }

        reader.readAsDataURL(selectedImage);
    }else{
        messageError.textContent = "Arquivo inválido. Selecione uma imagem.";
        deleteAnexo();
    }
}
});

inputUploadVideo.addEventListener('change', function() {

    var maxFileSize = 50 * 1024 * 1024; // tamanho maximo de imagem 50 mb
    selectedVideo = inputUploadVideo.files[0];
    console.log(selectedVideo);

    if(selectedVideo.size > maxFileSize) {
        messageError.textContent = "O vídeo é muito grande. Tamanho máximo: 20MB.";
        deleteAnexo();
        return
    }else{
    if (inputUploadVideo.files && inputUploadVideo.files[0] && isValidVideoType(inputUploadVideo.files[0].type)) {
        var reader = new FileReader();

        reader.onload = async function(event) {
            
            nameImg.innerHTML = inputUploadVideo.files[0].name;
            messageError.textContent = "";
            imageContent.classList.add('active')
            var video = document.createElement("video");
            video.src = URL.createObjectURL(selectedVideo);

            await video.play();

                    var canvas = document.createElement("canvas");
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    var ctx = canvas.getContext("2d");
                    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                    thumbnail.src = canvas.toDataURL();
        }

        reader.readAsDataURL(inputUploadVideo.files[0]);
    }else{
        messageError.textContent = "Arquivo inválido. Selecione um Vídeo.";
        deleteAnexo();

    }
}
});

function isValidImageType(type) {
    return /^image\/(jpeg|jpg|png)$/.test(type);
}

function isValidVideoType(type) {
    return /^video\/(mp4|webm|wmv|x-ms-wmv)$/.test(type);
}

function deleteAnexo() {
    imageContent.classList.remove('active')
    thumbnail.src = "#";
    nameImg.textContent = "";
    inputUploadImage.value = ""; // Limpa o campo de arquivo selecionado
    inputUploadVideo.value = ""; // Limpa o campo de arquivo selecionado
    selectedImage = null;
}