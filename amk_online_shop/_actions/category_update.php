<?php 
include('../vendor/autoload.php');
use App\AmkOnlineShop\Databases\Connection;
use App\AmkOnlineShop\Databases\CategoryModel;
use Helpers\HTTP;

$id = $_POST['id'];
$category_name = $_POST['category_name'];


// echo $id;
// echo "<br>";
// echo $status;

$db = new CategoryModel(new Connection);
$update_category = $db->UpdateCategory($id,$category_name);
// echo "<pre>";
// print_r($approve_user);
// echo "</pre>";
if($update_category){
    HTTP::redirect('../admin/category_index.php?msg=Category has been updated successfully.');
}else{
    HTTP::redirect('../admin/category_index.php?msg=Category has been updated successfully.');
}

?>