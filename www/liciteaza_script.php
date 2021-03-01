<?php
session_start();
include "include/connect.php";

//Liciteaza
if( isset ($_POST['liciteaza'] )  ){
  if( isset ($_SESSION['usersession'] ) ){

        $id_item=$_POST['id'];
        $new_price=$_POST['newprice'];
        $id_buyer=$_SESSION['usersession']['id'];

        $result = mysqli_query($con, "SELECT * FROM images WHERE id = '$id_item' ");
        $row=mysqli_fetch_array($result);
      if($id_buyer != $row['id_seller'] )
        if ($row['current_price'] < $new_price ){
           $sql = "UPDATE images SET current_price = '$new_price', id_buyer = '$id_buyer' WHERE id = $id_item";
            mysqli_query($con, $sql);
            $sql = "INSERT INTO licitatii (id_anunt, id_buyer, price) VALUES ('$id_item', '$id_buyer', '$new_price'  )";
             mysqli_query($con, $sql);



        }
    header("Location:index");
    }
    else
       header("Location:login");
}

//Sterge
  if( isset ($_POST['sterge'] )  ){
    if( isset ($_SESSION['usersession'] )  ){
        $id_item=$_POST['id'];
        $sql = "DELETE  FROM images WHERE id = '$id_item' ";
        mysqli_query($con, $sql);
        if($_GET["admin"] == true)
          header("Location:index");
        else
        header("Location:my_items");
      }  else
      header("Location:index");
}

$des = $_POST['objdescription'];
$pri =  $_POST['minprice'];

//MODIFICA
if( isset ($_POST['modifica'] )  ){
    if( isset ($_SESSION['usersession'] ) ){

        $id_item=$_POST['id'];

        $sql = "UPDATE images SET description ='$des', min_price ='$pri' WHERE id = '$id_item' ";
        mysqli_query($con, $sql);
        if($_GET["admin"] == true)
          header("Location:index");
        else
        header("Location:my_items");
        }  else {
         header("Location:index");
        }
}
 ?>
