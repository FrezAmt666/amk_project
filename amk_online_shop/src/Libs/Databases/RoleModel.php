<?php

namespace App\AmkOnlineShop\Databases;

use PDO;
use PDOException;

class RoleModel
{
    private $db = null;
    public function __construct($db){
        $this->db = $db->connect();
    }
    
    //get all roles
    public function AllRoles(){
        $statement = $this->db->prepare("SELECT * From roles");
        $statement->execute();
        $row = $statement->fetchAll();
        return $row ?? false;
    }


}

?>