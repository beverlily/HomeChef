<?php
include 'views/partials/header.php';
include 'views/partials/menu.php';
$id = $_SESSION['USERID'];
$product_id = $_POST['product_id'];
$order_id = $_SESSION['ORDERID'];

$o = new OrderItem();

$orderItem = $o->getOrderItem($order_id, $product_id);
?>

<main id="main">
  <div class="banner-pages">
    <h2> <?=$orderItem->title?> </h2>
  </div>
<div class="product-page">
    <img class="product-image" src="images/<?=$orderItem->image?>" alt="A picture of a product">
		<form method="POST">
			<h3><?=$orderItem->title?></h3>
			<p><?=$orderItem->description?></p>
			<p> Price per meal: $<?=$orderItem->price?> </p>
			<input type='hidden' name='product_id' value="<?=$product_id?>" />
			<input type='hidden' name='order_id' value="<?=$order_id?>" />
			<label for="quantity">Quantity</label>
			<input id="quantity" type='number' name='quantity' min='1' value='<?=$orderItem->quantity?>' />
			<br />
			<br />
			<input type='submit' name='update_order_item' value="Update Cart"/>
		</form>
	</div>
</div>
</main>





<?php  include 'views/partials/footer.php'; ?>
