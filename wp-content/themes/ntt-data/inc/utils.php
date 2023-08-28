<?php

function userLoginJS($user){
  // echo "<script src='" . get_stylesheet_directory_uri() . "/app/public/assets/js/global.js'></script>";
  // echo "<script src='" . get_stylesheet_directory_uri() . "/app/public/assets/js/components/userStorage.js'></script>";
  $html = <<<HTML

    <script>
             
      // Document.prototype.user = {
      //   id_user: "$user->id_user",
      //   full_name: "$user->full_name",
      //   email: "$user->email",
      //   country: "$user->country",
      //   username: "$user->username",
      //   password: "$user->password",
      //   photo: "$user->photo",
      //   score: $user->score,
      //   time: "$user->time",
      //   date_start: "$user->date",
      //   trash: "$user->trash"
      // }

      // const userStorage = new UserStorage;
      // console.log(user);
      // console.log(userStorage);
      // userStorage.setStorage(user);
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