<?php 
include('../vendor/autoload.php');
use App\AmkOnlineShop\Databases\Connection;
use App\AmkOnlineShop\Databases\ProductModel;
use Helpers\HTTP;

$id = $_GET['id'];



// echo $id;
// echo "<br>";
// echo $status;

$db = new ProductModel(new Connection);
$delete_product = $db->DeleteProduct($id);
// echo "<pre>";
// print_r($approve_user);
// echo "</pre>";
if($delete_product){
    HTTP::redirect('../admin/product_index.php?msg=Product has been deleted successfully.');
}else{
    echo "error";
}

?>