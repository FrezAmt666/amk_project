<?php 
    session_start();
    include('../vendor/autoload.php');

    use App\AmkOnlineShop\Databases\Connection;
    use App\AmkOnlineShop\Databases\UserModel;
    use Helpers\HTTP;

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $db = new UserModel(new Connection);
    // $user = $db->UserLogin($email, $password);
    $user = $db->UserLoginCheck($email, $password);
    if($user->value==1){
        $_SESSION['user'] = $user;
        HTTP::redirect("../admin/admin_profile.php");
    }else if($user->value==2){
        $_SESSION['user'] = $user;
        HTTP::redirect("../admin/user_profile.php");
    }else{     
        HTTP::redirect("../login_form.php?msg= Your Account has not been approved by Admin yet."); 
    }
?>