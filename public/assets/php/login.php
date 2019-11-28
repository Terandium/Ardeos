<?php
include 'functions.php';

if($_POST["username"] !== null && $_POST["password"] !== null) {
  $user['username'] = $_POST["username"];
  $user['password'] = $_POST["password"];
  
  $user = loginUser($user);
  
  if($user != false) {
    $loc = "/account.php";
    header('Location: ' . $loc);
  }
}
?>