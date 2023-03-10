<?php 
include('../vendor/autoload.php');
use App\AmkOnlineShop\Databases\Connection;
use App\AmkOnlineShop\Databases\CategoryModel;
use Helpers\HTTP;

$id = $_GET['id'];



// echo $id;
// echo "<br>";
// echo $status;

$db = new CategoryModel(new Connection);
$delete_category = $db->DeleteCategory($id);
// echo "<pre>";
// print_r($approve_user);
// echo "</pre>";
if($delete_category){
    HTTP::redirect('../admin/category_index.php?msg=Category has been deleted successfully.');
}else{
    HTTP::redirect('../admin/category_index.php?msg=Category has been deleted successfully.');
}

?>