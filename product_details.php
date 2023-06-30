<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product details</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
    <!--font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
 <!--css file-->
 <link rel="stylesheet" href="style.css" class="">
</head>
<style>
    body{
        overflow-x: hidden;
    }
</style>
<body>
    <!--navbar-->
<div class="contenair-fluid">
    <!--first child-->
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
  <div class="container-fluid">
  <img src="./images/elogo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>

      <li class="nav-item">
        <a class="nav-link" href="display_all.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./user_area/user_registration.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact_form.php">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup>1</sup></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Total Price: <?php total_cart_price();?>$</a>
      </li>
      
    </ul>
    <form class="d-flex my-2 my-lg-0" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input class="btn btn-outline-light my-2 my-sm-0" type="submit" value="search" name="search_data_product">
      </form>

  </div>
</nav>
<!--second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
   <?php
   if(!isset($_SESSION['user_username'])){
    echo "<li class='nav-item'>
    <a href='' class='nav-link'>Welcome Guest</a></li>
    ";
  }else{
    echo "<li class='nav-item'>
    <a class='nav-link'  href='#'>Welcome Mrs/M.".$_SESSION['user_username']."</a></li>";
  }

  if(!isset($_SESSION['user_username'])){
    echo "<li class='nav-item'>
    <a class='nav-link' href='./user_area/user_login.php'>Login</a></li>";

  }else{
    echo "<li class='nav-item'>
    <a class='nav-link' href='./user_area/user_logout.php'>Logout</a></li>";
  }
   ?>
  </ul>
</nav>

<!--third child-->
<div class="mg-light">
  <h3 class="text-center">hidden Store</h3>
  <p class="text-center">Communication is at the heart of e-commerce and community</p>
</div>

<!--fourth child -->
<div class="row px-1">
  <div class="col-md-10">
    <!--products -->
    <div class="row">           
      <!--fetching products-->
      <?php
      //calling function
    view_details();
    get_unique_categories();
    get_unique_brands();
      ?>

    </div>
<!--row end-->
  </div>
<!--col end-->
  <div class="col-md-2 bg-secondary p-0">
    <!-- brands to be displayyed -->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-success">
        <a href="#" class="nav-link text-light"><h4>Delivery Brands</a></h4>
      </li>
       
      <?php
      getbrands()
      ?>
    </ul>
    <!--categories to be displayed -->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-success">
        <a href="#" class="nav-link text-light"><h4>Categories</a></h4>
      </li>
      <?php
      getcategories()
      ?>
    </ul>
  </div>
</div>

 
<!--last child-->
<!--include footer-->
<?php include("./includes/footer.php")?>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>