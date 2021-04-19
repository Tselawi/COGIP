<?php


require_once('./model/CompaniesManager.php');
require_once('./model/InvoicesManager.php');
require_once('./model/ContactsManager.php');

class DashboardController
{

  public function render()
  {

    $invoices = new InvoicesManager();
    if (isset($_POST['invoice'])) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $invoices->addInvoice(
          $_POST['invoice_number'],
          $_POST['invoice_date'],
          $_POST['employee_id'],
          $_POST['company_id']
        );
      }
    }
    if (isset($_POST['deleteId'])) {
      $invoices->deleteInvoice($_POST['deleteId']);
    }

    $contacts = new ContactsManager();
    if (isset($_POST['contact'])) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $contacts->addContact(
          $_POST['first_name'],
          $_POST['last_name'],
          $_POST['email'],
          $_POST['company_id']
        );
      }
    }
    if (isset($_POST['deleteId'])) {
      $contacts->deleteContact($_POST['deleteId']);
    }

    $companies = new CompaniesManager();
    
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['company'])) {
        $companies->addCompany(
          $_POST['company_name'],
          $_POST['country'],
          $_POST['type_id'],
          $_POST['VAT_number']
        );
      }
    }
    if (isset($_POST['deleteId'])) {
      $companies->deleteCompany($_POST['deleteId']);
    }
   
     
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['companyUpdate'])){
          $compId=$_POST['company_id'];
          var_dump($compId);
          $companies->updateCompany(
            $_POST['company_name'],
            $_POST['country'],
            (int)$_POST['VAT_number'],
            $compId
          );
      }
    }
    
  
    
    
  // if(isset($_POST['companyUpdate'])){
  //   $companies->editCompany($_POST['company_id']);
  // }    
    
    
    require_once('./view/Dashboard.php');
  }
}
