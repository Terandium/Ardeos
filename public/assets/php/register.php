<?php
include 'functions.php';
session_start();

if($_POST["fname"] !== null && $_POST["lname"] !== null && $_POST["username"] !== null && $_POST["email"] !== null && $_POST["password"] !== null) {
  $user['fname'] = $_POST["fname"];
  $user['lname'] = $_POST["lname"];
  $user['username'] = $_POST["username"];
  $user['email'] = $_POST["email"];
  $user['password'] = password_hash($_POST["password"], PASSWORD_DEFAULT);
  
  $user = registerUser($user);
  
  if($user != false) {
    $_SESSION["userid"] = $user['id'];
  
    $loc = "/account.php";
    header('Location: ' . $loc);
  }
}
?>