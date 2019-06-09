<?php
$order = new Order();
$orderItem = new OrderItem();
$user = new User();
$user_id = isset($_SESSION['USERID'])? $_SESSION['USERID'] : "";
$currentUser = $user->getUser($user_id, Database::getDb());

if(isset($_POST['place_order'])){
	$order_id = $_POST['order_id'];
	$chef_id = $_POST['chef_id'];
	$order_address = $_POST['address'];
	$comments = $_POST['comments'];
	$current_address = $currentUser->address;
	$total_price = $_POST['total_price'];

	//updates the order with purchase time, order address, and comments
	$sendOrder = $order->sendOrder($order_id,  $chef_id, $order_address, number_format($total_price,2), $comments);

	//starts a new order (empties cart)
	$orderId = $order->createOrder($user_id, $current_address);
	if($orderId){
		header('Location:user_profile');
		$_SESSION['ORDERID']= $orderId;
	}
}

if(isset($_POST['update_order_item'])){
	$quantity = $_POST['quantity'];
	$product_id = $_POST['product_id'];
	$order_id = $_POST['order_id'];
	$updateCount = $orderItem->updateOrderItemQuantity($order_id, $product_id, $quantity);
	if($updateCount){
		header('Location:current_cart');
	}
}

if(isset($_POST['delete_order_item'])){
	$product_id = $_POST['product_id'];
	$order_id = $_POST['order_id'];
	$deleteCount = $orderItem->deleteOrderItem($order_id, $product_id);
	 if($deleteCount){
		   echo "<p class='success'> Deleted order item successfully.</p>";
	   } else {
		   echo "<p class='error'>Problem deleting order item.</p>";
	   }
}
