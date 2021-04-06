<?php

require_once('./Model/InvoicesManager.php');


class InvoicesController
{

public function render(){

  $invoices = new InvoicesManager();



  require('./view/Invoices.php');
}

}
