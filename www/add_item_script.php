 <?php
 //Include connection to database
include "include/connect.php";
session_start();

//folder where images will be uploaded
$folder = 'uploads/';
$filename = $_FILES['uploadfile']['name'];
$filetmpname = $_FILES['uploadfile']['tmp_name'];
$target_file = $folder . basename($_FILES['uploadfile']['name'] );
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$first_price= $_POST['lowestprice'];
$user_id=$_POST['userid'];
$description=$_POST['objdescription'];

if(isset($_POST["submit"])) {
    $check = getimagesize( $_FILES['uploadfile']['tmp_name']);
    if($check !== false) {
        $uploadOk = 1;
    } else {
      $_SESSION['imagerror']="File is not an image.";
        $uploadOk = 0;
    }
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
      $_SESSION['imagerror']="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    $_SESSION['imagerror'] =  $_SESSION['imagerror']. "Your file was not uploaded!";
// if everything is ok, try to upload file
} else
  //function for saving the uploaded images in a specific folder
    if ( move_uploaded_file($filetmpname, $folder. $filename) ) {
      //inserting image details (ie image name) in the database
      $sql = "INSERT INTO images (file_name, uploaded_on, description, id_seller, min_price)  VALUES ('$filename', NOW(), '$description', '$user_id',  '$first_price'
     )";
      $qry = mysqli_query($con,  $sql);

      if( $qry) {

      }
          $_SESSION['imagerror']= "The file  has been uploaded.";

    }
    header("Location:add_item");


?>
