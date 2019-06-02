<?php
include 'views/partials/header.php';
include 'views/partials/menu.php';
 
 $chefDetails = $chef->getChef($_SESSION['USERID']);
 //$id = $chefDetails['id'];
?>
	<main id="main">
    <div id="chef-pages">
      <div>
        <img class='chef-image' src='chef_images/<?php echo  $chefDetails['image'] ?>' alt='Picture of a Chef' />
      </div>
      <div>
        <h1>Are you sure?</h1>
        <h2><?php echo $chefDetails['first_name'] . ' ' . $chefDetails['last_name'] ?></h2>
        <p>Bio: <?php echo $chefDetails['bio'] ?></p>
        <p>Address: <?php echo $chefDetails['address'] ?></p>
        <p>Delivery Radius: <?php echo $chefDetails['address_radius'] ?> km</p>
      </div>
      <div>
      <form action="user_profile" method="POST">
      <button type="submit" name="delete">Delete</button> 
      </form>
      </div>
        <a  href="chef_details" class="chef-link">Cancel</a>
    </div>
	</main>
<?php  include 'views/partials/footer.php'; ?>