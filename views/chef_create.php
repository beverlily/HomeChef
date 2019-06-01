<?php 
include 'views/partials/header.php';
include 'views/partials/menu.php';
?>
<main id="main">
	<div class="banner-pages">
		<h2>Become a Chef</h2>
	</div>
	<form method="POST" enctype="multipart/form-data">
		<div class="form-row">
			<label for="chef_bio">Bio:</label>
			<textarea type="text" name="chef_bio" id="chef_bio" ></textarea>
		</div>
		<div class="form-row">
			<label for="chef_image">Image:</label>
			<input type="file" name="chef_image" id="chef_image">
		</div>
		<div class="form-row">
			<label for="radius">Address radius:</label>
			<input type="text" name="radius" id="radius">
		</div>
		<div>
			<button type="submit"  name="create">Become a Chef!</button>
		</div>
	</form>
</main>
<?php  include 'views/partials/footer.php'; ?>