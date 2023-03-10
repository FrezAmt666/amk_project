<?php 
include('../vendor/autoload.php');
use App\AmkOnlineShop\Databases\Connection;
use App\AmkOnlineShop\Databases\ProductModel;
use Helpers\HTTP;

$id = $_POST['id'];
$data = [
    'product_name' => $_POST['product_name'],
    'category_id' => $_POST['category_id'],
    'price' => $_POST['price'],
    'old_price' => $_POST['old_price'],
    'qty' => $_POST['qty'],
    'description' => $_POST['description'],
];
// echo "<pre>";
// print_r($data);
// echo "</pre>";

// echo $id;
// echo "<br>";
// echo $status;

$db = new ProductModel(new Connection);
$update_product = $db->UpdateProduct($id,$data);

if($update_product){
    HTTP::redirect('../admin/product_index.php?msg=Product has been updated successfully.');
}else{
   echo "error";
}

?>