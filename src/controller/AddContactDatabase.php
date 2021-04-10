<?php

require_once('./Model/ContactsManager.php');


class AddContactDatabase{

  public function render(){

  $contacts = new ContactsManager();
  if(isset($_POST['addcontact'])){
    if($_SERVER['REQUEST_METHOD']){
      $contacts->addContact(
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['email'],
        $_POST['company_id']
      );
    }
  }

    require('./view/addContact.php');
  }
}