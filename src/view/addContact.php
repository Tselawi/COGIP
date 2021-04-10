<?php require_once("include/header.php"); ?>

<!-- -------------------------------########### Modal Contact ########### -------------------------------- -->
<p class="fs-6 mx-4  my-5 btn btn-outline-dark"><a href="/?page=dashboard"> Back to Dashboard</a> </p>
<!-- <div class="modal fade" id="newcontact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Contact</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
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
          <button type="submit" name="addcontact" class="btn btn-primary">Submit</button>
          <?php if (isset($_POST['addcontact'])) : ?>
            <div class="alert alert-success" role="alert">
              Data Saved !
            </div>
          <?php else : ?>
            <?php if (isset($_POST['addcontact'])) : ?>
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
