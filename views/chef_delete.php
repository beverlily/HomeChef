<?php
include 'views/partials/header.php';
include 'views/partials/menu.php';
$id = $_SESSION['USERID'];
$chefDetails = $chef->getChef($id);

?>
	<main id="main">
    <div id="chef-pages">
      <div>
        <img class='chef-image' src='chef_images/<?php echo  $chefDetails['image'] ?>' alt='Picture of a Chef' />
      </div>
      <div>
        <h1>Are you sure?</h1>
        <h2><?php echo $chefDetails['first_name'] . ' ' . $chefDetails['last_name'] ?></h2>
        <p>Address: <?php echo $chefDetails['address'] ?></p>
        <p>Delivery Radius: <?php echo $chefDetails['address_radius'] ?> km</p>
      </div>
      <div>
        <a type="submit" href="user_profile" name="delete" class="chef-link">Delete Profile</a> <span> | </span>
        <a  href="chef_details" class="chef-link">Cancel</a>
      </div>
    </div>
	</main>
<?php  include 'views/partials/footer.php'; ?>