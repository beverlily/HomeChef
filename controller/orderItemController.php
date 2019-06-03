<?php
$order = new Order();
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
