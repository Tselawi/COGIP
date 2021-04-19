<?php

require_once('./model/CompaniesManager.php');

class CompaniesController
{

public function render(){

  $companies = new CompaniesManager();
  require('./view/Companies.php');
}
}
