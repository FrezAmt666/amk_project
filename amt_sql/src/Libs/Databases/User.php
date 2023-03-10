<?php 
   namespace Amt\App\Databases;
   use PDO;
   use PDOException;

   class User{
    private $conn;
    public function __construct($connection){
        $this->conn=$connection;


    }
    //getall method
    public function getAll(){
        try{
            $stmt = $this->conn->prepare("SELECT * From users");
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;

        }catch(Exception $e){
            
        }
    }
    
    //unique users
    public function getUniqueUsers(){
        try{
            $stmt = $this->conn->prepare("SELECT DISTINCT name from users");
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }catch(Exception $e){
            
        }
    }
   }


?>