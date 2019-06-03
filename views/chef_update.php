<?php 
include 'views/partials/header.php';
include 'views/partials/menu.php';
$id = $_SESSION['USERID'];

$chefEdit = $chef->getChef($id);
?>
<main id="main">
	<div class="banner-pages">
		<h1>Update the Chef profile</h1>
	</div>
  <form action="chef_details"  method="POST" enctype="multipart/form-data">
		<div class="form-row">
			<label for="chef_bio">Bio</label>
			<textarea type="text" name="chef_bio" id="chef_bio" ><?php echo $chefEdit['bio']; ?></textarea>
		</div>
		<div class="form-row">
			<label for="chef_image">Image:</label>
			<div>
			<img class='chef-image' src='chef_images/<?php echo  $chefEdit['image'] ?>' alt='Picture of a Chef' /><?php echo  $chefEdit['image'] ?></div>
			<input type="file" name="chef_image" id="chef_image" value="<?php echo $chefEdit['image']; ?>">
		</div>
		<div class="form-row">
			<label for="radius">Address radius:</label>
			<input type="number" min="1" max="30"  name="radius" id="radius" value="<?php echo $chefEdit['address_radius']; ?>">
		</div>
		<div>
			<button type="submit" name="update">Update Chef profile!</button>
		</div>
	</form>
</main>
<?php  include 'views/partials/footer.php'; ?>