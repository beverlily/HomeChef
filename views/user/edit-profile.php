<?php
require_once '../../controller/userController.php';
include '../../views/partials/header.php';
include '../../views/partials/menu.php';
$userid = $_SESSION['USERID'];
$this_user=$user->getUser($userid,$db);

 ?>

 <main id="main">
   <div class="banner-pages">
     <h2> Edit Profile </h2>
   </div>
   <form action="#" method="post">

     <div class="form-row">
       <label for="first_name" class="inline"> First Name: </label>
       <input type="text" name="first_name" placeholder="First Name" value="<?=$this_user->first_name?>" />
     </div>
     <div class="form-row">
       <label for="first_name"> Last Name: </label>
       <input type="text" name="last_name" placeholder="Last Name" value="<?=$this_user->last_name?>"/>
    </div>

    <div class="form-row">
     <label for="email"> Email Address: </label>
     <input type="text" name="email" placeholder="Email Address" value="<?=$this_user->email?>"><br />
   </div>
   <div class="form-row">
     <label for="password"> Password: </label>
     <input type="password" name="password" placeholder="Password" value="<?=$this_user->password?>"><br />
   </div>

   <div class="form-row">
     <label for="address"> Full Current Address: </label>
     <input type="text" name="address" placeholder="Address" value="<?=$this_user->address?>"><br />
   </div>
     <button type="submit" name="edit_user"> Edit Profile </button>
   </form>
 </main>

  <?php  include '../../views/partials/footer.php'; ?>
