<?php 
namespace Sql\App\Databases;

use PDO;
use PDOException;

class Category

{
 private $db = null;  // property

 public function __construct($db)
 {
  $this->db = $db->connect();
 }
//getall categories
public function GetAllCategories(){
    $sql = "SELECT * FROM categories order by id desc";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
    //return $stmt->fetchAll(PDO::FETCH_ASSOC);

 }

  //get unique category from users table
// public function GetUniqueCategories(){
//     $sql = "SELECT distinct category_name from categories";
//     $stmt = $this->db->prepare($sql);
//     $stmt->execute();
//     return $stmt->fetchAll();
// }

//insert category
public function InsertCategory($data){
    $sql = "INSERT INTO categories (category_name) VALUES (:category_name)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':category_name', $data);
    $stmt->execute();
    return $stmt->rowCount();
}





}