<?php

require_once('./Model/InvoicesManager.php');


class AddInvoiceDatabase
{

  public function render()
  {
    $invoices = new InvoicesManager();
    if (isset($_POST['addinvoice'])) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $invoices->addInvoice(
          $_POST['invoice_number'],
          $_POST['invoice_date'],
          $_POST['employee_id'],
          $_POST['company_id']
        );
      }
    }
    require('./view/addInvoice.php');
  }
}
