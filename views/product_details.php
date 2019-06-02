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
		<form class='add-to-cart' method="POST">
			<input type='hidden' name='id' value='$p->id' />
			<input type='submit' name='add-to-cart' value="Add to Cart"/>
		</form>
	</div>
</div>
</main>





<?php  include 'views/partials/footer.php'; ?>
