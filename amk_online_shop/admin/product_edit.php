<?php 
include('../vendor/autoload.php');
use App\AmkOnlineShop\Databases\Connection;
use App\AmkOnlineShop\Databases\CategoryModel;
use App\AmkOnlineShop\Databases\ProductModel;

$db = new CategoryModel(new Connection);
$categories = $db->GetAllCategory();


$product_db = new ProductModel(new Connection);
$id = $_GET['id'];
$products = $product_db->GetProductById($id);


    include "layouts/head.php";
?>
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/autoFill.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/colReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/fixedColumns.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/select.dataTables.min.css">
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
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">AutoFill Datatable</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">DataTables</a>
                                </li>
                                <li class="breadcrumb-item active">AutoFill Datatable
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right">
                        <button class="btn btn-info dropdown-toggle mb-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                        <div class="dropdown-menu arrow"><a class="dropdown-item" href="#"><i class="fa fa-calendar-check mr-1"></i> Calender</a><a class="dropdown-item" href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a class="dropdown-item" href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
            <section id="autofill">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Product List <a href="product_index.php" class="btn btn-sm btn-primary">Back</a></h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <p class="card-text">
                                            <!-- msg session alert -->
                                            <?php if(isset($_GET['msg'])) : ?>
                                                <div class="alert alert bg-success alert-dismissible fade show" role="alert">
                                                    <strong>Success!</strong> <?= $_GET['msg'] ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <?php unset($_GET['msg']); ?>
                                                <?php endif; ?>
                                        </p>
                                        <div class="table-responsive">
                                        <form action="../_actions/product_update.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?= $products->id; ?>">
                                                <div class="form-group mb-3">
                                                    <label for="exampleFormControlInput1">Product Name</label>
                                                    <input type="text" class="form-control" name="product_name" value="<?= $products->product_name; ?>" id="exampleFormControlInput1" placeholder="Product Name">
                                                </div>
                                                <div class="form-gorup mb-3">
                                                <!-- category option -->
                                                <select class="form-control" name="category_id"  id="">
                                                    <option value="">Select Category</option>
                                                    <?php foreach ($categories as $category) : ?>
                                                        <option value="<?= $category->id; ?>" <?php if($category->id == $products->category_id){echo "selected";}  ?>><?= $category->category_name; ?></option>
                                                        <?php endforeach; ?>
                                                </select>
                                                </div>
                                                <!-- price -->
                                                <div class="form-group mb-3">
                                                    <label for="exampleFormControlInput1">Product Price</label>
                                                    <input type="text" class="form-control" name="price" value="<?= $products->price; ?>" id="exampleFormControlInput1" placeholder="Product Price">
                                                </div>
                                                <!-- old price -->
                                                <div class="form-group mb-3">
                                                    <label for="exampleFormControlInput1">Product Old Price</label>
                                                    <input type="text" class="form-control" name="old_price" value="<?= $products->old_price; ?>" id="exampleFormControlInput1" placeholder="Product Old Price">
                                                </div>
                                                <!-- qty -->
                                                <div class="form-group mb-3">
                                                    <label for="exampleFormControlInput1">Product Qty</label>
                                                    <input type="text" class="form-control" name="qty" value="<?= $products->qty; ?>" id="exampleFormControlInput1" placeholder="Product Qty">
                                                </div>
                                                <!-- description with textarea -->
                                                <div class="form-group mb-3">
                                                    <label for="des">Product Description</label>
                                                    <textarea name="description" id="des" placeholder="Product Description" cols="30" rows="3" class="form-control"><?= $products->description; ?></textarea>
                                                </div>
                                                

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                                
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
    <script src="app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/dataTables.autoFill.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/dataTables.colReorder.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/dataTables.fixedColumns.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/dataTables.select.min.js"></script>
    <script src="app-assets/js/scripts/tables/datatables-extensions/datatable-autofill.js"></script>