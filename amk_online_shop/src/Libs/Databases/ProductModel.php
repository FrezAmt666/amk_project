<?php

namespace App\AmkOnlineShop\Databases;

use PDO;
use PDOException;

class ProductModel
{
    private $db = null;
    public function __construct($db){
        $this->db = $db->connect();
    }
    
    public function CreateProduct($data){
        $sql = "INSERT INTO products (product_name, category_id, price, old_price, qty, description, file_name,  product_status) VALUES(:product_name, :category_id, :price, :old_price, :qty, :description, :file_name, :product_status)";
        $statement = $this->db->prepare($sql);
        $statement->execute([
            ':product_name' => $data['product_name'],
            ':category_id' => $data['category_id'],
            ':price' => $data['price'],
            ':old_price' => $data['old_price'],
            ':qty' => $data['qty'],
            ':description' => $data['description'],
            ':file_name' => $data['file_name'],
            ':product_status' => $data['product_status'],
        ]);
        return true;
    }

    public function GetAllProduct(){
        $sql = "SELECT products.*, products.id as p_id, categories.id as c_id, categories.* from products INNER JOIN categories on products.category_id = categories.id";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll();
        return $results;
    }

    public function GetProductById($id){
       $sql = "SELECT * from products where id = :id";
       $statement = $this->db->prepare($sql);
       $statement->execute([
        ':id' => $id
    ]);
    $results = $statement->fetch();
    return $results;
    }

    public function UpdateProduct($id, $data){
        $sql = "UPDATE products set product_name = :product_name, category_id = :category_id, price = :price, old_price = :old_price, qty = :qty, description = :description where id = :id";
        $statement = $this->db->prepare($sql);
        $statement->execute([
            ':id' => $id,
            ':product_name' => $data['product_name'],
            ':category_id' => $data['category_id'],
            ':price' => $data['price'],
            ':old_price' => $data['old_price'],
            ':qty' => $data['qty'],
            ':description' => $data['description'],
        ]);
        return true;
    }

    //product delete
    public function DeleteProduct($id){
        $statement = $this->db->prepare("DELETE from products WHERE id=:id");
        $statement->execute([
            ':id' => $id
        ]);
        
        return true;
    }

    //product status update
    public function ProductStatusUpdate($id, $data){
    try{
        $sql = "UPDATE products set product_status = :product_status where id = :id";
        $statement = $this->db->prepare($sql);
            $statement->execute([
                'id' => $id,
                'data' => $data
            ]);
            return $statement->rowCount();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

}

?>