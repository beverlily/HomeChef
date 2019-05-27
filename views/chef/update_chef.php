<?php 
require_once '../../controller/chefController.php';
$chef = new Chef(Database::getDb());
if(isset($_POST['id'])) {
	$chefEdit = $chef->getChef($_POST['id'] = 3);
}
?>

<main id="main">
	<h1>Update the Chef profile</h1>
  <form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $_POST['id'] ?>" />
		<div>
			<label for="chef_bio">Bio</label>
			<input type="text" name="chef_bio" id="chef_bio" value="<?php echo $chefEdit['bio']; ?>">
		</div>
		<div>
			<label for="chef_image">Image:</label>
			<input type="file" name="chef_image" id="chef_image" value="<?php echo $chefEdit['image']; ?>">
		</div>
		<div>
			<label for="radius">Address radius:</label>
			<input type="text" name="radius" id="radius" value="<?php echo $chefEdit['radius']; ?>">
		</div>
		<div>
			<input type="submit" value="Update Chef profile!" name="update">
		</div>
	</form>
</main>