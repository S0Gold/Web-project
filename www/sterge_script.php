<?php
session_start();
include"include/connect.php";
//Sterge anunturi
  if( isset ($_POST['stergecont'] )  ){
      $id_seller=$_POST['id'];
       $result = mysqli_query($con, "SELECT * FROM images WHERE id_seller = '$id_seller' ");
       if (mysqli_num_rows($result) != 0){
        while( $row = mysqli_fetch_array($result) )
           if(is_array($row) ){
             $delete = $row['id'];
              $sql = "DELETE  FROM images WHERE id = '$delete' ";
              mysqli_query($con, $sql);
          }
        }

//Sterge contul
$sql = "DELETE  FROM test1 WHERE id = '$id_seller' ";
mysqli_query($con, $sql);
session_destroy();
      }
  header("Location:index");












 ?>
