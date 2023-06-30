<?php include('../includes/connect.php');
include('../functions/common_function.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">   
</head>
<style>
    .payment_img{
        width:90%;
        margin:auto;
        display: block;
    }
</style>
<body>
<!-- navbar-->
<div class="contenair-fluid">
        <!--first child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
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
        <a class="nav-link" href="./user_area/contact_form.php">Contact</a>
      </li>
      <li class="nav-item">
        
        <a class="nav-link" href="cart.php "><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item();?></sup></a>
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




    <!--php code to access user id--->
    <?php
    $user_ip=getIPAddress();
    $get_user="Select * from `user_table` where user_ip='$user_ip'";
    $result =mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];
    ?>
<div class="container">
    <h2 class="text-center text-success">Payment options</h2>
    <div class="row d-flex justify-content-center align-items-center my-5">
        <div class="col-md-6">
        <a href="https://www.papara.com" target="_blank"><img src="../images/papara.png" alt="" class="payment_img"></a>
    </div>
    <div class="col-md-6">
        <a href="order.php?user_id=<?php echo $user_id ?>" class="text-center"><h2>Pay offline</h2></a>
    </div>
</div>
</div>
<?php include("../includes/footer.php")?>

</body>
</html>