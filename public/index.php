<?php
  include 'assets/php/functions.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <title>Ardeos</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Ardeos</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item <?php isActive("index"); ?>">
                  <a class="nav-link" href="/">Home</a>
              </li>
              <li class="nav-item <?php isActive("popular"); ?>">
                  <a class="nav-link" href="/popular">Popular</a>
              </li>
              <li class="nav-item <?php isActive("upload"); ?>">
                  <a class="nav-link" href="/upload">Upload</a>
              </li>
          </ul>
          <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href = 'account.php'" >My account</button>
      </div>
    </nav>
    <h1>Ardeos Popular videos</h1>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>