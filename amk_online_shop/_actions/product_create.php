<?php 
    include('../vendor/autoload.php');
    use App\AmkOnlineShop\Databases\Connection;
    use App\AmkOnlineShop\Databases\ProductModel;
    use Helpers\HTTP;

    $file_name = $_FILES['file_name']['name'];
    $tmp = $_FILES['file_name']['tmp_name'];
    $errors = $_FILES['file_name']['error'];
    $type = $_FILES['file_name']['type'];

    $data = [
        'product_name' => $_POST['product_name'],
        'category_id' => $_POST['category_id'],
        'price' => $_POST['price'],
        'old_price' => $_POST['old_price'],
        'qty' => $_POST['qty'],
        'description' => $_POST['description'],
        'file_name' => $file_name,
        'product_status' => $_POST['product_status'],
    ];
    
    if($errors){
        echo "Error";
    }else{
        if($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif'){
            $db = new ProductModel(new Connection());
            $product_create = $db->CreateProduct($data);
            if($product_create){
                move_uploaded_file($tmp,'product_img/'.$file_name);
                HTTP::redirect('../admin/product_index.php?msg=Product has been created successfully!');
            }else{
                echo "error";
            }
        }else{
            echo "Invalid file type";
        }
    } 
?>