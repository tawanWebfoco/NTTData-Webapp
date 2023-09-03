const btnThreeDots = document.querySelectorAll('.navPub #threeDots')


btnThreeDots.forEach(threeDots => {

   threeDots.removeEventListener('click', navButton(threeDots))

   threeDots.addEventListener('click', navButton(threeDots))

   
});


function navButton(threeDots){
   
   
   let closeNav = threeDots.parentElement.querySelector('#closeNav')
   let contentNav = threeDots.parentElement.querySelector('.contentNav')
   let btnDeletePub = threeDots.parentElement.querySelector('.deletePub')


  threeDots.addEventListener('click',()=>{
     contentNav.classList.add('active')
     threeDots.classList.add('active')
  })

  closeNav.addEventListener('click',()=>{
   console.log(closeNav);
     contentNav.classList.remove('active')
     threeDots.classList.remove('active')
  })

  btnDeletePub.addEventListener('click',()=>{
     deletePub(contentNav)
  })
}




function deletePub(pub){
   const id_pub = pub.getAttribute('a936911a342aacf7e7f4d060df8f53f7');
   const id_user = pub.getAttribute('2da0641547fff26275f8cd8baeb2403d');
   const user_id_user = pub.getAttribute('f49c3c8440f6e6d19158446f7262c7e4');
   
   if(id_pub){
      data = {
         type : "deletePub",
         id_pub,
         user_id_user,
         id_user
      }
      submitData(data,pub);
   }else{
      const id_comment = pub.getAttribute('b0461f23338d5d731f9cbc809012203b');
      data = {
         type : "deleteComment",
         id_comment,
         user_id_user,
         id_user
      }
      submitData(data,pub);

   }

}


function updateDeletPub(content){
   const pub = content.parentElement.parentElement.parentElement.parentElement;
   pub.parentElement.removeChild(pub);
}

function submitData(data,content){
   const homeUrl = document.homePath
   const pathComments = homeUrl +'/wp-content/themes/ntt-data/app/src/controller/feed/request/navPub.php';
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
            console.log(data);
            updateDeletPub(content)

           })
           .catch(error => {
           });
}