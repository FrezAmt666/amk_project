<?php 
include('../vendor/autoload.php');
use App\AmkOnlineShop\Databases\Connection;
use App\AmkOnlineShop\Databases\UserModel;
use Helpers\HTTP;

$db = new UserModel(new Connection);
$user = $db->GetUserById($_GET['id']);

    include "layouts/head.php";
?>

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
   <?php 
    include "layouts/navbar.php";
   ?>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->

    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
           <?php 
            include "layouts/sidebar.php";
           ?>
        </div>
    </div>

    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <td><?= $user->id; ?></td>
                    </tr>
                    <tr>
                        <th>User Name</th>
                        <td><?= $user->user_name; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?= $user->email; ?></td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>
                        <span class="badge badge-info"><?= $user->role; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td><?= $user->phone; ?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><?= $user->address; ?></td>
                    </tr>
                    <tr>
                        <th>Fix Address</th>
                        <td><?= $user->fix_address; ?></td>
                    </tr>
                    <tr>
                        <th>Profile Image</th>
                        <td>
                            <img src="../_actions/profile/<?= $user->profile_img; ?>" alt="" width="100px">
                        </td>
                    </tr>
                    <tr>
                        <th>Company</th>
                        <td><?= $user->company; ?></td>
                    </tr>
                    <tr>
                        <th>Bio</th>
                        <td><?= $user->bio; ?></td>
                    </tr>
                    <tr>
                        <th>Date Of Birth</th>
                        <td><?= $user->date_of_birth; ?></td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <td><?= $user->country; ?></td>
                    </tr>
                    <tr>
                        <th>State</th>
                        <td><?= $user->state; ?></td>
                    </tr>
                    <tr>
                        <th>Language</th>
                        <td><?= $user->language; ?></td>
                    </tr>
                    <tr>
                        <th>Fav Music</th>
                        <td><?= $user->fav_music; ?></td>
                    </tr>
                    <tr>
                        <th>Fav Movie</th>
                        <td><?= $user->fav_movie; ?></td>
                    </tr>
                    <tr>
                        <th>Website</th>
                        <td><?= $user->website; ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span class="badge badge-info"><?= $user->status; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td><?= date('d M Y', strtotime($user->created_at)); ?></td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td><?= date('d M Y', strtotime($user->updated_at)); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <?php 
        include "layouts/footer.php"
    ?>
    <!-- END: Footer-->


    <?php 
        include "layouts/scripts.php";
    ?>