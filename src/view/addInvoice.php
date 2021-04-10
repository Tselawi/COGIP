
<?php require_once("include/header.php"); ?>
<!-- -------------------------------########### Modal invoice ########### -------------------------------- -->
<p class="fs-6 mx-4  my-5 btn btn-outline-dark"><a href="/?page=dashboard"> Back to Dashboard</a> </p>
<!-- <div class="modal fade" id="newinvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Invoice</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>

      <form method="POST" action="">

        <div class="modal-body">

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="invoice" class="badge bg-dark my-1">Invoice Number :</label>
              <input type="text" placeholder="Enter your invoice number" name="invoice_number" id="invoiceNumber" class="form-control" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="date" class="badge bg-dark my-1">Invoice Date :</label>
              <input type="text" placeholder="YYYY-MM-DD" name="invoice_date" id="invoiceDate" class="form-control" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="contact" class="badge bg-dark my-1">Company regarding the invoice:</label>
              <select type="text" name="company_id" value="">
                <?php foreach ($invoices->getAllCompanies() as $company) : ?>
                  <option type="text" id="firstName" class="form-control" value="<?= $company['company_id'] ?>"><?= $company['company_name'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="contact" class="badge bg-dark my-1">Contact Person regarding the invoice :</label>
              <select type="text" name="employee_id" value="">
                <?php foreach ($invoices->getAllContacts() as $contact) : ?>
                  <option type="text" id="firstName" class="form-control" value="<?= $contact['employee_id'] ?>"><?= $contact['first_name'] . ' ' . $contact['last_name'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="addinvoice" class="btn btn-primary">Submit</button>
          <?php if (isset($_POST['addinvoice'])) : ?>
            <div class="alert alert-success" role="alert">
              Data Saved !
            </div>
          <?php else : ?>
            <?php if (isset($_POST['addinvoice'])) : ?>
              <div class="alert alert-danger" role="alert">
                Error !
              </div>
            <?php endif ?>
          <?php echo "<script>window.opener.location.reload();</script>";
            echo "<script>window.close();</script>";
          endif ?>
        </div>
      </form>
    </div>
  </div>
<!-- </div> -->
<?php require_once("include/footer.php"); ?>