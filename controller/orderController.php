<?php
$order = new Order();
$orderItem = new OrderItem();
$user = new User();
$user_id = isset($_SESSION['USERID'])? $_SESSION['USERID'] : "";
$currentUser = $user->getUser($user_id, Database::getDb());

if(isset($_POST['view_orders'])){

}
