<?php require_once "include/header.php";?>
    <section>

        <h2 class="my-5 d-flex justify-content-center">COGIP : List of invoices</h2>

        <p class="fs-6 mx-4 btn btn-outline-dark"><a href="../"> Back to homepage</a> </p>

        <table class="my-4 table mx-4">
          <thead>
            <tr>
              <th scope="col">Invoice Number</th>
              <th scope="col">Dates</th>
              <th scope="col">companies</th>
              <th scope="col">Type</th>
            </tr>
          </thead>
          <tr>
            <?php foreach ($invoices->displayInvoice() as $invoice) : ?>
              <form method="POST" action= "">
                  <th><button type="submit" class="btn btn-link"  name="invoice"><?= $invoice['invoice_number'] ?></button></th>
                  <input type="hidden" name="number" value="<?= $invoice['invoice_number']  ?>">
                  <input type="hidden" name="invoice_id" value="<?= $invoice['invoice_id']  ?>">
                  <input type="hidden" name="invoice_id" value="<?= $invoice['invoice_id']  ?>">
                </form>
                  <th><?= $invoice['invoice_date'] ?></th>
                  <th><?= $invoice['company_name']?></th>
                  <th><?= $invoice['company_type']?></th>
          </tr>
          <?php endforeach ?>
        </table>
        <?php
        # NOTE to display the datail of invoices
        if(isset($_POST['invoice'])) : ?>
        <h2 class="my-5 d-flex justify-content-center">Invoice : <?=  $_POST['number'] ?></h2>
        <p class="fs-5 mx-4">Company linked to the invoice </p>
          <table class="table mx-4">
            <thead>
              <tr>
                <th>Name</th>
                <th>VAT</th>
                <th>Type</th>
              </tr>
            </thead>
              <tr>
              <?php foreach($invoices->detailsCompanyInvoice($_POST['invoice_id']) as $company) : ?>
                <th><?= $company['company_name'] ?></th>
                <th><?= $company['VAT_number'] ?></th>
                <th><?= $company['company_type']?></th>
              </tr>
              <?php endforeach ?>
            </table>

            <p class="fs-5 mx-4">Contact person </p>
              <table class="table mx-4">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                  </tr>
                </thead>
                  <tr>
                  <?php foreach($invoices->detailsContactInvoice($_POST['invoice_id']) as $contact) : ?>
                    <th><?= $contact['first_name'].' '. $contact['last_name'] ?></th>
                    <th><?= $contact['email'] ?></th>
                  </tr>
                  <?php endforeach ?>
                </table>

        <?php echo "<script>window.opener.location.reload();</script>";
              echo "<script>window.close();</script>";   endif ?>
    </section>

<?php require_once "include/footer.php"; ?>
