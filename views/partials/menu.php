<?php

// $this_user=$user->getUser($_SESSION['USERID'],$db);

// if($this_user->IsChef == 1){
//   $profile = 'chef_details';
// }else{
//   $profile = 'user_profile';
// }


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
        <li><a class= "alt" href="<?=$profile?>">Profile</a></li>
        <li><a class= "alt" href="all_products">Browse</a></li>
	    <li><a class= "alt" href="current_cart">View Cart</a></li>
        <li><a class= "alt" href="destroy_session">Logout</a></li>
       </ul>
      </nav>
  </div>
   </div>
</header>
