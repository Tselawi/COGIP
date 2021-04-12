<?php

class LoginController{


public function render(){

   $addUser= new  RegisterManager();  
   require_once('./view/login.php');        
}
}