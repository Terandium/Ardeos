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
    <?php include('assets/php/header.php'); ?>
    <h1>Ardeos register</h1>
    
    <form action="assets/php/register.php" method="post">
      <div class="form-group">
        <label for="fname">Firstname:</label>
        <input type="text" class="form-control" name="fname" id="fname" aria-describedby="email" placeholder="Enter firstname">
        <small id="emailHelp" class="form-text text-muted">We'll never share your firstname with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="lname">Lastname:</label>
        <input type="text" class="form-control" name="lname" id="lname" aria-describedby="email" placeholder="Enter lastname">
        <small id="emailHelp" class="form-text text-muted">We'll never share your lastname with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="email" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>