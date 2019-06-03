<?php
$order = new Order();
$orderItem = new OrderItem();
$user = new User();
$user_id = $_SESSION['USERID'];
$currentUser = $user->getUser($user_id, Database::getDb());

if(isset($_POST['place_order'])){
	$order_id = $_POST['order_id'];
	$order_address = $_POST['address'];
	$comments = $_POST['comments'];
	$current_address = $currentUser->address;

	//updates the order with purchase time, order address, and comments
	$sendOrder = $order->sendOrder($order_id, $order_address, $comments);

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
	$deleteCount = $m->deleteOrderItem($id);
	 if($deleteCount){
		   echo "<p class='success'> Deleted order item successfully.</p>";
	   } else {
		   echo "<p class='error'>Problem deleting order item.</p>";
	   }
}
