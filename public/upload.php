<?php
  include 'assets/php/functions.php';
  loginProtected();
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
    <h1>Ardeos uploader</h1>
    <form action="assets/php/upload.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Video Title" required>
      </div>
      <div class="form-group">
        <label for="desc">Description:</label>
        <input type="text" class="form-control" name="desc" id="desc" placeholder="Video Description" required>
      </div>
      <div class="form-group">
        <label for="tags">Tags:</label>
        <input type="text" class="form-control" name="tags" id="tags" placeholder="Video Tags (Separated by space or ',')" required>
      </div>
      <div class="form-group">
        <label for="thumbnail">Thumbnail:</label>
        <input type="file" class="form-control" name="thumbnail" id="thumbnail" required>
      </div>
      <div class="form-group">
        <label for="video">Video:</label>
        <input type="file" class="form-control" name="video" id="video" required>
      </div>
      <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>