<?php

namespace App\AmkOnlineShop\Databases;

use PDO;
use PDOException;

class CategoryModel
{
    private $db = null;
    public function __construct($db){
        $this->db = $db->connect();
    }
    
    //category create
    public function CreateCategory($name){
        $statement = $this->db->prepare("INSERT into categories (category_name) values (:category_name)");
        $statement->execute([
            ':category_name' => $name
        ]);
        return $statement->rowCount() ?? false;
    }

    //get all categories
    public function GetAllCategory(){
        $statement = $this->db->prepare("SELECT * FROM categories");
        $statement->execute();
        $row = $statement->fetchAll();
        return $row ?? false;
    }

    //get category by id
    public function GetCategoryById($id){
        $statement = $this->db->prepare("SELECT * FROM categories WHERE id=:id");
        $statement->execute([
            ':id' => $id
        ]);
        $row = $statement->fetch();
        return $row ?? false;
    }

    //update category
    public function UpdateCategory($id,$category_name){
        $statement = $this->db->prepare("UPDATE categories Set category_name = :category_name WHERE id=:id");
        $statement->execute([
            ':id' => $id,
            ':category_name' => $category_name
        ]);
        
        return $row ?? false;
    }

    //category delete
    public function DeleteCategory($id){
        $statement = $this->db->prepare("DELETE from categories WHERE id=:id");
        $statement->execute([
            ':id' => $id
        ]);
        
        return $row ?? false;
    }


}

?>