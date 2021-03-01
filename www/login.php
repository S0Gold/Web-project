<?php
  session_start();
?>
﻿<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Log In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="include/Sign-up.css">
    <link rel="stylesheet" href="include/menu.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
  <body>

      <?php include "include/meniu2.php"; ?>

          <div class="wrap">
             <?php
                  if(isset($_SESSION["login"]) ){
                       echo '  <div class="img"> '. $_SESSION["login"].'  </div>';
                       if($_SESSION["login"]=="Successful login" )
                           header("Refresh:2; url=index");
                        $_SESSION["login"]="";
                  }
               ?>
                <h2>Login Here</h2>
                <form action="login_script" method="POST">
                    <input type="text" name="user" placeholder="Username.." required />
                    <input type="password"  name="password" placeholder="Pssword.." required />
                    <input type="submit" name="login" value="Login" />
                </form>
                <br>
                <p>Don't Have an Account? <a href="signup"> Sign Up</a> </p>
          </div>


  </body>
</html>
