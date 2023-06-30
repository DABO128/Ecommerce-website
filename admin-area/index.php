<?php

include('../includes/connect.php');
include('../functions/common_function.php');
//session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashbord</title>
    


    <!--bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!--font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--css file-->
<link rel="stylesheet" href="../style.css">
<style>
 .admin_image{
 width: 100%;
 object-fit: contain;
 }

 .footer{
     position:absolute;
     bottom:0;
 }
    body{
        overflow-x:hidden;
    }
.product_img{
    width: 100px;
}
.listuser_img{
    width: 50px;
}
</style>
</head>
<body>
<!-- navbar-->
<div class="container-fluid p-0">
    <!--first child-->
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container-fluid">
            <img src="../images/elogo.png" alt="" class="logo">
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="navbar-nav">
                    <?php
                    if(!isset($_SESSION['user_username'])){
                        echo "<li class='nav-item'>
                        <a href='' class='nav-link'>Welcome Guest</a></li>
                        ";
                      }else{
                        echo "<li class='nav-item'>
                        <a class='nav-link'  href='#'>Welcome ".$_SESSION['user_username']."</a></li>";
                      }
                    ?>
                </ul>
            </nav>
        </div>
    </nav>
    <!--second child -->
    <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
    </div>
</div>
 
<!--third child -->
<div class="row">
    <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
        <div class="p-3">
            <a href="#"><img src="../images/omar.jpeg" alt="" class="admin_image"></a>
            <p class="text-light text-center">Admin Name</p>
        </div>
        <!--button*>a.nav-link.text-light.bg-info.my-1-->
        <div class="button text-center">
            <button class="my-3"><a href="index.php?insert_product" class="nav-link text-light bg-success my-1">Insert products</a></button>
            <button><a href="index.php?view_products" class="nav-link text-light bg-success my-1">View products</a></button>
            <button><a href="index.php?insert_category" class="nav-link text-light bg-success my-1">Insert Categories</a></button>
            <button><a href="index.php?view_category" class="nav-link text-light bg-success my-1">View Categories</a></button>
            <button><a href="index.php?insert_brand" class="nav-link text-light bg-success my-1">Insert Brands</a></button>
            <button><a href="index.php?view_brand" class="nav-link text-light bg-success my-1">View Brands</a></button>
            <button><a href="index.php?list_orders" class="nav-link text-light bg-success my-1">All orders</a></button>
            <button><a href="index.php?list_payments" class="nav-link text-light bg-success my-1">All payments</a></button>
            <button><a href="index.php?list_users" class="nav-link text-light bg-success my-1">List Users</a></button>
            <button><a href="" class="nav-link text-light bg-success my-1">Logout</a></button>

        </div>
    </div>
</div>

<!--fourth child -->
<div class="container my-5">
    <?php
    if(isset($_GET['insert_product'])){
        include('insert_product.php');
    }
    if(isset($_GET['insert_category'])){
        include('insert_categories.php');
    }
    if(isset($_GET['insert_brand'])){
         include('insert_brands.php');
    }
    if(isset($_GET['view_products'])){
        include('view_products.php');
   }
   if(isset($_GET['edit_products'])){
    include('edit_products.php');
}
if(isset($_GET['delete_product'])){
    include('delete_product.php');
}
if(isset($_GET['view_category'])){
    include('view_category.php');
}
if(isset($_GET['view_brand'])){
    include('view_brand.php');
}
if(isset($_GET['edit_category'])){
    include('edit_category.php');
}
if(isset($_GET['edit_brand'])){
    include('edit_brand.php');
}
if(isset($_GET['delete_category'])){
    include('delete_category.php');
}
if(isset($_GET['delete_brand'])){
    include('delete_brand.php');
}
if(isset($_GET['delete_order'])){
    include('delete_order.php');
}
if(isset($_GET['delete_user'])){
    include('delete_user.php');
}
if(isset($_GET['delete_payment'])){
    include('delete_payment.php');
}
if(isset($_GET['list_orders'])){
    include('list_orders.php');
}
if(isset($_GET['list_payments'])){
    include('list_payments.php');
}
if(isset($_GET['list_users'])){
    include('list_users.php');
}

if(isset($_GET['logout'])){
    include('logout.php');
}

    ?>
</div>

<!--last child-->
<!--<div class="bg-success p-3 text-center footer">
<p>All rights reserved ©- Designed by Filsenor226-2023</p>
</div>-->
<?php include("../includes/footer.php") ?>
</div>


    <!--bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>