<?php

require_once('./Model/CompaniesManager.php');


class AddCompanyDatabase{

  public function render(){

    $companies = new CompaniesManager();
    if(isset($_POST['addcompany'])){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $companies->addCompany(
          $_POST['company_name'],
          $_POST['country'],
          $_POST['type_id'],
          $_POST['VAT_number']
        );
      }
    }

    require('./view/addCompany.php');
  }
}
