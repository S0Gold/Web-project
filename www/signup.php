<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="include/Sign-up.css">
  <link rel="stylesheet" href="include/menu.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
  <?php include "include/meniu2.php"; ?>

          <div class="wrap">
          <?php
             if(isset($_SESSION["error"]) ){
                  echo '  <div class="img"> '. $_SESSION["error"].'  </div>';
                  if($_SESSION["error"]=="Successful registration" )
                      header("Refresh:2; url=index");
                   $_SESSION["error"]="";
             }
          ?>
              <h2>Sign up Here</h2>
              <form action="signup_script" method="POST">
                  <input type="text" name="firstname" placeholder="Firtst Name.." required />
                  <input type="text" name="lastname" placeholder="Last Name.." required />
                  <input type="email" name="email" placeholder="Email.." required />
                  <input type="text" name="username" placeholder="Username.." required />
                  <input type="password" name="password" placeholder="Pssword.." required />
                  <input type="submit" name="inscrie" value="SignUp" />
              </form>
              <br>
            <p>Already have an account? <a href="login"> Login</a> </p>
          </div>
  </body>
</html>
