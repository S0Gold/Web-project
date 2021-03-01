<?php
include"include/connect.php";
$sql = "UPDATE images SET status = '0' WHERE id =". $_POST['id'];
 mysqli_query($con, $sql);

 ?>
