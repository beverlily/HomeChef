<?php
//require_once('Database.php');

class Product
{
  public function addProduct($chefid, $title, $description, $image, $price, $db)
  {
    $sql = "INSERT INTO products (chef_id, title, description, image, price)
    VALUES (:chefid, :title, :description, :image, :price)";

    $pst = $db->prepare($sql);
    $pst->bindParam(':chefid', $chefid);
    $pst->bindParam(':title', $title);
    $pst->bindParam(':description', $description);
    $pst->bindParam(':image', $image);
    $pst->bindParam(':price', $price);


    $count = $pst->execute();
    return $count;
  }

  public function getProducts($chefid, $db)
  {
    $sql = "SELECT products.id, products.chef_id, products.title, products.description,
    products.image, products.price, products.available_now
     FROM products join chefs ON products.chef_id = chefs.id
    WHERE products.chef_id = :chef_id";

    $pst = $db->prepare($sql);
    $pst->bindParam(':chef_id', $chefid);
    $pst->execute();
    $p = $pst->fetchAll(PDO::FETCH_OBJ);
    return $p;
  }

  public function getProduct($id, $db)
  {
    $sql = "SELECT * FROM products WHERE
    id = :id";
    $pst = $db->prepare($sql);
    $pst->bindParam(':id', $id);
    $pst->execute();
    $p = $pst->fetch(PDO::FETCH_OBJ);
    return $p;
  }

  public function getChefName($id,$db)
  {
    $sql = "SELECT users.first_name, users.last_name FROM products
    join chefs ON products.chef_id = chefs.id join users ON chefs.user_id = users.id
    WHERE
    products.id = :id";
    $pst = $db->prepare($sql);
    $pst->bindParam(':id', $id);
    $pst->execute();
    $p = $pst->fetch(PDO::FETCH_OBJ);
    return $p;
  }

  public function getAllProducts($db)
  {
    $sql= "SELECT * FROM products
    WHERE available_now = 1";
    $pst = $db->prepare($sql);
    $pst->execute();
    $p = $pst->fetchAll(PDO::FETCH_OBJ);
    return $p;
  }



}
