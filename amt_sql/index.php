<?php 
    include "vendor/autoload.php";
    use Amt\App\Databases\dbconnect;
    use Amt\App\Databases\User;

    $db=new dbconnect();
    $connection=$db->connect();

    $userDB=new User($connection);
    $users = $userDB->getAll();
    $uniqueName = = $userDB->getUniqueUsers();
    

    // echo "<pre>";
    // print_r($users);
    // echo "</pre>";
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
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <h1 class="text-center text-success my-5">User Lists</h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Sex</th>
                        <th scope="col">Date Of Job</th>
                        <th scope="col">City</th>
                        <th scope="col">Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;

                            foreach($users as $user){  
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['age']; ?></td>
                            <td><?php echo $user['sex']; ?></td>
                            <td><?php echo $user['doj']; ?></td>
                            <td><?php echo $user['city']; ?></td>
                            <td><?php echo $user['salary']; ?></td>
                        </tr>
                        <?php 
                        }
                        ?>
                        
                    </tbody>
                </table>
            </div>
            <div class="col">

            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
