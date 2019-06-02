<?php
class Order
{
	//Orders
	private $db;
	public function __construct(){
		$this->db = Database::getDb();
	}

	public function createOrder($userId, $address){
		$sql = 'INSERT INTO orders(user_id, address, total_price)
			VALUES (:userId, :address, 0)';

		$pstmt = $this->db->prepare($sql);
		$pstmt->bindParam(':userId', $userId);
		$pstmt->bindParam(':address', $address);

		$pstmt->execute();
		$stmt = $this->db->query("SELECT LAST_INSERT_ID()");
		$lastId = $stmt->fetchColumn();
		return $lastId;
	}

	//Gets all orders of a user
	public function getAllOrders($userId){
		$sql = 'SELECT orders.id, orders.time, orders.address, orders.total_price, users.first_name, users.last_name FROM orders
		 		JOIN chefs
				ON orders.chef_id = chefs.id
				JOIN users
				ON chefs.user_id = users.id
				WHERE orders.user_id = :userId';
		$pstmt = $this->db->prepare($sql);
		$pstmt->bindParam(':userId', $userId);
		$pstmt->execute();
		return $pstmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getCurrentOrder($user_id){
		$sql = 'SELECT MAX(id)
		FROM orders
		WHERE user_id = :user_id';

		$pstmt = $this->db->prepare($sql);
		$pstmt->bindParam(':user_id', $user_id);
		$pstmt->execute();
		$orderId = $pstmt->fetchColumn();
		return $orderId;
	}

	//Gets order by id
	public function getOrderById($id){
		$sql = 'SELECT * FROM orders WHERE id = :id';
		$pstmt = $this->db->prepare($sql);
		$pstmt->bindParam(':id', $id);
		$pstmt->execute();
		return $pstmt->fetch(PDO::FETCH_OBJ);
	}

	public function getOrderTotal($order_id){
		$sql = 'SELECT SUM(products_orders.quantity * products.price) TotalPrice
		FROM products_orders
		JOIN products
		ON products_orders.product_id = products.id
		WHERE products_orders.order_id = :order_id';

		$pstmt = $this->db->prepare($sql);
		$pstmt->bindParam(':order_id', $order_id);
		$pstmt->execute();

		$orderTotal = $pstmt->fetchColumn();
		return $orderTotal;
	}

	//Updates order by Id
	public function updateOrder($id){
		$sql = 'UPDATE orders
			SET name = :name,
			current = :current,
			goal = :goal
			WHERE id = :id';

		$pstmt = $this->db->prepare($sql);

		$pstmt->bindParam(':id', $id);
		$pstmt->bindParam(':name', $name);

		return $pstmt->execute();
	}

	//Deletes order by id
	public function deleteOrder($id){
		$sql = 'DELETE FROM orders WHERE id = :id';
		$pstmt = $this->db->prepare($sql);
		$pstmt->bindParam(':id', $id);
		$pstmt->execute();

		return $pstmt->execute();
	}
}
