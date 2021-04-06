<?php

require_once('./Model/CompaniesManager.php');

class CompaniesController
{

public function render(){

  $companies = new CompaniesManager();
  require('./view/Companies.php');
}
}
