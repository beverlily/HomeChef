<?php
$order = new Order();

if(isset($_POST['place_order'])){
	//creates new order
	$updateOrder = $order->updateOrder();
	$orderId = $order->createOrder($_SESSION['USERID'],$address);
	if($orderId){
		header('Location:user_profile');
		$_SESSION['ORDERID']= $orderId;
	}
}
