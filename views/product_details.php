<?php
include 'views/partials/header.php';
include 'views/partials/menu.php';
$id = $_SESSION['USERID'];
$productId = $_SESSION['PRODUCTID'];

$chef = new Chef(Database::getDb());
$thisChef = $chef->getChefId($id);
$p = $product->getProduct($productId, $db);

$addCartErrorMessage = "";
//Checks for adding to cart error message
if(isset($_SESSION['addCartErrorMessage'])){
  $addCartErrorMessage = $_SESSION['addCartErrorMessage'];
  //resets error message
  $_SESSION['addCartErrorMessage'] = "";
}
?>

<main id="main">
  <div class="banner-pages">
    <h2> <?=$p->title?> </h2>
  </div>
	<div id="chef-pages">
	    <img class="product-image" src="images/<?=$p->image?>" alt="A picture of a product">
		<h3><?=$p->title?></h3>
		<p><?=$p->description?></p>
		<p> Price per meal: $<?=$p->price?> </p>
		<!--Only shows add to cart option if chef does not own the product-->
		<?php if($thisChef['chefId'] != $p->chef_id):?>
			<form id='add-to-cart' method="POST">
				<input type='hidden' name='id' value="<?=$p->id?>" />
				<label for="quantity">Quantity</label>
				<input id="quantity" type='number' name='quantity' min='1' value='1' />
				<br />
				<br />
				<input type='submit' name='add-to-cart' value="Add to Cart"/>
			</form>
		<?php endif; ?>
    <?php if($addCartErrorMessage!=""):?>
       <div class="error"><?=$addCartErrorMessage?></div>
    <?php endif;?>
		</div>
	</div>
</main>
<?php  include 'views/partials/footer.php'; ?>
