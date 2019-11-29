<?php
use ReallySimpleJWT\Token;
require $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

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
  session_start();
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
            $userId = $user['id'];
            $expiration = time() + 3600;
            $issuer = 'localhost';

            $token = Token::create($userId, SECRET, $expiration, $issuer);
            
            $_SESSION["token"] = $token;
            return $data;
          }
        }
      }
    }
    return false;
  }
}

function loginUser($data) {
  session_start();
  if($data['username'] != null && $data['password'] != null) {
    include_once 'database.php';
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    
    $ret = $data;
    $ret['id'] = -1;
    
    $query = "SELECT * FROM usermeta WHERE username = '".$data['username']."' LIMIT 1";
    $result = mysqli_query($mysqli, $query);
    if ($result->num_rows > 0) {
      while ($row = mysqli_fetch_array($result)) {
        $ret['id'] = $row['id'];
        $ret['firstname'] = $row['firstname'];
        $ret['lastname'] = $row['lastname'];
        $ret['email'] = $row['email'];
      }
    }
    $query = "SELECT * FROM user WHERE id = '".$ret['id']."' LIMIT 1";
    $result = mysqli_query($mysqli, $query);
    if ($result->num_rows > 0) {
      while ($row = mysqli_fetch_array($result)) {
        $ret['password'] = $row['password'];
      }
    }
    
    if(password_verify($data['password'], $ret['password'])) {
      $userId = $ret['id'];
      $expiration = time() + 3600;
      $issuer = 'localhost';
      
      $token = Token::create($userId, SECRET, $expiration, $issuer);
      
      $_SESSION["token"] = $token;
      return $ret;
    } else {
      return false;
    }
  }
}

function loginProtected() {
  session_start();
  include_once 'database.php';
  $loc = "login.php";
  if(isset($_SESSION["token"])) {
    $token = $_SESSION["token"];
    if(Token::validate($token, SECRET)) {
      $userid = Token::getPayload($token, SECRET);
      $userid = reset($userid);
      
      $user = getUser($userid);
      if($user['id'] == -1) {
        header('Location: ' . $loc);
      }
    } else {
      header('Location: ' . $loc);
    }
  } else {
    //if($_SERVER['HTTP_REFERER'] != null) {
    //  $loc = $_SERVER['HTTP_REFERER'];
    //}
    header('Location: ' . $loc);
  }
}

function getNextVideoID() {
  $query = "SELECT id FROM video ORDER BY id DESC LIMIT 0, 1";
  $result = mysqli_query($mysqli, $query);
  $id = 0;
  if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $id = $row['id'];
    }
  }
  $id++;
  return $id;
}

function uploadVideo($video) {
  //todo
}
?>