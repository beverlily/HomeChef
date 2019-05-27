<?php 
class Chef {
  private $db;
  /* Constructor function for Request
           Parameters: $db the PDO for the database */
	public function __construct($db) {
    $this->db = $db;
  }

  /*Method that allows to create a new chef
	Parameters: $userId - id of a user who wants to become a chef
							$bio - short bio 
              $image - image of the chef
              $radius - delivery radius  */

	public function createChef($userId, $bio, $image, $radius){
		// $time = time();

		$sql = "INSERT INTO chefs (user_id, bio, image, address_radius)
						VALUES (:userId, :bio, :image, :address_radius)";

		$pst = $this->db->prepare($sql);

		$pst->bindParam(':userId', $userId);
		$pst->bindParam(':bio', $bio);
		$pst->bindParam(':image', $image);
		$pst->bindParam(':address_radius', $radius);

		$count = $pst->execute();
		return $count;

  }
  
  /*Method that allows to edit the chef info
	Parameters: $chefId - id of the chef that needs to be changed
							$bio - bio of the chef
              $image - image of the chef 
              $radius - delivery radius */

	public function editChef($chefId, $bio, $image, $radius){

		$sql = "UPDATE chefs SET bio = :bio, image = :image, radius = :radius
						WHERE id = :chefId";

		$pst = $this->db->prepare($sql);

		$pst->bindParam(':bio', $bio);
    $pst->bindParam(':image', $image);
    $pst->bindParam(':radius', $radius);
		$pst->bindParam(':chefId', $chefId);

		$count = $pst->execute();
		return $count;

	}

  /*Method that allows to delete the chef profile  - means that the chef profile is deleted
	Parameters: $chefId - id of the chef that needs to be changed */

	public function deleteChef($chefId){

		$sql = "DELETE FROM chefs 
            WHERE id = :chefId";
    
    $pst = $this->db->prepare($sql);
    $pst->bindParam(':chefId', $chefId);

    $count = $pst->execute([':chefId' => $chefId]);
    return $count;
  }

  	/*Method that gets the chef info with the specific id.
		 The method is used for update functionality to
		 retrieve data that needs to be changed and to desplay details */

 		public function getChef($id) {
      $sql = "SELECT * FROM chefs WHERE id = :chefId";

      $pst = $this->db->prepare($sql);
      $pst->bindParam(':chefId', $id);
      $pst->execute();

      $request = $pst->fetch();

      return $request;
 	  }


}



?>