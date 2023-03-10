<?php 
include('../vendor/autoload.php');
use App\AmkOnlineShop\Databases\Connection;
use App\AmkOnlineShop\Databases\UserModel;
use Helpers\HTTP;
use Helpers\Auth;

$language = implode(',', $_POST['language']);
$fav_music = implode(',', $_POST['fav_music']);
$fav_movie = implode(',', $_POST['fav_movie']);



$data = [
    'id' => $_POST['id'],
    'bio' => $_POST['bio'],
    'date_of_birth' => $_POST['date_of_birth'],
    'country' => $_POST['country'],
    'state' => $_POST['state'],
    'language' => $language,
    'phone' => $_POST['phone'],
    'website' => $_POST['website'],
    'fav_music' => $fav_music,
    'fav_movie' => $fav_movie,
];

$db= new UserModel(new Connection);

$user_info_update = $db->UserInfoUpdate($data);

if($user_info_update){
    HTTP::redirect('../admin/admin_profile.php');
}else{
    // HTTP::redirect('../admin/admin_profile.php');
    echo "error";
}

// echo "<pre>";
// print_r($data);
// echo "</pre>";




?>