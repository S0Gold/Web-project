<?php
  $id_anunt = $_GET["id_anunt"];
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Descriere anunt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="include/admin.css">
    <link rel="stylesheet" href="include/menu.css">
  </head>

  <body>

    <?php
    include "include/meniu2.php";
    include "include/connect.php";

    $result_item = mysqli_query($con, "SELECT * FROM images where id='$id_anunt' ");
if (mysqli_num_rows($result_item) != 0){
    $row_item = mysqli_fetch_array($result_item);
    $imageURL = 'uploads/'.$row_item["file_name"];
?>

  <div class="item_dreapta img">
    <img src=" <?php echo $imageURL; ?> " alt="" width="300" height="300"/>
    <form action="liciteaza_script?admin=false" method="post" >
      <textarea name="objdescription" disabled><?php echo $row_item["description"] ?></textarea>
       Pret:
      <input type="number" name="newprice" value = "<?php echo $row_item["current_price"] ?>" autocomplete="off" required >
      <input  class ="submit_green" type="submit" name="liciteaza" value="Liciteaza">
      <input type="hidden" name="id" value = "<?php echo $row_item["id"] ?>" >
    </form>
  </div>
    <?php
}

    $result = mysqli_query($con, "SELECT * FROM `test1` T, `images` I  WHERE I.id='$id_anunt' AND T.id=I.id_seller ");
     if (mysqli_num_rows($result) != 0){
      $row = mysqli_fetch_array($result);
      echo"<div class=\"item_stanga\">";
      echo  "<div class=\"img\">Detalii vanzator: </div><br><br>";
      echo "Nume: ".$row["firstname"]." ".$row["lastname"]."<br><br>";
      echo "Email: ".$row["email"];
      echo"</div>";
    }

    $result = mysqli_query($con, "SELECT * FROM `licitatii` WHERE id_anunt='$id_anunt' ");
     if (mysqli_num_rows($result) != 0){
       $i=1;
       echo"<div class=\"item_stanga\"><div class=\"img\">Istoric licitatie </div><br>";
       echo" <table> <tr>  <th>Nr.</th>  <th>Cumparator</th>  <th>Suma licitata</th>  </tr>";
      while($row = mysqli_fetch_array($result)){
       $buyer=$row['id_buyer'];
       $result1 = mysqli_query($con, "SELECT * FROM `test1` WHERE id='$buyer' ");
       $row1 = mysqli_fetch_array($result1);
        echo"<tr> <td>".$i."</td> <td>".$row1["firstname"] ." ".$row1["lastname"]."</td> <td>". $row["price"]."</td></tr>";
        $i++;
      }
      echo"</table></div>";
    }
    else {
       echo"<div class=\"item_stanga\"><div class=\"img\">Momentan nu s-a licitat pentru acest produs! </div><br>";
    }


     ?>

  </body>
</html>
