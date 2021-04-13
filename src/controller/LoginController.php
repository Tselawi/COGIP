<?php

class LoginController
{


   public function render()
   {

      $addUser = new  RegisterManager();
      function verifyInput($var)
      {
         $var = trim($var);
         $var = stripslashes($var);
         $var = htmlspecialchars($var);
         return $var;
      }


      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         if (isset($_POST['login'])) {
            $username = verifyInput($_POST['username']);
            $password = verifyInput($_POST['password']);
            if (!$addUser->verifyUsername($username)) {
               $addUser->signIn(
                  $username,
                  $password
               );
            }
         }
      }

      require_once('./view/login.php');
   }
}
