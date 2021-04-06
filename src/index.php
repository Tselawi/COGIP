<?php
declare(strict_types=1);

require_once('controller/HomepageController.php');
require_once('controller/InvoicesController.php');
require_once('controller/CompaniesController.php');
require_once('controller/ContactsController.php');
require_once('controller/DashboardController.php');

$controller= new HomepageController();

if(isset($_GET['page']) && $_GET['page'] === 'invoices'){
$controller= new InvoicesController();
}

if(isset($_GET['page']) && $_GET['page'] === 'companies'){
$controller= new CompaniesController();
}

if(isset($_GET['page']) && $_GET['page'] === 'contacts'){
$controller= new ContactsController();
}
if(isset($_GET['page']) && $_GET['page'] === 'dashboard'){
$controller= new DashboardController();
}

$controller -> render();

// echo "<pre>";
//  var_dump($_GET);
//  echo "</pre>";
//   echo "<pre>";
//   var_dump($_POST);
//   echo "</pre>";
//   echo "<pre>";
//   var_dump($_SESSION);
//    echo "</pre>";
