<?php

require_once('./model/ContactsManager.php');

class ContactsController
{

public function render(){

  $contacts = new ContactsManager();
  require('./view/Contacts.php');
}

}
