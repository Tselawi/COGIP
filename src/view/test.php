if (isset($_POST['invoice'])) : ?>

  <!-- <table class="table mx-4">
    <thead>
      <tr>
        <th>Name</th>
        <th>VAT</th>
        <th>country</th>
      </tr>
    </thead>
      <tr> -->
      <?php foreach($invoices->detailsCompanyInvoice() as $company) : ?>
        <th><?= $company['company_name'] ?></th>
        <th><?= $company['VAT_number'] ?></th>
        <th><?= $company['country'] ?></th>
      </tr>
      <?php endforeach ?> -->
    </table>
<?php endif ?>
<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>

<?php foreach ($invoices->setInvoice() as $invoice) : ?>
  <?php endforeach ?>
<a href="dashboard.php?idDel=<?= $invoice['invoice_id'];?>"
  <a href="dashboard.php?idEdit=<?= $invoice['invoice_id'];?>
<?php if(isset($_GET['page']) === 'addinvoice'): ?>


  <!-- create invoice -->
<?php require_once("include/header.php"); ?>
<!-- // $invoices->setInvoice($companyName, $contactName);
// $invoices->setInvoice($_POST['company_id'], $_POST['employee_id']);
// $invoiceNumber= tirm($_POST['invoice_number']);
// $invoiceDate= tirm($_POST['invoice_date']);
// $companyName= $_POST['company_id'];
// $contactName= $_POST['employee_id'] -->



<h2 class="my-4 d-flex justify-content-center"> Welcome to COGIP </h2>
<h5 class="mx-3 my-4 fs-2 mx-4">Create New Invoice</h5>

<section class="container-fluid container-add">
<form action="" method="POST">
  <div class="add-content">
    <label for="invoicenumber">Invoice Number :</label>
    <input type="text" name="invoice_number" class="form-content"  placeholder="Enter your invoice number" required>
</div>
<div>
    <label for="invoicedate">Invoice Date :</label>
    <input type="text" name="invoice_date" class="form-content"  placeholder="dd-mm-yyyy"  required>
  </div>

  <div>
    <label for="company" class="my-1">Company :</label>
      <select type='text' name="company_id" value="">
        <?php foreach($invoices->getAllContacts() as $company)  :?>
          <option value="<?= $company['company_id'] ?>"><?= $company['company_name'] ?></option>
        <?php endforeach ?>
      </select>
  </div>

  <div>
    <label for="invoice" class="my-1">Contact Person regarding the invoice :</label>
    <select type='text' name= invoice_id value="">
      <option type="text" name="employee_id" id="company"  value=""></option>
</select>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</section>


<?php require_once("include/footer.php"); ?>

<!-- <?php include('errors.php'); ?> -->