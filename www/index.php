<?php session_start();date_default_timezone_set("Europe/Bucharest");?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
     include 'include/connect.php';
      if(isset($_SESSION["usersession"]) ) {
          $idadmin = $_SESSION["usersession"]["id"];
          $result = mysqli_query($con, "SELECT * FROM admins WHERE id_user = '$idadmin' ");
          $row=mysqli_fetch_array($result);
          if (mysqli_num_rows($result) != 0){
                echo "<link rel=\"stylesheet\" href=\"include/admin.css\">";
                $admin = true;
          }
          else {
            echo "<link rel=\"stylesheet\" href=\"include/style.css\">";
            $admin = false;
          }
      }else {
        echo "<link rel=\"stylesheet\" href=\"include/style.css\">";
        $admin = false;
      }
     ?>

  <link rel="stylesheet" href="include/menu.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body >

     <?php
          include 'include/meniu2.php';
          $result = mysqli_query($con, "SELECT * FROM images WHERE status = '1' ORDER BY uploaded_on DESC ");
          while( $row=mysqli_fetch_array($result) )
           if(is_array($row)){
               $imageURL = 'uploads/'.$row["file_name"];

     ?>
                  <div class="item" id="anunt_<?php echo $row["id"] ?>">
                          <div class="img">
                                <a href="item_description.php?id_anunt=<?php echo $row["id"] ?>"> <img src=" <?php echo $imageURL; ?> "
                                   alt="" width="300" height="300"/> </a>
                          </div>Descriere:
                         <form action="liciteaza_script?admin=<?php echo $admin; ?>" method="post" >
                           <?php

      if($admin == true){
                          ?>
                           <textarea name="objdescription" ><?php echo $row["description"] ?></textarea>
                            Pret curent:  <input type="number" name="newprice" value = "<?php echo $row["current_price"] ?>" autocomplete="off" required disabled>lei
                            Pret minim:  <input type="number" name="minprice" value = "<?php echo $row["min_price"] ?>" autocomplete="off" required> lei
                            Timp ramas:  <input id="interval_<?php echo $row['id'] ?>" type="text" name="time" value = "00:00:00"  disabled>
                           <script type="text/javascript">
                             setInterval(function(){
                               var datetime1 = new Date('<?php echo  $row["uploaded_on"]; ?>') ;
                               var datetime2 = new Date();
                               datetime1.setDate(datetime1.getDate() + 1);
                               var diff =datetime1 - datetime2;
                               if (diff < 0){
                                   document.getElementById("anunt_<?php echo $row['id'] ?>").style.display="none";
                                   $.ajax({
                                             url: "update_status.php",
                                             type: 'POST',
                                             data:{id:"<?php echo $row['id'] ?>"}
                                           });
                                 }
                                 diff/=1000;
                                 hour = parseInt(diff/3600);
                                 min = parseInt ((diff - hour * 3600) /60 );
                                 sec = parseInt( diff -  hour * 3600 - min * 60  );
                                 var interval=(hour+":"+min+":"+sec);
                                 if(hour<=0 && min==0 && sec<1){
                                   document.getElementById("anunt_<?php echo $row['id'] ?>").style.display="none";
                                 }else{
                                 document.getElementById("interval_<?php echo $row['id'] ?>").value=interval;
                                  }
                              } ,1000);
                           </script>
                            <input type="hidden" name="id" value = "<?php echo $row["id"] ?>" >
                            <input class ="submit_green" type="submit" name="modifica" value="Modifica">
                            <input class ="submit_red" type="submit" name="sterge" value="Sterge">

    <?php  } else{  ?>

                          <textarea name="objdescription" disabled><?php echo $row["description"] ?></textarea>
                           Pret:  <input type="number" name="newprice" value = "<?php echo $row["current_price"] ?>" autocomplete="off" required >lei
                          Timp ramas:  <input id="interval_<?php echo $row['id'] ?>" type="text" name="time" value = "00:00:00"  disabled>
                         <script type="text/javascript">
                           setInterval(function(){
                             var datetime1 = new Date('<?php echo  $row["uploaded_on"]; ?>') ;
                             var datetime2 = new Date();
                             datetime1.setDate(datetime1.getDate() + 1);
                             var diff =datetime1 - datetime2;
                             if (diff < 0){
                                 document.getElementById("anunt_<?php echo $row['id'] ?>").style.display="none";
                                 $.ajax({
                                           url: "update_status.php",
                                           type: 'POST',
                                           data:{id:"<?php echo $row['id'] ?>"}
                                         });
                               }
                               diff/=1000;
                               hour = parseInt(diff/3600);
                               min = parseInt ((diff - hour * 3600) /60 );
                               sec = parseInt( diff -  hour * 3600 - min * 60  );
                               var interval=(hour+":"+min+":"+sec);
                               if(hour<=0 && min==0 && sec<1){
                                 document.getElementById("anunt_<?php echo $row['id'] ?>").style.display="none";
                               }else{
                               document.getElementById("interval_<?php echo $row['id'] ?>").value=interval;
                                }
                            } ,1000);
                         </script>

                            <input class ="submit_green"  type="submit" name="liciteaza" value="Liciteaza">
                          <input type="hidden" name="id" value = "<?php echo $row["id"] ?>" >
                              <?php   }  ?>
                        </form>
                  </div>
              <?php   }      ?>
  </body>
</html>
