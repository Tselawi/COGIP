<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@300&display=swap" rel="stylesheet">
  <!-- link css -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  <title>Cogip</title>

<body style="font-family: 'Inconsolata', monospace">
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand mx-3" href="/index.php">COGIP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/index.php">Home</a>
            </li>
          </ul>
  </header>
  <section>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Register User</h5>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
        </div>
        <form action="" method="POST">
          <div class="modal-body">
          <?php if (isset($_POST['username'])) : ?>
            <div class="alert alert-success" role="alert">
            Welcome <?= $_POST['username']; ?>
            </div>
          <?php else : ?>
            <div class="alert alert-danger" role="alert">
            check you inputs
            </div>
            <?php endif ?> 
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="username" class="badge bg-dark my-1">username:</label>
                <input type="text" placeholder="Enter your username" name="username" class="form-control" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="password" class="badge bg-dark my-1">Password:</label>
                <input type="password" placeholder="Enter your password" name="password" class="form-control" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="password" class="badge bg-dark my-1">Confirm password:</label>
                <input type="password" placeholder="Confirm your password" name="confirmPassword" class="form-control" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="reg_user" class="btn btn-primary">Register</button>
            </div>
            <p>
              Already a member? <a href="/?page=login">Sign in</a>
            </p>
        </form>
      </div>
    </div>
  </section>
  <?php require_once("include/footer.php"); ?>