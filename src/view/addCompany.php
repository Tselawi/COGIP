
<?php require_once("include/header.php"); ?>


<!-- -------------------------------########### Modal Company ########### -------------------------------- -->
<p class="fs-6 mx-4  my-5 btn btn-outline-dark"><a href="/?page=dashboard"> Back to Dashboard</a> </p>
<!-- <div class="modal fade" id="newcompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Company</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
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
          <button type="submit" name="addcompany" class="btn btn-primary">Submit</button>
        
        <?php if(isset($_POST['addcompany'])) :?> 
          <div class="alert alert-success" role="alert">
              Data Saved !
            </div>
        <?php else : ?>
          <?php if (isset($_POST['addcompany'])) : ?>
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