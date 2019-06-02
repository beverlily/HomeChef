<?php
	  include 'views/partials/header.php';
	  include 'views/partials/menu.php';
	  session_start();
	  //if user isn't logged in, redirects them to the log in page
	  isset($_SESSION['USERID']) ? $userId = $_SESSION['USERID'] :  header('Location: ../sign_in');
	  $o = new Order();
	  $orders = $o->getAllOrders($userId);
 ?>
<div class="page-wrapper">
   <main>
	 <div id="orders">
		 <h2>Orders</h2>
		 <ul id="order-list">
			 <?php foreach($orders as $order)
				echo "<li class='order'>
					   $order->id
					   <br />
					   $order->address
					   <br />
					   $order->time
					   <br />
					   $order->first_name $order->last_name
					   <br />
					   $$order->total_price
					 </li>";
			 ?>
		 </ul>
	 </div>
   </main>
</div>
<!-- end of page wrapper-->
<?php
     include 'views/partials/footer.php';
