<?php


require_once('Manager.php');

class InvoicesManager extends Manager
{
  // NOTE : GET Invoices
  public function getInvoice()
  {
    $db = $this->connectDb();
    // NOTE: last 5 invoices
    try {
      $response = $db->prepare('SELECT * FROM invoices i INNER JOIN
        companies c ON c.company_id = i.company_id
        ORDER BY invoice_id DESC LIMIT 5');
      $response->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
      exit();
    }
    return $response;
  }

  #NOTE: Display invoices
  public function displayInvoice()
  {
    $db = $this->connectDb();

    // NOTE: last 5 invoices
    try {

      $response = $db->prepare("SELECT * FROM invoices i 
    INNER JOIN companies c 
    ON c.company_id = i.company_id 
    INNER JOIN type_of_company t 
    ON t.type_id=c.type_id");
      $response->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
      exit();
    }
    return $response;
  }

  #NOTE: Display details of invoices
  public function detailsCompanyInvoice($invoiceId)
  {
    $db = $this->connectDb();

    // NOTE: last 5 invoices
    try {

      $response = $db->prepare("SELECT * FROM invoices i 
    INNER JOIN companies c 
    ON i.company_id=c.company_id 
    INNER JOIN type_of_company t 
    ON t.type_id=c.type_id 
    WHERE invoice_id = :invoice_id");
      $response->execute(['invoice_id' => $invoiceId]);
    } catch (Exception $e) {
      echo $e->getMessage();
      exit();
    }
    return $response;
  }

  public function detailsContactInvoice($invoiceId)
  {
    $db = $this->connectDb();
    try {

      $response = $db->prepare('SELECT * FROM invoices i INNER JOIN 
    employees e ON i.employee_id=e.employee_id
    INNER JOIN companies c ON i.company_id=c.company_id
    WHERE invoice_id=:invoice_id');
      $response->execute(['invoice_id' => $invoiceId]);
    } catch (Exception $e) {
      echo $e->getMessage();
      exit();
    }
    return $response;
  }

  //NOTE: delete invoice

  public function deleteInvoice($id)
  {
    $db = $this->connectDb();
    try {
      $response = $db->prepare("DELETE FROM invoices
          where invoice_id= $id");
      $response->execute();
      // return $response;
    } catch (Exception $e) {
      echo $e->getMessage();
      exit();
    }
  }

  // NOTE: Display Invoice regrading companies
  public function getAllCompanies()
  {
    $db = $this->connectDb();

    try {

      $response = $db->prepare('SELECT DISTINCT * FROM invoices i
              INNER JOIN companies c ON i.company_id = c.company_id
            ');
      $response->execute();

      return $response;
    } catch (Exception $e) {
      echo $e->getMessage();
      exit();
    }
  }

  public function getAllContacts()
  {
    $db = $this->connectDb();

    try {

      $response = $db->prepare('SELECT DISTINCT * FROM invoices i
                INNER JOIN employees e ON i.company_id = e.company_id
            ');
      $response->execute();

      return $response;
    } catch (Exception $e) {
      echo $e->getMessage();
      exit();
    }
  }

  // NOTE: controller invoices

  public function addInvoice($invoiceNumber, $invoiceDate, $employeeId, $companyId)
  {
    $db = $this->connectDb();
    try {

      $response = $db->prepare("INSERT INTO invoices
              (invoice_number, invoice_date, employee_id, company_id)
            VALUES (:invoiceNumber, :invoiceDate, :employeeId, :companyId)");
      $response->execute([
        'invoiceNumber' => $invoiceNumber,
        'invoiceDate' => $invoiceDate,
        'employeeId' => $employeeId,
        'companyId' => $companyId
      ]);
    } catch (Exception $e) {
      echo $e->getMessage();
      exit();
    }
    // return $response;
  }
}
