<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['user_username'] ?></title>
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
    <link rel="stylesheet" href="../style.css" class="">
</head>
<style>
    body{
        overflow-x: hidden;
    }

    ul li {
  list-style: none;
}

</style>
<style>
    .profile-img{
    width: 90%;
    margin:auto;
    height: 90%;
    display: block;
    object-fit:contain;
}


</style>
<body>


<!--calling function-->
<?php
      cart();
?>
    <!-- navbar-->
    <div class="contenair-fluid p-0">
        <!--first child-->
  <nav class="navbar navbar-expand-lg navbar-light bg-success">
  <div class="container-fluid">
  <img src="../images/elogo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../display_all.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">My Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact_form.php">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../cart.php "><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item();?></sup></a>
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
        <a class='nav-link'  href='#'> Welcome ".$_SESSION['user_username']."</a></li>";
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
<div class="row">
    <div class="col-md-2">
        <ul class="navba-nav bg-secondary text-center" style="height:100vh">
        <li class="nav-item bg-success">
        <a class="nav-link text-light " href="#"><h4>Your profile</h4></a>
      </li>

      <?php
      $user_username=$_SESSION['user_username'];
      $user_image="Select * from `user_table` where user_username='$user_username'";
      $user_image=mysqli_query($con,$user_image);
      $row_image=mysqli_fetch_array($user_image);
      $user_image=$row_image['user_image'];
      echo "<li class='nav-item'>
      <img src='./user_images/$user_image' class='profile-img my-0' alt=''>
      </li>";
      ?>
      
      <li class="nav-item ">
        <a class="nav-link text-light" href="profile.php">Pending Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="logout.php?">Logout</a>
      </li>
        </ul>
    </div>
    <div class="col-md-10">
      <?php get_user_order_details();
      if(isset($_GET['edit_account'])){
        include('edit_account.php');
        }
        if(isset($_GET['my_orders'])){
          include('user_orders.php');
          }
          if(isset($_GET['delete_account'])){
            include('delete_account.php');
            }
          ?>
        
      
    </div>
    </div>
   
<!--last child-->
<!--include footer-->
<?php include("../includes/footer.php")?>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>