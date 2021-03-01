<?php
include "include/connect.php";
session_start();


if(isset ($_POST['inscrie'] ) ){
  $_SESSION["error"]="";
  $firstname == mysqli_real_escape_string($con, $_POST['firstname']) ;
  $lastname=mysqli_real_escape_string($con,$_POST['lastname']);
  $email =mysqli_real_escape_string($con, $_POST['email']);
  $username = mysqli_real_escape_string($con,$_POST['username']);
  $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);


  $result = mysqli_query($con, "SELECT * FROM test1 WHERE email='$email'");
  $row=mysqli_fetch_array($result);
  if(is_array($row)){
        if(count($row)>0){
            $_SESSION["error"]="This email is already used ";
            header("Location: signup");
  die();
       }
}

$result = mysqli_query($con, "SELECT * FROM test1 WHERE username='$username'");
$row=mysqli_fetch_array($result);
// if(mysqli_fetch_array($result) !== false){
  if(is_array($row)){
        if(count($row)>0){
            $_SESSION["error"]=" This username is already used ";
            header("Location: signup");
        }
}

  $sql = 'INSERT INTO test1 (firstname, lastname, email, username, password) VALUES ("' . $firstname . '", "' . $lastname . '", "' . $email . '", "' . $username . '", "' .   $hashed_password . '")';
  mysqli_query($con, $sql);
    $_SESSION["error"]="Successful registration";
    header("Location: signup");
 }


?>
