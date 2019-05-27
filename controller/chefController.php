<?php 
// session_start();
$_SESSION['userid'] = 3;
require_once '../../models/database.php';
require_once '../../models/Chef.php';

$chef = new Chef(Database::getDb());

/*  When the form on the chef page is successfully submitted the entered data
      inserts into the chefs table and "Request has been added." message pops up,
      if something goes wrong "Problem adding the request." message is displayed */

      if(isset($_POST['create'])){
        $bio = filter_var($_POST['chef_bio'], FILTER_SANITIZE_STRING);   
        $imgFile = $_FILES['chef_image']['name'];
        $tmp_dir = $_FILES['chef_image']['tmp_name'];
        $imgSize = $_FILES['chef_image']['size'];
        $radius = $_POST['radius'];
        if(empty($bio)){
          $errMSG = "Please Enter Short Bio.";
         }
         else if(empty($radius)){
          $errMSG = "Please Enter Delivery radius.";
         }
         else if(empty($imgFile)){
          $errMSG = "Please Select Image File.";
         }
         else
         {
          $upload_dir = '../../chef_images/'; // upload directory
        
          $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
         
          // valid image extensions
          $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
         
          // rename uploading image
          $image = rand(1000,1000000).".".$imgExt;
           
          // allow valid image file formats
          if(in_array($imgExt, $valid_extensions)){   
           // Check file size '5MB'
           if($imgSize < 5000000)    {
            move_uploaded_file($tmp_dir,$upload_dir.$image);
           }
           else{
            $errMSG = "Sorry, your file is too large.";
           }
          }
          else{
           $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
          }
         }

         if(!isset($errMSG))
        {
          $count = $chef->createChef($_SESSION['userid'], $bio, $image, $radius);

          if($count) {
              echo "Chef profile has been created.";
          } else {
              echo "Problem creating chef profile.";
          }
        }
  }
/* When edit form is successfully submitted, updated data is inserted into the chefs table */

if(isset($_POST['update'])) {
  echo $_POST['id'];
  // $userID = $_SESSION['userid'];
  $bio = filter_var($_POST['bio'], FILTER_SANITIZE_STRING);
  $imgFile = $_FILES['chef_image']['name'];
  $tmp_dir = $_FILES['chef_image']['tmp_name'];
  $imgSize = $_FILES['chef_image']['size'];
  $radius = $_POST['radius'];

  if($imgFile)
  {
   $upload_dir = 'chef_images/'; // upload directory 
   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
   $image = rand(1000,1000000).".".$imgExt;
   if(in_array($imgExt, $valid_extensions))
   {   
    if($imgSize < 5000000)
    {
     unlink($upload_dir.$edit_row['userPic']);
     move_uploaded_file($tmp_dir,$upload_dir.$image);
    }
    else
    {
     $errMSG = "Sorry, your file is too large it should be less then 5MB";
    }
   }
   else
   {
    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
   } 
  }

  if(!isset($errMSG))
  {
  $count = $request->editChef($_POST['id'], $bio, $image, $radius);

  if($count) {
      echo "Chef has been updated.";
  } else {
      echo "Problem updating the chef.";
    }
  }
}
 /* Runs when the user chooses to delete their chef profile */
 if(isset($_POST['delete'])) {
  $count = $result->deleteChef($_POST['id']);

   $userId = $_SESSION['userid'];

  header("Location: user_profile.php?id=$userId");
}



?>