<?php

// require_once('./Model/ContactsManager.php');
require_once('./Model/CompaniesManager.php');
require_once('./Model/InvoicesManager.php');
require_once('./Model/ContactsManager.php');

class DashboardController
{

public function render(){
  $companies = new CompaniesManager();

  $invoices = new InvoicesManager();

  $contacts = new ContactsManager();

  require('./view/Dashboard.php');
}



}