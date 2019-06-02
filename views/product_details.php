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
    <img class="product-image" src="images/<?=$p->image?>" alt="A picture of a product">
		<form class='add-to-cart' method="POST">
			<p><?=$p->description?></p>
			<p> Price: $<?=$p->price?> </p>
			<input type='hidden' name='id' value="<?=$p->id?>" />
			<label for="quantity">Quantity</label>
			<input id="quantity" type='number' name='quantity' min='1' max='10' value='1' />
			<br />
			<br />
			<input type='submit' name='add-to-cart' value="Add to Cart"/>
		</form>
	</div>
</div>
</main>





<?php  include 'views/partials/footer.php'; ?>
