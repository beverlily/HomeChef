<?php
require_once '../../controller/userController.php';
include '../../views/partials/header.php';
include '../../views/partials/menu.php';

 ?>

 <main id="main">
   <div class="banner-pages">
     <h2> Create an Account! </h2>
   </div>
   <form action="#" method="post">

     <div class="form-row">
       <label for="first_name" class="inline"> First Name: </label>
       <input type="text" name="first_name" placeholder="First Name" />
     </div>
     <div class="form-row">
       <label for="first_name"> Last Name: </label>
       <input type="text" name="last_name" placeholder="Last Name" />
    </div>

    <div class="form-row">
     <label for="email"> Email Address: </label>
     <input type="text" name="email" placeholder="Email Address"><br />
   </div>
   <div class="form-row">
     <label for="password"> Password: </label>
     <input type="password" name="password" placeholder="Password"><br />
   </div>

   <div class="form-row">
     <label for="address"> Full Current Address: </label>
     <input type="text" name="address" placeholder="Address"><br />
   </div>
     <button type="submit" name="add_user"> Sign Up! </button>
   </form>
 </main>

  <?php  include '../../views/partials/footer.php'; ?>
