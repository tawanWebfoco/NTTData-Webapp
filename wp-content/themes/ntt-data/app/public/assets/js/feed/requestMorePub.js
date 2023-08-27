const receivepubbox = document.querySelector(".main .receivepubbox");
let btnSeeMorePub = document.getElementById("seeMorePublish");



btnSeeMorePub.addEventListener("click", ()=>{
   requestMorePub(['teste']);
});

function requestMorePub(data) {
   const homeUrl = document.homePath;
   const pathComments =
      homeUrl +
      "/wp-content/themes/ntt-data/app/src/controller/feed/request/requestMorePub.php";
   const encode = JSON.stringify(data);
   fetch(pathComments, {
      method: "POST",
      headers: {
         "Content-Type": "application/json",
      },
      body: encode,
   })
      .then((response) => {
         if (!response.ok) {
            throw new Error("Erro na requisição: " + response.statusText);
         }
         return response.text();
      })
      .then((data) => {
         // console.log(data);
         receivepubbox.innerHTML += data
         updateJsActionButton()
         const hasPub = document.getElementById('hasPub') || null
         if(hasPub){
            hasPub.innerHTML = 'Que pena, Não há mais publicações';
            // btnSeeMorePub.style.display = 'none';
            
         }
      })
      .catch((error) => {
         console.error("Erro:", error);
      });
}

function updateJsActionButton(){
   // comment
   btnComment = document.querySelectorAll('.action #comment');

   btnComment.forEach(button => {
       button.addEventListener('click', ()=>{
         callJsComment(button)
       })
   });

   // like
   btnLike = document.querySelectorAll('.action .like');
   btnLike.forEach(button => {
    button.addEventListener('click',()=>{
       liked(button)
    })
   });

}

