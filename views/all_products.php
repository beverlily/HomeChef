<?php
include 'views/partials/header.php';
include 'views/partials/menu.php';


$products = $product->getAllProducts($db);

?>

<main id="main">
  <div class="banner-pages">
    <h2> All Available Meals! </h2>
  </div>
<div id="chef-pages">
  <div id="product-content" class="flex-container">
  <?php foreach($products as $p):?>
    <div class="products flex-container">
      <div class="product-text">
        <h2><?=$p->title?> </h2>
          <img class="product-image" src="images/<?=$p->image?>" alt="A picture of a product">
          <form class="hidden-form" action="" method="POST">
            <input type='hidden' name='product_id' value='<?=$p->id?>'/>
            <input type='submit' name='view-product' class="view-product" value='More Details' />
          </form>
          <!-- <p><a href="product_details"> View product details </a></p> -->
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
</main>
