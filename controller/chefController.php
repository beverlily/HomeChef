<?php 
//session_start();
require_once '../../models/database.php';
require_once '../../models/Chef.php';

$chef = new Chef(Database::getDb());

/*  When the form on the chef page is successfully submitted the entered data
      inserts into the chefs table and "Request has been added." message pops up,
      if something goes wrong "Problem adding the request." message is displayed */

      if(isset($_POST['create'])){
        $bio = filter_var($_POST['chef_bio'], FILTER_SANITIZE_STRING);
        $image = base64_encode( file_get_contents( $_POST['chef_image']['tmp_name']));
        $radius = $_POST['radius'];

        $count = $chef->createChef($_SESSION['userid'], $bio, $image, $radius);

        if($count) {
            echo "Chef profile has been created.";
        } else {
            echo "Problem creating chef profile.";
        }
    }

/* When edit form is successfully submitted, updated data insert into the chefs table */

if(isset($_POST['update'])) {
  echo $_POST['id'];
  $bio = filter_var($_POST['bio'], FILTER_SANITIZE_STRING);
  $image = base64_encode( file_get_contents( $_FILE['chef_image']['tmp_name']));
  $radius = $_POST['radius'];

  $count = $request->editChef($_POST['id'], $bio, $image, $radius);

  if($count) {
      echo "Chef has been updated.";
  } else {
      echo "Problem updating the chef.";
  }
}

?>