<?php

require_once('./Model/ContactsManager.php');

class ContactsController
{

public function render(){

  $contacts = new ContactsManager();
  require('./view/Contacts.php');
}

}
