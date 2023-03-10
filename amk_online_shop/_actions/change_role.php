<?php 
include('../vendor/autoload.php');
use App\AmkOnlineShop\Databases\Connection;
use App\AmkOnlineShop\Databases\UserModel;
use Helpers\HTTP;

$id = $_POST['id'];
$role_id = $_POST['role_id'];

// echo $id;
// echo "<br>";
// echo $role_id;

$db = new UserModel(new Connection);
$change_role_user = $db->ChangeRole($id,$role_id);
// echo "<pre>";
// print_r($change_role_user);
// echo "</pre>";
if($change_role_user){
    HTTP::redirect('../admin/user_index.php?msg=User has been changed role successfully.');
}else{
    echo "Error";
}

?>