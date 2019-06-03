<?php
class Chef {
  private $db;
  /* Constructor function for Chef
           Parameters: $db the PDO for the database */
	public function __construct($db) {
    $this->db = $db;
  }

  /*Method that allows to create a new chef
	Parameters: $userId - id of a user who wants to become a chef (session id)
							$bio - short bio 
              $image - image of the chef
              $radius - delivery radius  */

	public function createChef($userId, $bio, $image, $radius){

		$sql = "INSERT INTO chefs (user_id, bio, image, address_radius)
						VALUES (:userId, :bio, :image, :address_radius)";

		$pst = $this->db->prepare($sql);

		$pst->bindParam(':userId', $userId);
		$pst->bindParam(':bio', $bio);
		$pst->bindParam(':image', $image);
		$pst->bindParam(':address_radius', $radius);

		$count = $pst->execute();

		// query that sets value = 1 in IsChef column of users table - means that users have chef profiles  
		$sqlUser = "UPDATE users SET IsChef = 1 
								 WHERE id=:userId";
		$pst = $this->db->prepare($sqlUser);
		$pst->bindParam(':userId', $userId);
		$pst->execute();
		return $count;

	}
	public function getChefInfo($id){
		$sql = "SELECT * FROM chefs WHERE id = :chefId";

      $pst = $this->db->prepare($sql);
      $pst->bindParam(':chefId', $id);
      $pst->execute();

      $c = $pst->fetch();

      return $c;
	}


  /*Method that allows to edit the chef info
	Parameters: $userId - user_id of the chef 
							$bio - bio of the chef
              $image - image of the chef
              $radius - delivery radius */

	public function editChef($userId, $bio, $image, $radius){

		$sql = "UPDATE chefs SET bio = :bio, image = :image, address_radius = :radius
						WHERE user_id = :id";

		$pst = $this->db->prepare($sql);

		$pst->bindParam(':bio', $bio);
    $pst->bindParam(':image', $image);
    $pst->bindParam(':radius', $radius);
		$pst->bindParam(':id', $userId);

		$count = $pst->execute();
		return $count;

	}

  /*Method that allows to delete the chef profile  and all dependant data*/

	public function deleteChef($id, $userId){
		$sql = "DELETE FROM products 
            WHERE chef_id = :id";
    
    $pst = $this->db->prepare($sql);
    $pst->bindParam(':id', $id);
    $pst->execute();

		$sql = "DELETE FROM chefs 
            WHERE id = :id";
    
    $pst = $this->db->prepare($sql);
    $pst->bindParam(':id', $id);
    $count = $pst->execute();
		
		$sqlUser = "UPDATE users SET IsChef = 0 
								 WHERE id=:userId";
		$pst = $this->db->prepare($sqlUser);
		$pst->bindParam(':userId', $userId);
		$pst->execute();

		
		
		return $count;
  }

	
	/*Method that gets the chef info with the specific id.*/

 		public function getChef($id) {
      $sql = "SELECT users.id, first_name, last_name, address, chefs.id, user_id,  bio, image, address_radius
			FROM users
			INNER JOIN chefs
			ON users.id = chefs.user_id
			WHERE users.id = :id";

      $pst = $this->db->prepare($sql);
      $pst->bindParam(':id', $id);
      $pst->execute();

      $chef = $pst->fetch();

      return $chef;
		 }
	
		 public function getAllChefs() {  //join with users table
      $sql = "SELECT users.id, first_name, last_name, address, chefs.id, bio, image, address_radius 
							FROM users
							INNER JOIN chefs
							ON users.id = chefs.user_id
							WHERE users.IsChef = 1";

      $pst = $this->db->prepare($sql);
      $pst->execute();

			$chefdetails = $pst->fetchAll(PDO::FETCH_OBJ);
			return $chefdetails;
 	  }


}



?>
