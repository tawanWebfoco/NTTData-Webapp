btnComment = document.querySelectorAll('.action #comment');

function atualizaPost(array,content){


let textArea = content.querySelector('#textareaComment')
let commentsArea = content.querySelector('.commentsArea')
let sendcommentbox  = content.querySelector('.sendcommentbox ')


console.log(content);
console.log(textArea);
console.log(commentsArea);
console.log(sendcommentbox);


const message = array.get('textareaComment');
const fullName = array.get('73037e233e8f173b8d1c7dbf873bc620');
const photo = array.get('5ae0c1c8a5260bc7b6648f6fbd115c35');


let comments = document.createElement('div')

textArea.value = '';
sendcommentbox.classList.toggle('active');

comments.className = 'comments'

comments.innerHTML = `
<div class="imgPerfil">
<img src="${photo}" alt="Imagem">
</div>
<div class="content">
<div class="person">
<h2>${fullName}</h2>
</div>
<div class="message">
<span>${message}</span>
</div>
<div class="action">
<div class="like">
<img src="http://localhost/htdocs/Webfoco/nttdata/webapp/NTTData-Webapp/wp-content/themes/ntt-data/app/public/assets/img/icons/feed/heart-full.svg" alt="Imagem">
<div class="desc">Curtir</div>
</div>
</div>
</div>
`;

console.log(comments);

commentsArea.insertAdjacentElement ('afterbegin', comments)

}

btnComment.forEach(button => {
    button.addEventListener('click', e =>{
        const content = button.parentElement.parentElement;
        const boxComment = button.parentElement.parentElement.querySelector('.sendcommentbox')
        const formComment = button.parentElement.parentElement.querySelector('.sendcommentbox form#sendComment')
        // const btnSendComment = boxComment.querySelector('#btnSendComment');

        boxComment.classList.toggle('active')
        
        

        formComment.addEventListener('submit', event =>{
            
            event.preventDefault(); // Impedir o envio normal do formulário
            // Obter os dados do formulário
            var formData = new FormData(formComment);


        // Enviar a requisição usando o Fetch API
        fetch('wp-content/themes/ntt-data/app/src/controller/feed/comment.php', {
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
            atualizaPost(formData,content)
        })
        .catch(error => {
            console.error('Erro:', error);
        });
  


        })

    })
    
});