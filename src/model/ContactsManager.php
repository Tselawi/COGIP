 <?php


require_once('Manager.php');

class ContactsManager extends Manager{

  // NOTE:display last 5 contact

  public function getContacts(){
    $db = $this->connectDb();

    try{
      $response = $db->prepare('SELECT * FROM employees
        JOIN companies on
        employees.employee_id=companies.company_id
        ORDER by employee_id DESC limit 5');
      $response->execute();
    }catch (Exception $e){
      echo $e->getMessage();
      exit();
    }
    return $response;
  }

// NOTE:display contact details

  public function displayContacts(){
    $db = $this->connectDb();

    try{
      $response = $db->prepare("SELECT * FROM employees
        INNER JOIN companies on
        employees.employee_id=companies.company_id
        INNER JOIN invoices ON
        invoices.invoice_id=employees.employee_id");

      $response->execute();
    }catch (Exception $e){
      echo $e->getMessage();
      exit();
    }
    return $response;
  }

  public function invoiceDetails($invoiceId){
    $db = $this->connectDb();

    try{
      $response = $db->prepare("SELECT *
        FROM invoices INNER JOIN companies
        ON companies.company_id = invoices.company_id
        INNER JOIN type_of_company
        ON type_of_company.type_id=companies.type_id
        INNER JOIN employees ON employees.employee_id=
        invoices.invoice_id
        WHERE invoice_id = :invoice_id");
      $response->execute(['invoice_id' => $invoiceId]);
    }catch (Exception $e){
      echo $e->getMessage();
      exit();
    }
    return $response;
  }

}
