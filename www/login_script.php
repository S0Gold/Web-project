<?php
include "include/connect.php";
session_start();

if(isset ($_POST['login'] ) ){
$username = $_POST['user'];
$password=$_POST['password'];

  $result = mysqli_query($con, "SELECT * FROM test1 WHERE username = '$username' ");
  $row=mysqli_fetch_array($result);
//die ($row['password']);
  if ( password_verify ($password, $row['password'] )  )
  {
    $_SESSION["login"]="Successful login";
    $_SESSION["usersession"] =  $row;
      header("Location: login");
  }
  else{
    $_SESSION["login"]="Username or Password is Incorrect";
      header("Location: login");
  }
}
 ?>
