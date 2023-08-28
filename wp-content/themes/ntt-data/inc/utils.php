<?php

function userLoginJS($user){
  // echo "<script src='" . get_stylesheet_directory_uri() . "/app/public/assets/js/global.js'></script>";
  // echo "<script src='" . get_stylesheet_directory_uri() . "/app/public/assets/js/components/userStorage.js'></script>";
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