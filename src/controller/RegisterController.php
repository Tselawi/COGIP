<?php

require_once('./Model/RegisterManager.php');

class RegisterController
{

    public function render()
    {

        $addUser = new RegisterManager();

        function verifyInput($var)
        {
            $var = trim($var);
            $var = stripslashes($var);
            $var = htmlspecialchars($var);
            return $var;
        }
            
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = verifyInput($_POST['username']);
                $password = verifyInput($_POST['password']);
                $confirm_password = verifyInput($_POST['confirmPassword']);
                if ($password == $confirm_password) {
                    if (!$addUser->verifyUsername($username)) {
                        $addUser->signUp(
                            $username,
                            $password
                        );
                    }
                }
            
        }


        require_once('./view/Register.php');
    }
}

// $username = $password = $confirm_password = "";
//             $errors = array(); 
//             if(isset($_POST['reg_user'])) {
//               $username= trim($_POST['username']);
//               $password= trim($_POST['password']);
//               $confirm_password=trim($_POST['confirmPassword']);
//               // if(empty($username) || empty($password) )
//             }