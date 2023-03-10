<?php 
 include('../vendor/autoload.php');
 use App\AmkOnlineShop\Databases\Connection;
 use App\AmkOnlineShop\Databases\UserModel;
 use Helpers\HTTP;
 use Helpers\Auth;


 $data = [
    'id' => $_POST['id'],
    'user_name' => $_POST['user_name'],
    'public_name' => $_POST['public_name'],
    'company' => $_POST['company'],
 ];
//  echo "<pre>";
//  print_r($data);
//  echo "</pre>";

$db= new UserModel(new Connection);

$user_update_data = $db->GeneralUpdate($data);

if($user_update_data){
    HTTP::redirect('../admin/admin_profile.php');
}else{
    HTTP::redirect('../admin/admin_profile.php');

}




?>