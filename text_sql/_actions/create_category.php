<?php 

    include('../vendor/autoload.php');
    use Sql\App\Databases\DatabaseConnect;
    use Sql\App\Databases\Category;

    $data = [
        'category_name' => $_POST['category_name']
    ];

    $db = new Category(new DatabaseConnect);

    $result = $db->InsertCategory($data['category_name']);
    if($result){
        header('location: ../category_index.php');
    }else{
        echo 'Data Not Found';
    }
?>