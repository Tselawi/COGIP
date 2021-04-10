<?php require_once "include/header.php";?>

    <section>

        <h2 class="my-5 d-flex justify-content-center">COGIP : Companies directory</h2>

        <p class="fs-6 mx-4 btn btn-outline-dark"><a href="../"> Back to homepage</a> </p>

        <p class="fs-5 mx-4"><strong>Clients</strong></p>

        <table class="table mx-4">
          <thead>
            <tr>
              <th scope="col" width="30%">Name</th>
              <th scope="col">VAT</th>
              <th scope="col">country</th>
            </tr>
          </thead>
            <tr>
            <?php foreach($companies->getClients() as $company) : ?>
              <form method="POST" action= "">
              <th><button type="submit" class="btn btn-link" name="client"><?= $company['company_name'] ?></button></th>
              <input type="hidden" name="vat" value="<?= $company['VAT_number'] ?>">
              <input type="hidden" name="type" value="Client">
              <input type="hidden" name="employee_id" value="<?= $company['employee_id']?>">
              <input type="hidden" name="invoice_id" value="<?= $company['invoice_id']?>">
              </form>
              <th><?= $company['VAT_number'] ?></th>
              <th><?= $company['country'] ?></th>
            </tr>
            <?php endforeach ?>
          </table>

        <p class="fs-5 mx-4"><strong>Providers</strong></p>

        <table class="table mx-4">
          <thead>
            <tr>
              <th scope="col" width="30%">Name</th>
              <th scope="col">VAT</th>
              <th scope="col">country</th>
            </tr>
          </thead>
            <tr>
            <?php foreach($companies->getProviders() as $company) : ?>
              <form method="POST" action="">
              <th><button type="submit" class="btn btn-link" name="provider"><?= $company['company_name'] ?></a></th>
              <input type="hidden" name="vat" value="<?= $company['VAT_number'] ?>">
              <input type="hidden" name="type" value="provider">
              <input type="hidden" name="employee_id" value="<?= $company['employee_id']?>">
              <input type="hidden" name="invoice_id" value="<?= $company['invoice_id']?>">
            </form>
              <th><?= $company['VAT_number'] ?></th>
              <th><?= $company['country'] ?></th>
            </tr>
            <?php endforeach ?>
          </table>
          <!-- clients -->
          <?php if(isset($_POST['client'])) : ?>
            <h4 class="my-2 mx-4">VAT number : <?=  $_POST['vat'] ?></h4>
            <h4 class="my-2 mx-4">Company type : <?=  $_POST['type'] ?></h4>
            <p class="fs-5 mx-4">Contact person </p>
              <table class="table mx-4">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                  </tr>
                </thead>
                  <tr>
                  <?php foreach($companies->contactDetails($_POST['employee_id']) as $company) : ?>
                    <th><?= $company['first_name'].' '. $company['last_name'] ?></th>
                    <th><?= $company['email'] ?></th>
                  </tr>
                  <?php endforeach ?>
                </table>
                <p class="fs-5 mx-4">Factures </p>
                <table class="my-4 table mx-4">
                  <thead>
                    <tr>
                      <th scope="col">Invoice Number</th>
                      <th scope="col">Dates</th>
                      <th scope="col">Contact person</th>
                    </tr>
                  </thead>
                  <tr>
                    <?php foreach ($companies->invoiceDetails($_POST['invoice_id']) as $company) : ?>
                      <th><?= $company['invoice_number'] ?></th>
                      <th><?= $company['invoice_date'] ?></th>
                      <th><?= $company['first_name']. ' ' . $company['last_name'] ?></th>
                    </tr>
                    <?php endforeach ?>
                  </table>

          <?php echo "<script>window.opener.location.reload();</script>";
                echo "<script>window.close();</script>";   endif ?>

                <!-- provider -->
          <?php if (isset($_POST['provider'])): ?>
            <h4 class="my-2 mx-4">VAT number : <?=  $_POST['vat'] ?></h4>
            <h4 class="my-2 mx-4">Company type : <?=  $_POST['type'] ?></h4>
            <p class="fs-5 mx-4">Contact person </p>
            <table class="table mx-4">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                </tr>
              </thead>
                <tr>
                <?php foreach($companies->contactDetails($_POST['employee_id']) as $company) : ?>
                  <th><?= $company['first_name'].' '. $company['last_name'] ?></th>
                  <th><?= $company['email'] ?></th>
                </tr>
                <?php endforeach ?>
              </table>
            <p class="fs-5 mx-4">Factures </p>
            <table class="my-4 table mx-4">
              <thead>
                <tr>
                  <th scope="col">Invoice Number</th>
                  <th scope="col">Dates</th>
                  <th scope="col">Contact person</th>
                </tr>
              </thead>
              <tr>
                <?php foreach ($companies->invoiceDetails($_POST['invoice_id']) as $company) : ?>
                  <th><?= $company['invoice_number'] ?></th>
                  <th><?= $company['invoice_date'] ?></th>
                  <th><?= $company['first_name']. ' ' . $company['last_name'] ?></th>
                </tr>
                <?php endforeach ?>
              </table>

              <?php echo "<script>window.opener.location.reload();</script>";
                    echo "<script>window.close();</script>";   endif ?>

    </section>

<?php require_once "include/footer.php"; ?>
