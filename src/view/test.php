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
