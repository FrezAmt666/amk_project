<?php 
    namespace Amt\App\Databases;

    use PDO;
    use PDOException;
    
    class dbconnect{
        private $host = "localhost";
        private $dbname = "amt_sql";
        private $username = "root";
        private $password = "";
        private $conn;
        
        public function connect(){
            try{
                $this->conn=new PDO("mysql:host=$this->host;dbname=$this->dbname;", $this->username, $this->password);
                // echo "success";
                return $this->conn;
            }catch(Exception $e){

            }
        }



    }
    // $db=new dbconnect();
    // $db->connect();


?>