<?php
    include('vendor/autoload.php');
    use Sql\App\Databases\DatabaseConnect;
    use Sql\App\Databases\Users;
    $db = new Users(new DatabaseConnect());
    $users = $db->GetAllUser();
    // echo "<pre>";
    // print_r($users);
    // echo "</pre>";
    // die();
 
    $unique_cities = $db->GetUniqueCity();
    // echo "<pre>";
    // print_r($users);
    // echo "</pre>";
    // die();
    $unique_user = $db->GetUniqueUser();


    $count_name = $db->CountName();
    $sum_salary = $db->SumSalary();
    $nameagecity = $db->getColumnNameAgeCity();
    $greaterthan30 = $db->getAgeGreaterThan30();
    $namesexcityf = $db->NameSexCityFemale();
    $namecitysalarym = $db-> NameCitySalaryMale();
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
                        <h4>User List</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Sex</th>
                            <th>Doj</th>
                            <th>City</th>
                            <th>Salary</th>
                            </tr>
                        </thead>
                    <tbody>
                    <tr>
                        <?php foreach($users as $key => $user) : ?>
                            <td><?= $user->id; ?></td>
                            <td><?= $user->name; ?></td>
                            <td><?= $user->age; ?></td>
                            <td><?= $user->sex; ?></td>
                            <td><?= $user->doj; ?></td>
                            <td><?= $user->city; ?></td>
                            <td><?= $user->salary; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4>Unique City</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>city</th>
                        </tr>
                    </thead>
                    <tr>
                        <?php
                            foreach($unique_cities as $key => $city) : ?>
                            <td><?= $city -> city; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4>Unique User</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tr>
                        <?php
                            foreach($unique_user as $key => $name) : ?>
                            <td><?= $name -> name; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4>Count Name</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Count</th>
                        </tr>
                    </thead>
                    <tr>
                        <?php
                            foreach($count_name as $key => $vir_name) : ?>
                            <td><?= $vir_name -> vir_name; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4>Count Salary</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sum</th>
                        </tr>
                    </thead>
                    <tr>
                        <?php
                            foreach($sum_salary as $key => $vir_name) : ?>
                            <td><?= $vir_name -> vir_name; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Name age city List</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                            
                            <th>Name</th>
                            <th>Age</th>
                            <th>City</th>
                           
                            </tr>
                        </thead>
                    <tbody>
                    <tr>
                        <?php foreach($nameagecity as $key => $nameagecitys) : ?>
                            
                            <td><?= $nameagecitys->name; ?></td>
                            <td><?= $nameagecitys->age; ?></td>
                            
                            <td><?= $nameagecitys->city; ?></td>
                            
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

    </div>
    <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>greater than 30 Lists</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                            
                            
                            <th>Age</th>
                         
                           
                            </tr>
                        </thead>
                    <tbody>
                    <tr>
                        <?php foreach($greaterthan30 as $key => $greaterthan30s) : ?>
                            
                          
                            <td><?= $greaterthan30s->age; ?></td>
                            
                          
                            
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

    </div>
    <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Name Sex City Female</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                            
                            
                            <th>Name</th>
                            <th>Sex</th>
                            <th>City</th>
                         
                           
                            </tr>
                        </thead>
                    <tbody>
                    <tr>
                        <?php foreach($namesexcityf as $key => $namesexcityfs) : ?>
                            
                          
                            <td><?= $namesexcityfs->name; ?></td>
                            <td><?= $namesexcityfs->sex; ?></td>
                            <td><?= $namesexcityfs->city; ?></td>
                            
                          
                            
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

    </div>
    <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Name City Salary Male</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                            
                            
                            <th>Name</th>
                            <th>City</th>
                            <th>Salary</th>
                         
                           
                            </tr>
                        </thead>
                    <tbody>
                    <tr>
                        <?php foreach($namecitysalarym as $key => $namecitysalaryms) : ?>
                            
                          
                            <td><?= $namecitysalaryms->name; ?></td>
                            <td><?= $namecitysalaryms->city; ?></td>
                            <td><?= $namecitysalaryms->salary; ?></td>
                            
                          
                            
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>