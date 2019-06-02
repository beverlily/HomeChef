<?php
class Cart
{
	private $db;
	public function __construct(){
		$this->db = Database::getDb();
	}

	public function createCart($userId, $address){
		$sql = 'INSERT INTO orders(user_id, address, total_price)
			VALUES (:userId, :address, 0)';

		$pstmt = $this->db->prepare($sql);
		$pstmt->bindParam(':userId', $userId);
		$pstmt->bindParam(':address', $address);
		return $pstmt->execute();
	}
}
