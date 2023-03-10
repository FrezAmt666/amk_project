<?php

namespace App\AmkOnlineShop\Databases;

use PDO;
use PDOException;

class UserModel
{
    private $db = null;
    public function __construct($db){
        $this->db = $db->connect();
    }
    public function UserRegister($data){
        try{
            $query = "INSERT INTO users(user_name, public_name, email, password, phone, address, fix_address, company, bio, date_of_birth, country, state, language, fav_music, fav_movie, website, status, role_id, created_at) VALUES(:user_name, :public_name, :email, :password, :phone, :address, :fix_address, :company, :bio, :date_of_birth, :country, :state, :language, :fav_music, :fav_movie, :website, :status, :role_id, NOW())";
            $statement = $this->db->prepare($query);
            $statement->execute($data);
            return $this->db->lastInsertId();
    
            
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    //user login
    public function UserLogin($email,$password){
        $statement = $this->db->prepare("SELECT users.*, roles.name as role, roles.value from users LEFT JOIN roles ON users.role_id = roles.id WHERE email = :email AND password = :password");
        $statement->execute([
            ':email' => $email,
            ':password' => $password
        ]);
        $row = $statement->fetch();
        return $row ?? false;
    }


    //update function
    public function GeneralUpdate($data){
        try{
            $query = "UPDATE users set user_name = :user_name, public_name = :public_name, company = :company where id = :id";
            $statement = $this->db->prepare($query);
            $statement->execute($data);
            return $statement->rowCount();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    //change password
    public function ChangePassword($data){
        try{
            $query = "UPDATE users set password = :password where id = :id";
            $statement = $this->db->prepare($query);
            $statement->execute($data);
            return $statement->rowCount();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    //profile update
    public function ProfileImgUpdate($data){
        try{
            $query = "UPDATE users set profile_img = :profile_img where id = :id";
            $statement = $this->db->prepare($query);
            $statement->execute($data);
            return $statement->rowCount();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    //info
    public function UserInfoUpdate($data){
        try{
            $query = "UPDATE users set bio = :bio, date_of_birth = :date_of_birth, country = :country, state = :state, language = :language, phone = :phone, website = :website, fav_music = :fav_music, fav_movie = :fav_movie where id = :id";
            $statement = $this->db->prepare($query);
            $statement->execute($data);
            return $statement->rowCount();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    //get all users with roles
    public function GetAllUsers(){
        $statement = $this->db->prepare("SELECT users.*, roles.name as role, roles.value from users LEFT JOIN roles on users.role_id = roles.id");
        $statement->execute();
        $row = $statement->fetchAll();
        return $row ?? false;
    }

    //pending user approve
    public function UserApprove($id, $status){
        try{
            $query = "UPDATE users set status = :status where id = :id";
            $statement = $this->db->prepare($query);
            $statement->execute([
                'id' => $id,
                'status' => $status
            ]);
            return $statement->rowCount();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    //pending user approve
    public function UserSuspend($id, $status){
        try{
            $query = "UPDATE users set status = :status where id = :id";
            $statement = $this->db->prepare($query);
            $statement->execute([
                'id' => $id,
                'status' => $status
            ]);
            return $statement->rowCount();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    //change role
    public function ChangeRole($id, $role_id){
        try{
            $query = "UPDATE users set role_id = :role_id where id = :id";
            $statement = $this->db->prepare($query);
            $statement->execute([
                'id' => $id,
                'role_id' => $role_id
            ]);
            return $statement->rowCount();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    //get user data by id with roles
    public function GetUserById($id){
        $statement = $this->db->prepare("SELECT users.*, roles.name as role, roles.value From users left join roles on users.role_id = roles.id where users.id = :id");
        $statement->execute([
            'id' => $id
        ]);
        $row = $statement->fetch();
        return $row ?? false;
    }

    //user login check
    public function UserLoginCheck($email,$password){
        $statement = $this->db->prepare("SELECT users.*, roles.name as role, roles.value from users LEFT JOIN roles ON users.role_id = roles.id WHERE email = :email AND password = :password AND status != 'pending'");
        $statement->execute([
            ':email' => $email,
            ':password' => $password
        ]);
        $row = $statement->fetch();
        return $row ?? false;
    }


}

?>