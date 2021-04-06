<?php require_once "include/header.php";?>

    <section>

      <h2 class="my-5 d-flex justify-content-center">COGIP : Contact directory</h2>
<p class="fs-6 mx-4 btn btn-outline-dark"><a href="../"> Back to homepage</a> </p>

      <table class="table mx-4">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">e-mail</th>
            <th scope="col">company</th>
          </tr>
        </thead>
        <tr>
          <?php foreach($contacts->displayContacts() as $contact): ?>
            <form action="" method="post">
            <th><button type="submit" name="details" class="btn btn-link"><?= $contact['first_name'].' '. $contact['last_name'] ?></a></th>
              <input type="hidden" name="contact" value="<?= $contact['first_name'].' '. $contact['last_name'] ?>">
              <input type="hidden" name="company" value="<?= $contact['company_name'] ?>">
              <input type="hidden" name="email" value="<?= $contact['email'] ?>">
              <input type="hidden" name="invoice_id" value="<?= $contact['invoice_id'] ?>">
            </form>
            <th><?= $contact['email'] ?></th>
            <th><?= $contact['company_name'] ?></th>
        </tr>
        <?php endforeach ?>
      </table>
      <?php if(isset($_POST['details'])) : ?>
        <h4 class="mx-4">Contact: <?=  $_POST['contact'] ?></h4>
        <h4 class="mx-4">Company: <?=  $_POST['company'] ?></h4>
        <h4 class="mx-4">Email: <?=  $_POST['email'] ?></h4>
        <p class="fs-5 mx-4">Contact person for these invoices:  </p>
        <table class="table mx-4">
          <thead>
            <tr>
              <th scope="col" width="40%">Invoice number</th>
              <th scope="col">Date</th>
            </tr>
          </thead>
          <tr>
            <?php foreach ($contacts->invoiceDetails($_POST['invoice_id']) as $contact) : ?>
              <th><?= $contact['invoice_number'] ?></th>
                <th><?= $contact['invoice_date'] ?></th>
              </tr>
            <?php endforeach ?>
          </table>
      <?php echo "<script>window.opener.location.reload();</script>";
            echo "<script>window.close();</script>"; endif ?>
    </section>

<?php require_once "include/footer.php"?>
