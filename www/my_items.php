<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>My Items</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="include/admin.css">
    <link rel="stylesheet" href="include/menu.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body >

  <?php
      include "include/meniu2.php";
      include 'include/connect.php';
      if(isset( $_SESSION['usersession'])){
          $id = $_SESSION['usersession']['id'];
           $result = mysqli_query($con, "SELECT * FROM images WHERE id_seller='$id' AND status='1' ");
            if (mysqli_num_rows($result) != 0){
             while( $row = mysqli_fetch_array($result) )
                if(is_array($row) ){
                     $imageURL = 'uploads/'.$row["file_name"];
       ?>
                  <div class="item">
                    <div class="img">
                            <a href="item_description.php?id_anunt=<?php echo $row["id"] ?>"> <img src=" <?php echo $imageURL; ?> "
                              alt="" width="300" height="300"/> </a>
                    </div>

                  <form action="liciteaza_script" method="post" >
                     Descriere:
                      <textarea name="objdescription" ><?php echo $row["description"] ?></textarea>
                      Pret curent: <input type="number" name="newprice" value = "<?php echo $row["current_price"] ?>" autocomplete="off" required disabled>
                      Pret minim: <input type="number" name="minprice" value = "<?php echo $row["min_price"] ?>" autocomplete="off" required>
                        <input type="hidden" name="id" value = "<?php echo $row["id"] ?>" >
                        <input  class ="submit_green" type="submit" name="modifica" value="Modifica">
                       <input class ="submit_red" type="submit" name="sterge" value="Sterge">
                </form>
                  </div>
    <?php
        }
      }else{
                echo " <div class=\"wrap\">";
                echo '<div class="img"> Niciun anunt disponibil momentan </div> <br>';
                echo" <a href=\"add_item.php\"> <div class=\"img\"> Adauga un anunt nou!  </div></a>";
                echo " </div>";
            }

                      //Sterge cont
      ?>
                  <div class="wrap">
                    <div class="img">
                          Doresti sa stergi contul?
                      <form  action="sterge_script" method="post">
                          <input type="hidden" name="id" value = "<?php echo $id ?>"  >
                          <input class ="submit_red"  type="submit" name="stergecont" value="Sterge cont">
                      </form>
                    </div>
                  </div>

    <?php
      }
      else {
        header("Location:login");
      }
    ?>


  </body>
</html>
