<?php
function getVideo($id) {
  include_once 'database.php';
  $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
  
  $ret['id'] = -1;
  $ret['userid'] = -1;
  
  $query = "SELECT * FROM video WHERE id = '".$id."' LIMIT 1";
	$result = mysqli_query($mysqli, $query);
	if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $ret['id'] = $row['id'];
      $ret['userid'] = $row['userid'];
    }
	}
  return $ret;
}

function getVideoMeta($id) {
  include_once 'database.php';
  $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);


  $ret['title'] = "";
  $ret['desc'] = "";
  $ret['tags'] = "";
  
  $query = "SELECT * FROM videometa WHERE id = '".$id."' LIMIT 1";
	$result = mysqli_query($mysqli, $query);
	if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $ret['title'] = $row['title'];
      $ret['desc'] = $row['description'];
      $ret['tags'] = $row['tags'];
    }
	} else {
    $ret['title'] = "404 - Video not found.";
    $ret['desc'] = "404 - This video has not been found. Go back and try again.";
    $ret['tags'] = "";
  }
  return $ret;
}

function getUser($id) {
  include_once 'database.php';
  $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
  
  $ret['id'] = -1;
  $ret['created_at'] = "";
  $ret['edited_at'] = "";
  
  $query = "SELECT * FROM user WHERE id = '".$id."' LIMIT 1";
	$result = mysqli_query($mysqli, $query);
	if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $ret['id'] = $id;
      $ret['created_at'] = $row['created_at'];
      $ret['edited_at'] = $row['edited_at'];
    }
	}
  return $ret;
}

function getUserMeta($id) {
  include_once 'database.php';
  $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);


  $ret['firstname'] = "";
  $ret['lastname'] = "";
  $ret['username'] = "";
  
  $query = "SELECT * FROM usermeta WHERE id = '".$id."' LIMIT 1";
	$result = mysqli_query($mysqli, $query);
	if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $ret['firstname'] = $row['firstname'];
      $ret['lastname'] = $row['lastname'];
      $ret['username'] = $row['username'];
    }
	} else {
    $ret['firstname'] = "John";
    $ret['lastname'] = "Doe";
    $ret['username'] = "Anonymous#420";
  }
  return $ret;
}

function registerUser($data) {
  if($data['fname'] != null && $data['lname'] != null && $data['email'] != null && $data['username'] != null && $data['password'] != null) {
    include_once 'database.php';
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    
    if ($insert_stmt = $mysqli->prepare("INSERT INTO user (password) VALUES (?)")) {
      $insert_stmt->bind_param('s', $data['password']);
      if ($insert_stmt->execute()) {
        $data['id'] = $mysqli->insert_id;
        
        if ($insert_stmt = $mysqli->prepare("INSERT INTO usermeta (id, firstname, lastname, username, email) VALUES (?, ?, ?, ?, ?)")) {
          $insert_stmt->bind_param('issss', $data['id'], $data['fname'], $data['lname'], $data['username'], $data['email']);
          if ($insert_stmt->execute()) {
            return $data;
          }
        }
      }
    }
    return false;
  }
}

function loginProtected() {
  session_start();
  if(isset($_SESSION["userid"])) {
    $user = getUser($_SESSION["userid"]);
    if($user['id'] == -1) {
      $loc = "login.php";     
      header('Location: ' . $loc);
    }
  } else {
    $loc = "login.php";
    //if($_SERVER['HTTP_REFERER'] != null) {
    //  $loc = $_SERVER['HTTP_REFERER'];
    //}
    header('Location: ' . $loc);
  }
}
?>