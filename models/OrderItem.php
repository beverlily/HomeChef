<?php
class OrderItem
{
	//products_orders
	private $db;
    private $quantity;
	public function __construct(){
		$this->db = Database::getDb();
	}

	public function addOrderItem($order_id, $product_id, $quantity){
		//checks to see if product is already in cart
		$sql = 'SELECT *
		FROM products_orders
		WHERE order_id = :order_id && product_id= :product_id';

		$pstmt = $this->db->prepare($sql);
		$pstmt->bindParam(':order_id', $order_id);
	    $pstmt->bindParam(':product_id', $product_id);

		$pstmt->execute();
		$products = $pstmt->fetchAll(PDO::FETCH_OBJ);

		//if product is in cart, increases the quantity
		if($products){
			$sql = 'UPDATE products_orders
				SET quantity = quantity + :quantity
				WHERE order_id = :order_id && product_id= :product_id';
			$pstmt = $this->db->prepare($sql);
			$pstmt->bindParam(':order_id', $order_id);
			$pstmt->bindParam(':product_id', $product_id);
			$pstmt->bindParam(':quantity', $quantity);

			return $pstmt->execute();
		}
		else{
			//if product isnt in order, adds to product to cart
			$sql = 'INSERT INTO products_orders(order_id, product_id, quantity)
				VALUES (:order_id, :product_id, :quantity)';

			$pstmt = $this->db->prepare($sql);
			$pstmt->bindParam(':order_id', $order_id);
			$pstmt->bindParam(':product_id', $product_id);
			$pstmt->bindParam(':quantity', $quantity);

			return $pstmt->execute();
		}
	}

	public function getOrderItems($order_id){
		$sql = 'SELECT products.id, products.image, products.title, products_orders.quantity, products.price
		FROM products_orders
		JOIN products
		ON products_orders.product_id = products.id
		WHERE order_id = :order_id';

		$pstmt = $this->db->prepare($sql);
		$pstmt->bindParam(':order_id', $order_id);

		$pstmt->execute();
		return $pstmt->fetchAll(PDO::FETCH_OBJ);
	}
}
