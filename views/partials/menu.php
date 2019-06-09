<?php
//if there is a logged in user, checks if they're a chef or a user
if(isset($_SESSION['USERID'])){
  $this_user=$user->getUser($_SESSION['USERID'],$db);
  $profile = $this_user->IsChef == 1 ? 'chef_details' : 'user_profile';
}
?>

<a id="skip-to-main" class="hidden" href="#main" tabindex="0">Skip to main content</a>
<header id="header">
   <div class="page-wrapper">
  <div id="header-content" class="flex-container">
    <div id="site-logo">
       <a href="<?= ROOT ?>"><img src="images/logo.png" alt="Home Chef Logo" /></a>
    </div>
      <nav id="header-nav">
       <h2 class="hidden">Main Navigation</h2>
       <ul>
         <!-- if user is logged in -->
        <?php if(isset($_SESSION['USERID'])): ?>
          <li><a class= "alt" href="<?=$profile?>">Profile</a></li>
          <li><a class= "alt" href="all_products">Browse</a></li>
          <li><a class= "alt" href="order_history">Orders</a></li>
  	      <li><a class= "alt" href="current_cart">View Cart</a></li>
          <li><a class= "alt" href="destroy_session">Logout</a></li>
         <!-- if user is not logged in -->
        <?php else: ?>
          <li><a href="register_user" class="button">Sign Up</a></li>
          <li><a href="sign_in" class="button">Log In</a></li>
        <?php endif;?>
       </ul>
      </nav>
  </div>
   </div>
</header>
