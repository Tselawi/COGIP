<?php

require_once('./model/RegisterManager.php');

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
