var uploadImg = document.getElementById('uploadImg');
var uploadVideo = document.getElementById('uploadVideo');
var messageError = document.getElementById('messageError');
var imageContent = document.getElementById('imageContent');
var inputUploadImage = document.querySelector('.inputUploadImage');
var inputUploadVideo = document.querySelector('.inputUploadVideo');
var textArea = document.querySelector('.sendpubbox #textareaPub');
var nameImg = document.getElementById('nameImg');
var removeImg = document.getElementById('removeImg');


uploadImg.addEventListener('click', function(e) {
    e.preventDefault();
    deleteAnexo();
    inputUploadImage.click();
});

uploadVideo.addEventListener('click', function(e) {
    e.preventDefault();
    deleteAnexo();
    inputUploadVideo.click();
});



inputUploadImage.addEventListener('change', function() {
    var maxFileSize = 30 * 1024 * 1024; // tamanho maximo de imagem 30mb
    selectedImage = inputUploadImage.files[0];

    if(selectedImage.size > maxFileSize) {
        messageError.textContent = feed_erroimggrande;
        deleteAnexo();
        return
    }else{

    if (inputUploadImage.files && selectedImage) {
        var reader = new FileReader();

        reader.onload = function(event) {
            
            textArea.removeAttribute('required');
            nameImg.innerHTML = selectedImage.name;
            messageError.textContent = "";
            imageContent.classList.add('active')
            thumbnail.src = event.target.result;
        }

        reader.readAsDataURL(selectedImage);
    }else{
        messageError.textContent = feed_erroimginvalida;
        deleteAnexo();
    }
}
});

inputUploadVideo.addEventListener('change', function() {

    var maxFileSize = 50 * 1024 * 1024; // tamanho maximo de imagem 50 mb
    selectedVideo = inputUploadVideo.files[0];
    console.log(selectedVideo);

    if(selectedVideo.size > maxFileSize) {
        messageError.textContent = feed_errovidgrande;
        deleteAnexo();
        return
    }else{
    if (inputUploadVideo.files && selectedVideo && isValidVideoType(selectedVideo.type)) {
        var reader = new FileReader();

        reader.onload = function(event) {
            
            textArea.removeAttribute('required');
            nameImg.innerHTML = selectedVideo.name;
            messageError.textContent = "";
            imageContent.classList.add('active')
            var video = document.createElement("video");
            video.src = URL.createObjectURL(selectedVideo);

            video.onloadedmetadata = function() {
                var canvas = document.createElement("canvas");
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                var ctx = canvas.getContext("2d");
                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

                var thumbnail = document.getElementById("thumbnail");
                thumbnail.src = canvas.toDataURL("image/jpeg");
            };



            // textArea.removeAttribute('required');
            // nameImg.innerHTML = selectedVideo.name;
            // messageError.textContent = "";
            // imageContent.classList.add('active')
            // var video = document.createElement("video");
            // video.src = URL.createObjectURL(selectedVideo);
            //  await video.play();
            //  var canvas = document.createElement("canvas");
            //  canvas.width = video.videoWidth;
            //  canvas.height = video.videoHeight;
            //  var ctx = canvas.getContext("2d");
            //  ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
            //  thumbnail.src = canvas.toDataURL();

        }

        reader.readAsDataURL(inputUploadVideo.files[0]);
    }else{
        console.log(inputUploadVideo[0]);
        messageError.textContent = feed_errovidinvalido;
        deleteAnexo();

    }
}
});

function isValidImageType(type) {
    return /^image\/(jpeg|jpg|png|hevc|heif|heic)$/.test(type);
}

function isValidVideoType(type) {
    return /^video\/(mp4|webm|wmv|x-ms-wmv|hevc|heif|heic|mov|quicktime)$/.test(type);
}

function deleteAnexo() {
    textArea.setAttribute('required','');
    console.log(textArea);
    imageContent.classList.remove('active')
    thumbnail.src = "#";
    nameImg.textContent = "";
    inputUploadImage.value = ""; // Limpa o campo de arquivo selecionado
    inputUploadVideo.value = ""; // Limpa o campo de arquivo selecionado
    selectedImage = null;
}