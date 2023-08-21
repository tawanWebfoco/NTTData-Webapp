document.addEventListener('DOMContentLoaded', function() {

    var uploadLink = document.getElementById('uploadLink');
    var uploadImage = document.getElementById('uploadedImage');
    var uploadImgPerfil = document.getElementById('uploadImgPerfil');
    var imageInput = document.getElementById('imagem');

    uploadLink.addEventListener('click', function(e) {
        e.preventDefault();
        imageInput.click();
    });

    imageInput.addEventListener('change', function() {
        uploadImgPerfil.submit();
    });
});