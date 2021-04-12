<!-- -------------------------------########### update Modal invoice ########### -------------------------------- -->

<div class="modal fade" id="editinvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Invoice</h5>
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

<!-- -------------------------------########### update Modal Contact ########### -------------------------------- -->

<div class="modal fade" id="editcontact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Contact</h5>
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

<!-- -------------------------------###########  update Modal Company ########### -------------------------------- -->

<div class="modal fade" id="editcompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Company</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="" method="POST">
        <div class="modal-body">

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="companyName" class="badge bg-dark my-1">Company name:</label>
              <input type="text" value="<?= $company['company_name'] ?>" name="company_name" class="form-control"  required>
             
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="VATnumber" class="badge bg-dark my-1">VAT number:</label>
              <input type="text" value="<?= $company['VAT_number'] ?>" name="VAT_number" class="form-control" required>
              
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="country" class="badge bg-dark my-1">Country:</label>
              <input type="text" value="<?= $company['country'] ?>" name="country" class="form-control" required>
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
          <button type="submit" name="company_id" value="<?= $company['company_id'] ?>" class="btn btn-primary">Update</button>
        
        <?php if(isset($_POST['company_id'])) :?> 
          <div class="alert alert-success" role="alert">
              Data Saved !
            </div>
        <?php else : ?>
          <?php if (isset($_POST['company_id'])) : ?>
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