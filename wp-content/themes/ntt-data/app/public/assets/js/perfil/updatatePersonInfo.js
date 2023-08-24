document.addEventListener("DOMContentLoaded", function() {
    
const btnEditPerfil = document.querySelector('.perfil #btn-edit-perfil')
const btnSavePerfil = document.querySelector('.perfil #btn-save-perfil')
const personalInfoInput = document.querySelectorAll('.perfil .perfilContainer .personalInfo input');
const uploadPersonInfo = document.querySelector('.perfilContainer #uploadPersonInfo');
let arrayValues = []

// btnSavePerfil.addEventListener('click', ()=>{
//     console.log('oii');
//     uploadPersonInfo.submit();
// })
function chamaEvento(){
    uploadPersonInfo.submit();
}
btnEditPerfil.addEventListener('click', ()=>{
     
    if(!btnSavePerfil.classList.contains('btn-disabled')){
        btnSavePerfil.classList.toggle('btn-disabled');
        btnEditPerfil.classList.toggle('btn-danger');
        btnEditPerfil.innerHTML = 'Editar'
        personalInfoInput.forEach(input => {
            arrayValues[input.name] = input.value;
            input.setAttribute('readonly','')
            input.setAttribute('disabled','')
        }); 
        btnSavePerfil.removeEventListener('click', chamaEvento);
    }else{
        personalInfoInput.forEach(input => {
            if(input.name == 'country')return;
            if(input.name == 'email')return;
            if(input.name == 'office')return;
            if(input.name == 'username')return;

            arrayValues[input.name] = input.value;
            input.removeAttribute('readonly')
            input.removeAttribute('disabled')
        }); 
        
        btnEditPerfil.innerHTML = 'Cancelar'
        btnEditPerfil.classList.toggle('btn-danger');
        btnSavePerfil.classList.toggle('btn-disabled');
        btnSavePerfil.addEventListener('click',chamaEvento);
    }
})


// //   var form = document.getElementById("meuForm");
//   var resultadoDiv = document.getElementById("resultado");

//   form.addEventListener("submit", function(event) {
//     event.preventDefault(); // Impede o envio padrão do formulário

//     var formData = new FormData(form);

//     fetch(window.location.href, {
//       method: "POST",
//       body: formData
//     })
//     .then(response => response.text())
//     .then(data => {
//       resultadoDiv.innerHTML = data; // Atualiza a div com a resposta do servidor
//     })
//     .catch(error => {
//       resultadoDiv.innerHTML = "Ocorreu um erro ao processar a solicitação.";
//     });
//   });
});
