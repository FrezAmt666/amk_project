<?php
require_once('../vendor/autoload.php');

try{
    $count = 100;
    $faker = \Faker\Factory::create();

    //Connecting MySQL Database
    $pdo  = new PDO('mysql:host=localhost;dbname=amt_sql', 'root', '', array(
        PDO::ATTR_PERSISTENT => true
    ));
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    //Check if the table exists
    $tableExists = $pdo->query("SHOW TABLES LIKE 'users'")->rowCount() > 0;
    if ($tableExists) {
        //Truncate the table
        $stmt = $pdo->prepare("truncate table users");
        $stmt->execute();
    } else {
        throw new Exception("The table 'users' does not exist in the database.");
    }

    //Insert the data
    $sql = 'INSERT INTO users (name, age, sex, doj, city, salary) 
    VALUES (:name, :age, :sex, :doj, :city, :salary)';
    $stmt = $pdo->prepare($sql);

    for ($i=0; $i < $count; $i++) {
        $date = $faker->dateTime($max = 'now', 'UTC')->format('Y-m-d H:i:s');
        // $password = password_hash($faker->password(8), PASSWORD_DEFAULT);
        // $status = $faker->randomElement(array(0,1));
        $stmt->execute(
            [
                'name' => $faker->name,
                'age' => $faker->numberBetween(18, 60),
                'sex' => $faker->randomElement(array('m', 'f')),
                'doj' => $date,
                'city' => $faker->city,
                'salary' => $faker->numberBetween(1000, 100000)
            ]
        );
    }
} catch(Exception $e){
    echo '<pre>';print_r($e);echo '</pre>';exit;
}

if ($stmt->rowCount() > 0) {
    echo 'Data Inserted Successfully';
} else {
    echo 'Data Inserted Failed';
}