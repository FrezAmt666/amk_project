<?php 
 include('../vendor/autoload.php');
 use App\AmkOnlineShop\Databases\Connection;
 use App\AmkOnlineShop\Databases\UserModel;
 use Helpers\HTTP;
 use Helpers\Auth;


 $data = [
    'id'=> $_POST['id'],
    'password'=> md5($_POST['password'])
 ];

 $db = new UserModel(new Connection);
 $change_password = $db->ChangePassword($data);
 if($change_password){
    HTTP::redirect('../admin/admin_profile.php');
 }else{
    HTTP::redirect('../admin/admin_profile.php');

 }

?>