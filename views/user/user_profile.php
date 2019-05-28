<?php
require_once '../../controller/userController.php';
include '../../views/partials/header.php';
include '../../views/partials/menu.php';
$userid = $_SESSION['USERID'];
$this_user=$user->getUser($userid,$db);
 ?>

 <main id="main">
   <div class="banner-pages">
     <h2> Profile Page </h2>
   </div>
   <div id="user-profile">
    <ul>
      <li> First Name: <?=$this_user->first_name?> </li>
      <li> Last Name: <?=$this_user->last_name?></li>
      <li> Email Address: <?=$this_user->email?></li>
      <li> Address: <?=$this_user->address?></li>
    </ul>
    <button type="submit" name="edit"> <a href="edit-profile.php">Edit Profile </a></button>

  </div>
 </main>
 <?php  include '../../views/partials/footer.php'; ?>
