<?php


require_once('Manager.php');

class InvoicesManager extends Manager{
// NOTE : GET Invoices
  public function getInvoice()
  {
    $db = $this->connectDb();

    // NOTE: last 5 invoices
    try{

      $response = $db->prepare('SELECT * FROM invoices INNER JOIN
        companies ON companies.company_id = invoices.company_id
        ORDER BY invoice_id DESC LIMIT 5');
      $response->execute();

  } catch (Exception $e){
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
  try{

    $response = $db->prepare("SELECT *
      FROM invoices INNER JOIN companies
      ON companies.company_id = invoices.company_id
      INNER JOIN type_of_company
      ON type_of_company.type_id=companies.type_id");
    $response->execute();

} catch (Exception $e){
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
  try{

    $response = $db->prepare("SELECT * FROM invoices
      INNER JOIN companies ON
      invoices.invoice_id=companies.company_id
      INNER JOIN type_of_company ON
      type_of_company.type_id=companies.type_id WHERE invoice_id= :invoice_id");
    $response->execute(['invoice_id' => $invoiceId]);

} catch (Exception $e){
    echo $e->getMessage();
    exit();
}
return $response;

}

public function detailsContactInvoice($invoiceId)
{
  $db = $this->connectDb();
  try{

    $response = $db->prepare('SELECT * FROM employees
      INNER JOIN invoices
      ON employees.employee_id=invoices.invoice_id WHERE invoice_id=:invoice_id');
    $response->execute(['invoice_id' => $invoiceId]);
} catch (Exception $e){
    echo $e->getMessage();
    exit();
}
return $response;

}


// NOTE: create invoices

public function setInvoice()
{
$db = $this->connectDb();
try{

        $response = $db->prepare("INSERT INTO invoices
          (invoice_id, invoice_number, invoice_date, company_id, employee_id)
        VALUES (NULL, '$invoiceNumber', '$invoiceDate', '$companyName', '$contactName') SELECT * FROM companies ");
        $response->execute();
    } catch (Exception $e){
        echo $e->getMessage();
        exit();
    }
    return $response;
  }

//NOTE: delete invoice

public function deleteInvoice()
{
$db = $this->connectDb();
try{

        $response = $db->prepare("DELETE * from Invoices");
        $response->execute();
    } catch (Exception $e){
        echo $e->getMessage();
        exit();
    }
    return $response;
  }


}
