<?php 
namespace Sql\App\Databases;

use PDO;
use PDOException;

class Users

{
 private $db = null;  // property

 public function __construct($db)
 {
  $this->db = $db->connect();
 }
//getall users
public function GetAllUser(){
    $sql = "SELECT * FROM users";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();

 }

//get unique city from users table
public function GetUniqueCity(){
    $sql = "SELECT distinct city from users";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}
 //get unique user from users table
public function GetUniqueUser(){
    $sql = "SELECT distinct name from users";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

// count name from user table with alias
public function CountName(){
    $sql = "SELECT count(name) as vir_name from users";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

//sum
public function getTotalSalary(){
    $sql = "SELECT SUM(salary) as total_salary FROM users";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}
//avg
public function getAvgSalary(){
    $sql = "SELECT avg(salary) as avg_salary FROM users";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}


//min
public function getMinSalary(){
    $sql = "SELECT min(salary) as min_salary FROM users";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

//max
public function getMaxSalary(){
    $sql = "SELECT max(salary) as max_salary FROM users";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

// count salary from users table with alias
public function SumSalary(){
    $sql = "SELECT Sum(salary) as vir_name from users";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

//specify column fetch #homework
public function getColumnNameAgeCity(){
    $sql = "SELECT name, age, city from users";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

//where coluse to filter #homework
public function getAgeGreaterThan30(){
    $sql = "SELECT * from users where age>30";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

public function NameSexCityFemale(){
    $sql = "SELECT name, sex, city from users where sex ='f'";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

public function NameCitySalaryMale(){
    $sql = "SELECT name, city, salary from users where sex = 'm'";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}


}