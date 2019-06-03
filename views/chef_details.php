<?php
include 'views/partials/header.php';
include 'views/partials/menu.php';

//if(isset($_SESSION['USERID']) ? $id = $_SESSION['USERID'] : "");

$chefDetails = $chef->getChef($_SESSION['USERID']);
//var_dump($chefDetails);

$products = $product->getProducts($chefDetails['id'], $db);
// var_dump($products);
?>
	<main id="main">
		<div class="banner-pages">
			<h2> Chef Profile </h2>
		</div>
	<div id="chef-pages">
		<div>
			<img class='chef-image' src='chef_images/<?php echo  $chefDetails['image'] ?>' alt='Picture of a Chef' />
		</div>
		<div>
			<h1><?php echo $chefDetails['first_name'] . ' ' . $chefDetails['last_name'] ?></h1>
			<p><?php echo $chefDetails['bio'] ?></p>
			<p>Address: <?php echo $chefDetails['address'] ?></p>
			<p>Delivery Radius: <?php echo $chefDetails['address_radius'] ?> km</p>
		</div>
		<div>
		<?php if(isset($_SESSION['USERID']) && $_SESSION['USERID'] == $chefDetails['user_id']) {
	
			echo	'<a type="submit" href="chef_update" name="update" class="chef-link">Edit Chef Profile</a><span> | </span><a type="submit" href="chef_delete" name="delete" class="chef-link">Delete Chef Profile</a>';				
		}
		?>
		</div>
		<div>
			<!--Need to Add styling here to display products -->
			<h2>Products</h2>
		</div>
		<div id="product-content" class="flex-container">
		<?php foreach($products as $p):?>
			<div class="products flex-container">
				<div class="product-text">
					<h2><?=$p->title?> </h2>
						<img class="product-image" src="images/<?=$p->image?>" alt="A picture of a product">
						<form class="hidden-form" action="" method="POST">
							<input type='hidden' name='product_id' value='<?=$p->id?>'/>
							<input type='submit' name='view-product' class="view-product" value='View Product' />
						</form>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php if(isset($_SESSION['USERID']) && $_SESSION['USERID'] == $chefDetails['user_id']) {
		echo '<div>
					<button type="submit" name="create_product"><a href="create_product" name="create">Create a new product!</a></button>
				</div>';
		}
		?>
	</div>
	</main>
	<?php  include 'views/partials/footer.php'; ?>
