<?php ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chef-form</title>
</head>
<body>
	<h1>Become a Chef</h1>
	<form method="POST" enctype="multipart/form-data">
		<div>
			<label for="bio">Bio</label>
			<input type="text" name="bio" id="bio" >
		</div>
		<div>
			<label for="image">Image:</label>
			<input type="file" name="image" id="image">
		</div>
		<div>
			<label for="radius">Address radius:</label>
			<input type="text" name="radius" id="radius">
		</div>
		<div>
			<input type="submit" value="Become a Chef!">
		</div>
	</form>
</body>
</html>