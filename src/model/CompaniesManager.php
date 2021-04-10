<?php


require_once('Manager.php');

class CompaniesManager extends Manager
{

  public function getCompany(){

    // NOTE: last 5 company name

    $db = $this->connectDb();

    try {
      $response = $db->prepare("SELECT * from companies c
        JOIN type_of_company t
        ON t.type_id=c.type_id
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
      $response = $db->prepare("SELECT * FROM companies c 
      INNER JOIN invoices i ON
      i.company_id=c.company_id 
      INNER JOIN employees e ON
      i.employee_id=e.employee_id 
      WHERE type_id=1");
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
      $response = $db->prepare("SELECT * FROM companies c 
      INNER JOIN invoices i ON
      i.company_id=c.company_id 
      INNER JOIN employees e ON 
      i.employee_id=e.employee_id 
      WHERE type_id=2");
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
      $response = $db->prepare("SELECT * FROM companies c 
      INNER JOIN employees e 
      ON c.company_id=e.company_id 
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
      $response = $db->prepare("SELECT * FROM employees e
       INNER JOIN invoices i 
       ON e.employee_id=i.employee_id
        where invoice_id=:invoice_id");
      $response->execute(['invoice_id'=> $invoiceId]);
    } catch (Exception $e) {
      echo $e->getMessage();
      exit;
    }
    return $response;
  }


  public function addCompany($companyName, $country, $typeId, $vatNumber){
    $db=$this->connectDb();
    try{
      $response=$db->prepare("INSERT INTO companies (company_name, country, type_id, VAT_number)
      VALUES(:companyName, :country, :typeId, :vatNumber)");
      $response->execute(
        ['companyName'=> $companyName,
        'country'=>$country,
        'typeId'=>$typeId,
        'vatNumber'=>$vatNumber
        ]);
    }catch(Exception $e){
      echo $e->getMessage();
      exit();
    }
  }

  public function getType(){
    $db=$this->connectDb();
    try{
      $response=$db->prepare("SELECT * FROM type_of_company t 
      INNER JOIN companies c ON t.type_id=c.type_id");
      $response->execute();
      return $response;
    }catch(Exception $e){
      echo $e->getMessage();
      exit();
    }
  }

  # delete company
public function deleteCompany()
{
$db = $this->connectDb();
try{
      $id=$_POST['deleteId'];
        $response = $db->prepare("DELETE FROM companies
          where company_id= $id");
        $response->execute();
    } catch (Exception $e){
        echo $e->getMessage();
        exit();
    }
    return $response;
  }

}
