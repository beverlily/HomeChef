<?php
class Order
{
	private $db;
	public function __construct(){
		$this->db = Database::getDb();
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

	//Gets order by id
	public function getOrderById($id){
		$sql = 'SELECT * FROM orders WHERE id = :id';
		$pstmt = $this->db->prepare($sql);
		$pstmt->bindParam(':id', $id);
		$pstmt->execute();
		return $pstmt->fetch(PDO::FETCH_OBJ);
	}

	//Adds order for a user
	public function addOrder($userId, $name, $current, $goal){
		$sql = 'INSERT INTO measurements(user_id, name, current, goal)
			VALUES (:userId, :name, :current, :goal)';

		$pstmt = $this->db->prepare($sql);
		$pstmt->bindParam(':userId', $userId);
		$pstmt->bindParam(':name', $name);
		$pstmt->bindParam(':current', $current);
		$pstmt->bindParam(':goal', $goal);

		//count
		return $pstmt->execute();
	}

	//Updates order by Id
	public function updateOrder($id, $name, $current, $goal){
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
?>
