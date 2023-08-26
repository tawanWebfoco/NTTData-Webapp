btnComment = document.querySelectorAll('.action #comment');
function atualizaPost(array,content,id_comment){

let textArea = content.querySelector('#textareaComment')
let commentsArea = content.querySelector('.commentsArea')
let sendcommentbox  = content.querySelector('.sendcommentbox ')

const message = array.get('textareaComment');
const fullName = array.get('73037e233e8f173b8d1c7dbf873bc620');
const photo = array.get('5ae0c1c8a5260bc7b6648f6fbd115c35');
const id_user = array.get('f49c3c8440f6e6d19158446f7262c7e4');

textArea.value = '';
sendcommentbox.classList.toggle('active');

var dataAtual = new Date();
var dataPublicacao = new Date(comment.date);

var diferenca = dataAtual - dataPublicacao;

var diffDate = "Recente";

// Converter a diferença para segundos
diferenca = diferenca / 1000;

if (diferenca >= 31536000) {
  diffDate = Math.floor(diferenca / 31536000) + " anos atrás";
} else if (diferenca >= 2592000) {
  diffDate = Math.floor(diferenca / 2592000) + " meses atrás";
} else if (diferenca >= 86400) {
  diffDate = Math.floor(diferenca / 86400) + " dias atrás";
} else if (diferenca >= 3600) {
  diffDate = Math.floor(diferenca / 3600) + " horas atrás";
} else if (diferenca >= 60) {
  diffDate = Math.floor(diferenca / 60) + " minutos atrás";
}


let comments = document.createElement('div')

comments.className = 'comments'

comments.innerHTML = `
<div class="imgPerfil">
<img src="${photo}" alt="Imagem">
</div>
<div class="content">
<div class="person">
<h2>${fullName}</h2>
<span>${diffDate}</span>
</div>
<div class="message">
<span>${message}</span>
</div>
<div class="action">
<div id="like" class="like" b0461f23338d5d731f9cbc809012203b="${id_comment}" f49c3c8440f6e6d19158446f7262c7e4="${id_user}">
<svg width="22" height="19" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.08079 7.45061L5.35365 10.8021C6.53072 12.0074 8.46928 12.0074 9.64635 10.8021L12.9192 7.45061C14.3603 5.97494 14.3603 3.58242 12.9192 2.10675C11.4782 0.631083 9.14176 0.631084 7.70071 2.10675V2.10675C7.59064 2.21946 7.40936 2.21946 7.29929 2.10675V2.10675C5.85824 0.631084 3.52184 0.631083 2.08079 2.10675C0.639737 3.58242 0.639738 5.97494 2.08079 7.45061Z" stroke="#999999" />
                        </svg>
<div class="desc">Curtir</div>
</div>
</div>
<div class="peopleLiked">
                    <p><number></number><text></text> </p>
                </div>
</div>
`;


commentsArea.insertAdjacentElement ('afterbegin', comments)

document.getElementById('like').addEventListener('click', (button)=>{
    button = button.target
    
    while (button !== null) {
        if (button.classList.contains('like')) {
            liked(button)
            return true;
        }
        button = button.parentElement;
    }
})


}
function submitBtnComment(event){   
    const content = event.target.parentElement.parentElement;
    const boxComment = event.target.parentElement.parentElement.querySelector('.sendcommentbox')
    const formComment = event.target.parentElement.parentElement.querySelector('.sendcommentbox form#sendComment')
    
        event.preventDefault(); // Impedir o envio normal do formulário
        // Obter os dados do formulário
        var formData = new FormData(formComment);


    const homeUrl = document.homePath
    const pathComments = homeUrl+'/wp-content/themes/ntt-data/app/src/controller/feed/comment.php';
   
    fetch(pathComments, {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Erro na requisição: ' + response.statusText);
        }
        return response.text();
    })
    .then(data => {
        atualizaPost(formData,content,data)
    })
    .catch(error => {
        console.error('Erro:', error);
    });

}


btnComment.forEach(button => {
    button.addEventListener('click', e =>{
        
        const content = button.parentElement.parentElement;
        const boxComment = button.parentElement.parentElement.querySelector('.sendcommentbox')
        const formComment = button.parentElement.parentElement.querySelector('.sendcommentbox form#sendComment')

        boxComment.classList.toggle('active')

        formComment.removeEventListener('submit', submitBtnComment);
        formComment.addEventListener('submit', submitBtnComment);

    })
    
});