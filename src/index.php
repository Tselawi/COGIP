<?php
declare(strict_types=1);

// session_start();

require_once('controller/HomepageController.php');
require_once('controller/InvoicesController.php');
require_once('controller/CompaniesController.php');
require_once('controller/ContactsController.php');
require_once('controller/DashboardController.php');
require_once('controller/AddCompanyDatabase.php');
require_once('controller/AddContactDatabase.php');
require_once('controller/AddInvoiceDatabase.php');
require_once('controller/RegisterController.php');
require_once('controller/LoginController.php');

$controller = new HomepageController();

if(isset($_GET['page']) && $_GET['page'] === 'register'){
  $controller= new RegisterController();
}
if(isset($_GET['page']) && $_GET['page'] === 'login'){
  $controller= new LoginController();
}
if (isset($_GET['page']) && $_GET['page'] === 'invoices') {
  $controller = new InvoicesController();
}
if (isset($_GET['page']) && $_GET['page'] === 'companies') {
  $controller = new CompaniesController();
}
if (isset($_GET['page']) && $_GET['page'] === 'contacts') {
  $controller = new ContactsController();
}
if (isset($_GET['page']) && $_GET['page'] === 'dashboard') {
  $controller = new DashboardController();
}
if (isset($_GET['page']) && $_GET['page'] === 'addcontact') {
  $controller = new AddContactDatabase();
}
if (isset($_GET['page']) && $_GET['page'] === 'addcompany') {
  $controller = new AddCompanyDatabase();
}
if (isset($_GET['page']) && $_GET['page'] === 'addinvoice') {
  $controller = new AddInvoiceDatabase();
}

$controller->render();
//  echo "<pre>";
//  var_dump($_GET);
//  echo "</pre>";
//   echo "<pre>";
//   var_dump($_POST);
//   echo "</pre>";
//   echo "<pre>";
//   var_dump($_SESSION);
//    echo "</pre>";
