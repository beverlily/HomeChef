<?php
class OrderItem
{
	private $db;
    private $quantity;
	public function __construct(){
		$this->db = Database::getDb();
	}

	public function addOrderItem($order_id, $product_id, $quantity, $price){
		$sql = 'INSERT INTO products_orders(order_id, product_id, quantity, price)
			VALUES (:order_id, :product_id, :quantity, :price)';

		$pstmt = $this->db->prepare($sql);
		$pstmt->bindParam(':order_id', $order_id);
		$pstmt->bindParam(':product_id', $product_id);
		$pstmt->bindParam(':quantity', $quantity);
		$pstmt->bindParam(':price', $price);

		return $pstmt->execute();
	}
}
