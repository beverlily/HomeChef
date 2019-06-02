<?php
   include 'views/partials/header.php';
   include 'views/partials/menu.php';
   session_start();
   //if user isn't logged in, redirects them to the log in page
   isset($_SESSION['USERID']) ? $userId = $_SESSION['USERID'] :  header('Location: ../sign_in');
   $orderItem = new OrderItem();
   $orderItems = $orderItem->getOrderItems($_SESSION['ORDERID']);
   ?>
<main>
   <div class="page-wrapper">
      <div id="cart">
         <h2>Cart</h2>
         <ul id="order-item-list">
            <?php foreach($orderItems as $item){
			   $price = $item->quantity*$item->price;
               echo
               "<li class='flex-container'>
               	   <img src='images/$item->image' alt='$item->title' class='order-item' />
                  <div>
	                  	<span class='item-title'>$item->title</span>
						<br />
						<span class='item-title'>Quantity: </span>$item->quantity
	                  <br />
					  $$price
                  </div>
               </li>";
               }
               ?>
         </ul>
      </div>
   </div>
   <!-- end of page wrapper-->
</main>
<?php
include 'views/partials/footer.php';
