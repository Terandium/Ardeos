<?php
  include 'assets/php/functions.php';
  $video['id'] = -1;
  if(isset($_GET["id"])) {
    //Video id set
    $video = getVideo($_GET["id"]);
    $videoMeta = getVideoMeta($video['id']);
    $user = getUserMeta($video['userid']);
  } else {
    //Video id not set
  }
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
    <h1><?php echo $videoMeta['title'] ?></h1>
    <video width="800" controls>
      <source src="cdn/videos/<?php echo $video['id'] ?>.mp4" type="video/mp4">
      Your browser does not support HTML5 video, download a newer browser.
    </video>
    <p id="description">Description: <?php echo $videoMeta['desc'] ?></p>
    <p id="account">Uploader: <?php echo $user['username'] ?></p>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>