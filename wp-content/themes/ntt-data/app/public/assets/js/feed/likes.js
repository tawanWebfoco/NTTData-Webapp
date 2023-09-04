btnLike = document.querySelectorAll('.action .like');


btnLike.forEach(button => {

    button.removeEventListener('click',()=>{
        liked(button)
    })
    button.addEventListener('click',()=>{
        liked(button)
    })
    
});


function liked(button){
    
    const id_user = button.getAttribute('f49c3c8440f6e6d19158446f7262c7e4');
       
    if(button.getAttribute('a936911a342aacf7e7f4d060df8f53f7')){
        const id_pub = button.getAttribute('a936911a342aacf7e7f4d060df8f53f7');
        
        data= {
            id_pub,
            id_user,
            type: 'pub',
        }
        
    }else{
        const id_comment = button.getAttribute('b0461f23338d5d731f9cbc809012203b');
        data= {
            id_comment,
            id_user,
            type: 'comment',
        }
    }

   
    if(button.classList.contains('liked')){
        button.classList.toggle('liked')

        switch (document.language.toLowerCase()) {
            case 'pt':
                button.querySelector('.desc').innerHTML = 'Curtir';
              break;
              case 'en':
                button.querySelector('.desc').innerHTML = 'Like';
                break;
                default:
                button.querySelector('.desc').innerHTML = 'Me Gusta';
              break;
          }
        let likedNumb = button.parentElement.parentElement.querySelector('.peopleLiked number');
        let likeText = button.parentElement.parentElement.querySelector('.peopleLiked text');
        let originalNumber = likedNumb

        if(originalNumber.textContent <= 1){
            likedNumb.textContent = ''
            likeText.textContent = ''
        }else if(originalNumber.textContent == 2){
            likedNumb.textContent = likedNumb.textContent-1
            likeText.textContent = ' Curtida'
        }else if(originalNumber.textContent > 2){
            likedNumb.textContent = likedNumb.textContent-1
        }
        
        submitLike(data)
    }else{
        button.classList.toggle('liked')

        switch (document.language.toLowerCase()) {
            case 'pt':
                button.querySelector('.desc').innerHTML = 'Descurtir';
              break;
              case 'en':
                button.querySelector('.desc').innerHTML = 'Unike';
                break;
                default:
                button.querySelector('.desc').innerHTML = 'No Me Gusta';
              break;
          }


        let likedNumb = button.parentElement.parentElement.querySelector('.peopleLiked number');
        let likeText = button.parentElement.parentElement.querySelector('.peopleLiked text');
        let originalNumber = likedNumb

    
        if(originalNumber.textContent == '' || originalNumber.textContent == 0){
            likedNumb.textContent  = 1
            likeText.textContent = ' Curtida'
        }else if(originalNumber.textContent == 1 ){
            likedNumb.textContent ++
            likeText.textContent = ' Curtidas'
        }else if(originalNumber.textContent > 1 ){
            likedNumb.textContent ++
            likeText.textContent = ' Curtidas'
        }

        submitLike(data)

    }

}

function submitLike(data){
    const homeUrl = document.homePath
    const pathComments = homeUrl +'/wp-content/themes/ntt-data/app/src/controller/feed/request/likes.php';
   const encode =  JSON.stringify(data)
    fetch(pathComments, {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json" 
                  },
                body:encode
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro na requisição: ' + response.statusText);
                }
                return response.text();
            })
            .then(data => {
            })
            .catch(error => {
                console.error('Erro:', error);
            });
}