<?php
  session_start();
?>
﻿<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Add Item</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="include/Sign-up.css">
   <link rel="stylesheet" href="include/menu.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
  <body>
        <?php
          include "include/meniu2.php";
          if( !isset ($_SESSION["usersession"] )  ){
              header( "location:login");
          }
        ?>

          <div class="wrap">
            <?php
              if( isset ($_SESSION["imagerror"] )  ){
                   echo '  <div class="img"> '. $_SESSION["imagerror"].'  </div>';

                   if($_SESSION["imagerror"]=="The file  has been uploaded." )
                        header("Refresh:1; url=index");
                      $_SESSION["imagerror"]="" ;
                   }
             ?>
              Select Image File to Upload: <br>
               <br>
              <form action="add_item_script.php" method="post" enctype="multipart/form-data">
                  <input type="file" name="uploadfile">
                  <!-- <input type="text" name="objdescrption" placeholder="Item description..."> -->
                <textarea name="objdescription" placeholder="Item description..." maxlength="256"></textarea>
                    <input type="number" name="lowestprice" placeholder="The lowest selling price..." >
                      <input type="hidden" name="userid" value = "<?php echo $_SESSION["usersession"]["id"] ?> ">
                  <input type="submit" name="submit" value="Upload">
            </form>
          </div>

  </body>
</html>
