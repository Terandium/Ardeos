<?php
include 'functions.php';

if($_POST["title"] !== null && $_POST["desc"] !== null && $_POST["tags"] !== null && $_POST["thumbnail"] !== null && $_POST["video"] !== null) {
  $video['title'] = $_POST["title"];
  $video['desc'] = $_POST["desc"];
  $video['tags'] = $_POST["tags"];
  $video['id'] = getNextVideoID();
  
  $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/thumbnails/";
  $target_file = $target_dir . $video['id']);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo(basename($_FILES["thumbnail"]["name"]), PATHINFO_EXTENSION));
  
  $check = getimagesize($_FILES["thumbnail"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
  
  if (file_exists($target_file)) {
    //File exists.
    $uploadOk = 0;
  }
  
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    //Only png & jpeg, JPG are allowed
    $uploadOk = 0;
  }
  
  if ($uploadOk == 0) {
    //file not uploaded because of errors.
  } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //file uploaded
      } else {
        //error, file not uploaded.
      }
  }
  
  $video = uploadVideo($video);
  
  if($video != false) {
    $loc = "/account.php";
    header('Location: ' . $loc);
  }
}
?>