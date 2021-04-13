<?php

require_once('Manager.php');

class RegisterManager extends Manager{

public function signUp($userName, $password){
      $db=$this->connectDb();

      try{
            $response=$db->prepare(
            "INSERT INTO login(username, password)
                  VALUES(:username, :password)");
            $response->execute([
                  'username'=> $userName,
                  'password'=>password_hash($password,PASSWORD_DEFAULT)
            ]);
      }catch(Exception $e){
            echo $e->getMessage();
             exit();       
      }
}

public function signIn($userName, $password){
      $db=$this->connectDb();
      try{
            $response=$db->prepare("SELECT * FROM login 
            WHERE username = :username");
            $response->execute([
                  'username'=>$userName,
                  'password'=>$password
            ]);
            $response->fetch();
      }catch(Exception $e){
            echo $e->getMessage();
            exit();
      }
}

public function verifyUsername($userName){
      $db=$this->connectDb();
      try{
            $response=$db->prepare("SELECT username 
            FROM login WHERE username= :username");
            $response->execute([
                  'username'=>$userName
            ]);
            return $response->fetch();
      }catch(Exception $e){
            echo $e->getMessage();
            exit();
      }

}

}

