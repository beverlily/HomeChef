<?php
require_once '../../controller/userController.php';
include '../../views/partials/header.php';
include '../../views/partials/menu.php';

 ?>

 <main id="main">
   <div class="banner-pages">
     <h2> Sign In! </h2>
   </div>
   <form action="#" method="post">

    <div class="form-row">
       <label for="email"> Email Address: </label>
       <input type="text" name="email" placeholder="Email Address"><br />
    </div>
    <div class="form-row">
       <label for="password"> Password: </label>
       <input type="password" name="password" placeholder="Password"><br />
     </div>

     <button type="submit" name="sign_in"> Sign In </button>
   </form>
 </main>

  <?php  include '../../views/partials/footer.php'; ?>
