<?php
include 'views/partials/header.php';
include 'views/partials/menu.php';
$id = $_SESSION['USERID'];
$productid = $_SESSION['PRODUCTID'];
$p = $product->getProduct($productid, $db);
?>

<main id="main">
  <div class="banner-pages">
    <h2> <?=$p->title?> </h2>
  </div>
<div id="chef-pages">
    <img class="product-image-main" src="images/<?=$p->image?>" alt="A picture of a product">
    <p><?=$p->description?></p>
    <p> Price: $<?=$p->price?> </p>
  </div>
</main>





<?php  include 'views/partials/footer.php'; ?>
