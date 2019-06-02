<?php
   include 'views/partials/header.php';
   include 'views/partials/menu.php';
   session_start();
   //if user isn't logged in, redirects them to the log in page
   isset($_SESSION['USERID']) ? $userId = $_SESSION['USERID'] :  header('Location: ../sign_in');
   $order_id = $_SESSION['ORDERID'];
   $orderItem = new OrderItem();
   $orderItems = $orderItem->getOrderItems($order_id);
   $order = new Order();
   $total_price = $order->getOrderTotal($order_id);
   var_dump($_POST);
   $timezone = date_default_timezone_set('US/Eastern');
   $date = date('Y-m-d H:i:s');
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
			   echo
			   "<div>
			   		<span class='item-title'>Total Price: $$total_price</span>
			   </div>";
               ?>
         </ul>
		 <form method="POST">
		   <input type="hidden" name="order_id" value="<?=$order_id?>" />
		   <input type="hidden" name="date" value="<?=$date?>"/>
		   <input type='submit' name="place_order" value="Place Order"/>
		 </form>
      </div>
   </div>
   <!-- end of page wrapper-->
</main>
<?php
include 'views/partials/footer.php';
