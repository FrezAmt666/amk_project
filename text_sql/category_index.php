<?php
    include('vendor/autoload.php');
    use Sql\App\Databases\DatabaseConnect;
    use Sql\App\Databases\Category;
    $db = new Category(new DatabaseConnect());
    $categories = $db->GetAllCategories();
    
    // $UniqueCategories = $db->GetUniqueCategories();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <?php 
        include "navbar.php";
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                <div class="card-header">
                <h4>Categoires List
                <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Category</span>
                </h4>
                </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                            <th>ID</th>
                            <th>Category_Name</th>
                            <th>Created_at</th>
                            </tr>
                        </thead>
                    <tbody>
                    <tr>
                        <?php foreach($categories as $key => $category) : ?>
                            <td><?= $category->id; ?></td>
                            <td><?= $category->category_name; ?></td>
                            <td><?= $category->created_at; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
      <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="modal-body">
      <form action="_actions/create_category.php" method="post">
       <div class="mb-3">
        <label for="category_name" class="form-label">Category Name</label>
        <input type="text" class="form-control" name="category_name" id="category_name" aria-describedby="emailHelp">
       </div>
       <div class="mb-3">
        <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
       </div>
      </form>
     </div>
    </div>
   
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>