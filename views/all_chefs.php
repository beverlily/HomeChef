<?php
include 'views/partials/header.php';
include 'views/partials/menu.php';


$chefs = $chef->getAllChefs();
var_dump($chefs);
?>

<main id="main">
  <div class="banner-pages">
    <h2> All Available Chefs! </h2>
  </div>
<div id="chef-pages">
  <div id="product-content" class="flex-container">
  <?php foreach($chefs as $c):?>
    <div class="products flex-container">
      <div class="product-text">
      <img class="product-image" src="chef_images/<?= $c->image ?>" alt="Picture of a Chef" >
        <h2><?= $c->first_name . ' ' . $c->last_name ?> </h2>
          <form class="hidden-form" action="" method="POST">
            <input type='hidden' name='chef_id' value='<?=$c->id?>'/>
            <input type='submit' name='view-chef' class="view-product" value='More Details' />
          </form>
          <!-- <p><a href="product_details"> View product details </a></p> -->
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
</main>