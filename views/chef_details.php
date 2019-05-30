<?php
include 'views/partials/header.php';
include 'views/partials/menu.php';
$id = $_SESSION['USERID'];
$chefDetails = $chef->getChef($id);
//var_dump ($id);
?>

	<main id="main">
	<div id="chef-pages">
		<div>
			<img class='chef-image' src='chef_images/<?php echo  $chefDetails['image'] ?>' alt='Picture of a Chef' />
		</div>
		<div>
			<h1><?php echo $chefDetails['first_name'] . ' ' . $chefDetails['last_name'] ?></h1>
			<p>Address: <?php echo $chefDetails['address'] ?></p>
			<p>Delivery Radius: <?php echo $chefDetails['address_radius'] ?> km</p>
		</div>
		<div>
			<a type="submit" href="chef_update" name="update" class="chef-link">Edit Profile</a>
		</div>
		<div>
			<!--Need to Add styling here to display products -->
			<h2>Products</h2>
		</div>
		<div id="product-content" class="flex-container">
			<div class="products flex-container">
				<div class="product-text">
						<img src="" alt="A picture of a product">
						<div class="product-details">
							<p></p>
						</div>
				</div>
			</div>
		</div>
		<div>
			<!-- Need to Make create_product.php file -->
			<button type="submit" name="create_product"><a href="product_create" name="create">Create a new product!</a></button>
		</div>
	</div>
	</main>
	<?php  include 'views/partials/footer.php'; ?>