<?php


require_once('./model/CompaniesManager.php');
require_once('./model/InvoicesManager.php');
require_once('./model/ContactsManager.php');


class HomepageController
{


    public function render()
    {

       $companies = new CompaniesManager();

       $invoices = new InvoicesManager();

       $contacts = new ContactsManager();

        require('./view/Welcome.php');
    }
}
