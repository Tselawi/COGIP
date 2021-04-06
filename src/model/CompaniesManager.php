<?php


require_once('Manager.php');

class CompaniesManager extends Manager
{

  public function getCompany(){

    // NOTE: last 5 company name

    $db = $this->connectDb();

    try {
      $response = $db->prepare("SELECT * from companies
        JOIN type_of_company
        ON type_of_company.type_id=companies.type_id
        ORDER BY company_id DESC limit 5");
      $response->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
      exit;
    }
    return $response;
  }

  public function getClients(){

    // NOTE: last 5 company name

    $db = $this->connectDb();

    try {
      $response = $db->prepare("SELECT * FROM companies
        INNER JOIN
        invoices on invoices.invoice_id=companies.company_id
        AND invoices.employee_id where type_id=1");
      $response->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
      exit;
    }
    return $response;
  }

  public function getProviders(){

    // NOTE: last 5 company name

    $db = $this->connectDb();

    try {
      $response = $db->prepare("SELECT * FROM companies
        INNER JOIN
        invoices on invoices.invoice_id=companies.company_id
        AND invoices.employee_id where type_id=2");

      $response->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
      exit;
    }
    return $response;
  }

  public function contactDetails($employeeId){

    // NOTE: last 5 company name

    $db = $this->connectDb();

    try {
      $response = $db->prepare("SELECT * FROM companies INNER JOIN
        employees ON companies.company_id=employees.employee_id
        WHERE employee_id =:employee_id");
      $response->execute(['employee_id' => $employeeId]);
    } catch (Exception $e) {
      echo $e->getMessage();
      exit;
    }
    return $response;
  }

  public function invoiceDetails($invoiceId){

    // NOTE: last 5 company name

    $db = $this->connectDb();

    try {
      $response = $db->prepare("SELECT * FROM employees
        INNER JOIN invoices
        ON employees.employee_id=invoices.invoice_id where invoice_id=:invoice_id");
      $response->execute(['invoice_id'=> $invoiceId]);
    } catch (Exception $e) {
      echo $e->getMessage();
      exit;
    }
    return $response;
  }

}
