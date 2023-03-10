<?php 
include('../vendor/autoload.php');
use App\AmkOnlineShop\Databases\Connection;
use App\AmkOnlineShop\Databases\UserModel;
use Helpers\HTTP;
use Helpers\Auth;

$file_name = $_FILES['profile_img']['name'];
$tmp = $_FILES['profile_img']['tmp_name'];
$errors = $_FILES['profile_img']['error'];
$type = $_FILES['profile_img']['type'];



$data = [
    'id' => $_POST['id'],
    'profile_img' => $file_name
];

// echo "<pre>";
// print_r($data);
// echo "</pre>";

if($errors){
    echo "Error";
}else{
    if($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif'){
        $db = new UserModel(new Connection);
        $profile_img_update = $db->ProfileImgUpdate($data);
        if($profile_img_update){
            move_uploaded_file($tmp,'profile/'.$file_name);
            HTTP::redirect('../admin/admin_profile.php');
        }else{
            HTTP::redirect('../admin/admin_profile.php');
        }
    }else{
        echo "Invalid file type";
    }
} 

 ?>