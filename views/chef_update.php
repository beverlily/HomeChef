<?php 
include 'views/partials/header.php';
include 'views/partials/menu.php';

// $chef = new Chef(Database::getDb());
if(isset($_POST['id'])) {
	$chefEdit = $chef->getChef($_POST['id']);
}
var_dump($chef);
// echo 'Hi'. $_SESSION['USERID'];
?>
<!--Need to  Fix update functionality -->
<main id="main">
	<div class="banner-pages">
		<h1>Update the Chef profile</h1>
	</div>
  <form action="create_chef.php"  method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php $_POST['id'] ?>" />
		<div class="form-row">
			<label for="chef_bio">Bio</label>
			<textarea type="text" name="chef_bio" id="chef_bio" ><?php echo $chefEdit['bio']; ?></textarea>
		</div>
		<div class="form-row">
			<label for="chef_image">Image:</label>
			<input type="file" name="chef_image" id="chef_image" value="<?php echo $chefEdit['image']; ?>">
		</div>
		<div class="form-row">
			<label for="radius">Address radius:</label>
			<input type="text" name="radius" id="radius" value="<?php echo $chefEdit['radius']; ?>">
		</div>
		<div>
			<button type="submit" name="update">Update Chef profile!</button>
		</div>
	</form>
</main>
<?php  include 'views/partials/footer.php'; ?>