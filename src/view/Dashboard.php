<?php

require_once("include/header.php");





if (isset($_POST['invoice'])) {

$invoices->setInvoice();
$invoiceNumber= tirm($_POST['invoice_number']);
$invoiceDate= tirm($_POST['invoice_date']);
$companyName= $_POST['company_name'];
$contactName= $_POST['first_name'] .' '. $_POST['last_name'];

}


?>
<h2 class="my-4 d-flex justify-content-center"> Welcome to COGIP </h2>
<p class="mx-3 fs-2 mx-4">HELLO !</p>
<p class="mx-3 fs-2 mx-4">What would you like to do today ?</p>
<!-- Modal invoice-->
<div class="modal fade" id="newinvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="post" action="">

        <div class="modal-body">

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="invoice" class="badge bg-dark my-1">Invoice Number :</label>
              <input type="text" placeholder="Enter your invoice number" name="invoice_number" id="invoiceNumber" class="form-control" value="" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="date" class="badge bg-dark my-1">Invoice Date :</label>
              <input type="text" placeholder="Enter your invoice date" name="invoice_date" id="invoiceDate" class="form-control" value="" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="company" class="badge bg-dark my-1">Company :</label>
              <input type="text" name="company" id="companyName" class="form-control" value="<?php global $companyName ?>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="contact" class="badge bg-dark my-1">Contact Person regarding the invoice :</label>
              <input type="text" name="contact" id="firstName" class="form-control" value="<?php global $contactName ?>">
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="invoice" class="btn btn-primary">Submit</button>
        </div>

      </form>
    </div>
  </div>
</div>
<!-- Modal new contact-->

<div class="modal fade" id="newcontact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal new company-->

<div class="modal fade" id="newcompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Company</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal -->
<form class="mx-4 mb-4">
  <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#newinvoice">+ New Invoice</button>
  <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#newcontact">+ New Contact</button>
  <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#newcompany">+ New Company</button>
</form>

<p class="fs-5 mx-4">Last invoice :</p>
<table class="table mx-4">
  <thead>
    <tr>
      <th scope="col" width="20%">Invoice Number</th>
      <th scope="col">Dates</th>
      <th scope="col" width="20%">company</th>
      <th scope="col" width="10%">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tr>
    <?php foreach ($invoices->getInvoice() as $invoice) : ?>
      <th><?= $invoice['invoice_number'] ?></th>
      <th><?= $invoice['invoice_date'] ?></th>
      <th><?= $invoice['company_name'] ?></th>
      <th><a href="dashboard.php?id=<?= $invoice['invoice_id'];?>"><button type= "button" name= "editBtn" class="btn btn-info">Edit</button></a></th>
      <th><a href="dashboard.php?id=<?= $invoice['invoice_id'];?>"><button type= "button" name= "deleteBtn" class="btn btn-danger">delete</button></a></th>
  </tr>
<?php endforeach ?>
</table>
<p class="mx-4 fs-5">Last contacts :</p>
<table class="table mx-4">
  <thead>
    <tr>
      <th scope="col" width="25%">Name</th>
      <th scope="col" width="25%">e-mail</th>
      <th scope="col">company</th>
      <th scope="col" width="10%">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tr>
    <?php foreach ($contacts->getContacts() as $contact) : ?>
      <th><?= $contact['first_name'] . ' ' . $contact['last_name'] ?></th>
      <th><?= $contact['email'] ?></th>
      <th><?= $contact['company_name'] ?></th>
      <th><a href="dashboard.php?id=<?= $contact['employee_id']?>"><button type= "button" name= "editBtn" class="btn btn-info">Edit</button></a></th>
      <th><a href="dashboard.php?id=<?= $contact['employee_id']?>"><button type= "button" name= "deleteBtn" class="btn btn-danger">delete</button></a></th>
  </tr>
<?php endforeach ?>
</table>
<p class="mx-4 fs-5">Last companies :</p>
<table class="table mx-4">
  <thead>
    <tr>
      <th scope="col" width="20%">Name</th>
      <th scope="col">VAT</th>
      <th scope="col">country</th>
      <th scope="col">type</th>
      <th scope="col" width="10%">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tr>
    <?php foreach ($companies->getCompany() as $company) : ?>
      <th><?= $company['company_name'] ?></th>
      <th><?= $company['VAT_number'] ?></th>
      <th><?= $company['country'] ?></th>
      <th><?= $company['company_type'] ?></th>
      <th><a href="dashboard.php?id=<?= $company['company_id']?>"><button type= "button" name= "editBtn" class="btn btn-info">Edit</button></a></th>
      <th><a href="dashboard-php?id=<?=$company['company_id']?>"><button type= "button" name= "deleteBtn" class="btn btn-danger">delete</button></a></th>
  </tr>
<?php endforeach ?>
</table>
<?php ?>

<?php require_once("include/footer.php"); ?>
