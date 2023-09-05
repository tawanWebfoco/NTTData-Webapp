<?php

function userLoginJS($user){
echo "<script src='" . get_stylesheet_directory_uri() . "/app/public/assets/js/global.js'></script>";
echo "<script src='" . get_stylesheet_directory_uri() . "/app/public/assets/js/components/userStorage.js'></script>";
$userType = get_class($user);

$html = <<<HTML
<script>
const user = {
  id_user: "$user->id_user",
  full_name: "$user->full_name",
  email: "$user->email",
  language: "$user->language",
  username: "$user->username",
  type: "$userType",
}

const userStorage = new UserStorage;
userStorage.setStorage(user);
// console.log('userStorage:'+user.id_user, userStorage.getStorage());
// window.location.href = 'https://webapp.webfoco.com/app';
</script>
HTML;
echo $html;
}

function getUserJs(){
echo "<script src='" . get_stylesheet_directory_uri() . "/app/public/assets/js/global.js'></script>";
echo "<script src='" . get_stylesheet_directory_uri() . "/app/public/assets/js/components/userStorage.js'></script>";

$html = <<<HTML
<script>
  const ValidStorage = new UserStorage;
  // const usernew = userStorage.getStorage();
  let userValid = null 
   userValid = ValidStorage.getStorage();
  // console.log(userValid);
  console.log('uservalid',userValid);
  if(userValid){
  const homeUrl = document.homePath
  // console.log(homeUrl);
   const pathComments = homeUrl+'/../../wp-content/themes/ntt-data/app/src/config/sessionJs.php';
  const encode =  JSON.stringify(userValid)
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

            window.location.href = 'https://webapp.webfoco.com/app';
            // window.location.href = 'http://localhost/webfoco/nttdata/web2/NTTData-Webapp/app';


           })
           .catch(error => {
           });
          }else{
            window.location.href = 'https://webapp.webfoco.com/login';
          }
</script>
HTML;
echo $html;
}

function userLogoutJS()
{
  echo "<script src='" . get_stylesheet_directory_uri() . "/app/public/assets/js/global.js'></script>";
  echo "<script src='" . get_stylesheet_directory_uri() . "/app/public/assets/js/components/userStorage.js'></script>";

$html = <<<HTML
  <script>
    const userStorage = new UserStorage;
    userStorage.removeStorage();
    localStorage.clear();
  </script>
HTML;

  echo $html;
}