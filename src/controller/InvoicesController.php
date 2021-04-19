<?php

require_once('./model/InvoicesManager.php');


class InvoicesController
{

public function render(){

  $invoices = new InvoicesManager();

  require('./view/Invoices.php');
}

}
