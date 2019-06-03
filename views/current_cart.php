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
   $currentOrder = $order->getOrderById($_SESSION['ORDERID']);

   $total_price = $order->getOrderTotal($order_id);
   if(!$total_price) $total_price = 0;
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
	                  	<h3 class='item-title'>$item->title</h3>
						<div class='item-title'>Quantity: $item->quantity</div>
	                  <div>$$price</div>
					  <br />
					  <div class='item-edit-delete'>
						  <form method='POST' action='edit_cart_item'>
							 <input type='hidden' name='product_id' value='$item->id' />
							 <input type='submit' name='edit_cart_item' value='Edit Item'>
						 </form>
						 <form class='delete-measurement'>
							 <input type='hidden' name='product_id' value='$item->id' />
							  <input type='submit' name='delete_cart_item' value='Remove From Cart'>
						 </form>
					  </div>
                  </div>
               </li>";
               }
			   echo
			   "<div>
			   		<span class='item-title'>Total Price: $$total_price</span>
			   </div>";
               ?>
         </ul>
		 <form method="POST" id="place-order-form">
		   <input type="hidden" name="order_id" value="<?=$order_id?>" />
		   <label for id="address">Address:</label>
		   <input type="text" name="address" value="<?=$currentOrder->address?>"/>
		   <br />
		   <br />
		   <label for id="address">Comments:</label>
		   <br />
		   <textarea name="comments"></textarea>
		   <br />
		   <br />
		   <input type='submit' name="place_order" value="Place Order"/>
		 </form>
      </div>
   </div>
   <!-- end of page wrapper-->
</main>
<?php
include 'views/partials/footer.php';
