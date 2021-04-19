<?php require_once("include/header.php"); 
      
?>

<h2 class="my-4 d-flex justify-content-center"> Welcome to COGIP </h2>
<p class="mx-3 fs-2 mx-4">HELLO !</p>
<p class="mx-3 fs-2 mx-4">What would you like to do today ?</p>

<!-- -------------------------------########### Modal invoice ########### -------------------------------- -->

<div class="modal fade" id="newinvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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
          <button type="submit" name="invoice" class="btn btn-primary">Submit</button>
          <?php if (isset($_POST['invoice'])) : ?>
            <div class="alert alert-success" role="alert">
              Data Saved !
            </div>
          <?php else : ?>
            <?php if (isset($_POST['invoice'])) : ?>
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
</div>


<!-- -------------------------------########### Modal Contact ########### -------------------------------- -->

<div class="modal fade" id="newcontact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="">

        <div class="modal-body">

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="last_name" class="badge bg-dark my-1">Surename :</label>
              <input type="text" placeholder="Enter your last name" name="last_name" class="form-control" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="first_name" class="badge bg-dark my-1">First name :</label>
              <input type="text" placeholder="Enter your first name" name="first_name" class="form-control" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="email" class="badge bg-dark my-1">Email:</label>
              <input type="email" placeholder="Enter your email address" name="email" class="form-control" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="contact" class="badge bg-dark my-1">Company :</label>
              <select type="text" name="company_id" value="">
                <?php foreach ($contacts->getAllOfCompanies() as $contact) : ?>
                  <option type="text" class="form-control" value="<?= $contact['company_id'] ?>"><?= $contact['company_name'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="contact" class="btn btn-primary">Submit</button>
          <?php if (isset($_POST['contact'])) : ?>
            <div class="alert alert-success" role="alert">
              Data Saved !
            </div>
          <?php else : ?>
            <?php if (isset($_POST['contact'])) : ?>
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
</div>

<!-- -------------------------------########### Modal Company ########### -------------------------------- -->

<div class="modal fade" id="newcompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Company</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="" method="POST">
        <div class="modal-body">

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="companyName" class="badge bg-dark my-1">Company name:</label>
              <input type="text" placeholder="Enter your Company name" name="company_name" class="form-control" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="VATnumber" class="badge bg-dark my-1">VAT number:</label>
              <input type="text" placeholder="Enter the VAT number" name="VAT_number" class="form-control" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="country" class="badge bg-dark my-1">Country:</label>
              <input type="text" placeholder="Enter Your country" name="country" class="form-control" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="contact" class="badge bg-dark my-1">Company type:</label>
              <select type="text" name="type_id" value="">
                <?php foreach ($companies->getType() as $type) : ?>
                  <option type="text" class="form-control" value="<?= $type['type_id'] ?>"><?= $type['company_type'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="company" class="btn btn-primary">Submit</button>
        
        <?php if(isset($_POST['company'])) :?> 
          <div class="alert alert-success" role="alert">
              Data Saved !
            </div>
        <?php else : ?>
          <?php if (isset($_POST['company'])) : ?>
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
      <form action=""  method="POST">
        <th><button type="button" data-toggle="modal" data-target="#editinvoice" name=""  value="<?= $invoice['invoice_id'] ?>" class="btn btn-info">Edit</button></th>
        <th><button name="deleteId" value="<?= $invoice['invoice_id'] ?>" class="btn btn-danger">Delete</button></th>
      </form>
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
      <form action="" method="POST">
      <th><button type="button" name="" data-toggle="modal" data-target="#editcontact" class="btn btn-info">Edit</button></th>
      <th><button  name="deleteId" value="<?= $contact['employee_id'] ?>" class="btn btn-danger">Delete</button></th>
      </form>
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
    <?php foreach ($companies->getCompany() as $company) :  ?>
      <th><?= $company['company_name'] ?></th>
      <th><?= $company['VAT_number'] ?></th>
      <th><?= $company['country'] ?></th>
      <th><?= $company['company_type'] ?></th>
      <form action="" method="POST">
      <th><button type="button" name="" value="" data-toggle="modal" data-target="#editcompany" class="btn btn-info">Edit</button></th>
      <?php require('updateDatabase.php'); ?>
      <th><button  name="deleteId" value="<?= $company['company_id'] ?>" class="btn btn-danger">Delete</button></th>
      </form>
  </tr>
<?php endforeach ?>
</table>
<?php require_once("include/footer.php"); ?>