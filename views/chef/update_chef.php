<?php 
?>

<main id="main">
	<h1>Update the Chef profile</h1>
	<form method="POST" enctype="multipart/form-data">
		<div>
			<label for="chef_bio">Bio</label>
			<input type="text" name="chef_bio" id="chef_bio" >
		</div>
		<div>
			<label for="chef_image">Image:</label>
			<input type="file" name="chef_image" id="chef_image">
		</div>
		<div>
			<label for="radius">Address radius:</label>
			<input type="text" name="radius" id="radius">
		</div>
		<div>
			<input type="submit" value="Update Chef profile!" name="update">
		</div>
	</form>
</main>