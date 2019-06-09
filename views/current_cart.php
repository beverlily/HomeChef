<?php
   include 'views/partials/header.php';
   include 'views/partials/menu.php';
   // session_start();
   //if user isn't logged in, redirects them to the log in page
   isset($_SESSION['USERID']) ? $userId = $_SESSION['USERID'] :  header('Location: ../sign_in');

   $orderId = $_SESSION['ORDERID'];

   $orderItem = new OrderItem();
   $orderItems = $orderItem->getOrderItems($orderId);

   $order = new Order();
   $currentOrder = $order->getOrderById($orderId);

   //if there are items in the cart, calculate the total
   if($orderItems){
	  $totalPrice = $order->getOrderTotal($orderId);
    $totalPriceAfterTax = number_format($totalPrice*1.13,2);
   }

   $chef_id="";

   ?>
<main>
   <div class="page-wrapper">
      <div id="cart">
         <h2>Cart</h2>
		 <?php if(!$orderItems): ?>
			<div> Your cart is empty.</div>
		<?php else: ?>
				<ul id="order-item-list">
				   <?php foreach($orderItems as $item){
					  $price = $item->quantity*$item->price;
            $chef_id = $item->chef_id;

					  echo
					  "<li class='flex-container'>
						  <img src='images/$item->image' alt='$item->title' class='order-item' />
						 <div>
							   <h3 class='item-title'>$item->title</h3>
							   <div>Quantity: $item->quantity</div>
							 <div>$$price</div>
							 <br />
							 <div class='item-edit-delete'>
							    <form method='POST' action='edit_cart_item'>
									<input type='hidden' name='order_id' value='$orderId' />
									<input type='hidden' name='product_id' value='$item->id' />
									<input type='submit' name='edit_order_item' value='Edit Item'>
								</form>
								<form method='POST'>
								<input type='hidden' name='order_id' value='$orderId' />
									<input type='hidden' name='product_id' value='$item->id' />
									<input type='submit' name='delete_order_item' value='Remove From Cart'>
								</form>
							 </div>
						 </div>
					  </li>";
					  }
					?>
				<div id="order-total">
					 <span class='item-title'>Subtotal: </span> $<?=$totalPrice?>
           <br />
           <span class='item-title'>Tax </span> $<?=number_format($totalPrice*0.13,2)?>
           <br />
           <span class='item-title'>Total: </span> $<?=$totalPriceAfterTax?>
				</div>
        <br />
				</ul>
				<form method="POST" id="place-order-form">
				  <input type="hidden" name="order_id" value="<?=$orderId?>" />
          <input type="hidden" name="chef_id" value="<?=$chef_id?>" />
				  <input type="hidden" name="total_price" value="<?=$totalPriceAfterTax?>" />
				  <label for id="address">Delivery Address:</label>
				  <input type="text" name="address" value="<?=$currentOrder->address?>"/>
				  <br />
				  <br />
				  <label for id="comments">Comments:</label>
				  <br />
				  <textarea name="comments"></textarea>
				  <br />
				  <br />
				  <input type='submit' name="place_order" value="Place Order"/>
				</form>
			 </div>
		  </div>
		  <!-- end of page wrapper-->
		}
	<?php endif;?>
</main>
<?php
include 'views/partials/footer.php';
