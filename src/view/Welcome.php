<?php
declare(strict_types=1);
require_once("include/header.php");

?>

<h2 class="my-4 d-flex justify-content-center"> Welcome to COGIP </h2>
<p class="mx-3 fs-2 mx-4">HELLO !</p>
<p class="fs-5 mx-4">Last invoice :</p>
<table class="table mx-4">
  <thead>
    <tr>
      <th scope="col">Invoice Number</th>
      <th scope="col">Dates</th>
      <th scope="col">company</th>
    </tr>
  </thead>
  <tr>
    <?php foreach ($invoices->getInvoice() as $invoice) : ?>
          <th><?= $invoice['invoice_number'] ?></th>
          <th><?= $invoice['invoice_date'] ?></th>
          <th><?= $invoice['company_name']?></th>
  </tr>
  <?php endforeach ?>
</table>
  <p class="mx-4 fs-5">Last contacts :</p>
  <table class="table mx-4">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">e-mail</th>
        <th scope="col">company</th>
      </tr>
    </thead>
    <tr>
      <?php foreach($contacts->getContacts() as $contact): ?>
        <th><?= $contact['first_name'].' '. $contact['last_name'] ?></th>
        <th><?= $contact['email'] ?></th>
        <th><?= $contact['company_name'] ?></th>
    </tr>
    <?php endforeach ?>
  </table>
  <p class="mx-4 fs-5">Last companies :</p>
  <table class="table mx-4">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">VAT</th>
        <th scope="col">country</th>
        <th scope="col">type</th>
      </tr>
    </thead>
      <tr>
      <?php foreach($companies->getCompany() as $company) : ?>
        <th><?= $company['company_name'] ?></th>
        <th><?= $company['VAT_number'] ?></th>
        <th><?= $company['country'] ?></th>
        <th><?= $company['company_type'] ?></th>
      </tr>
      <?php endforeach ?>
    </table>

<?php require_once("include/footer.php"); ?>
