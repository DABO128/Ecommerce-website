<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();

?>
<html>
    <head>
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
        <title>
            Contact form Design
        </title>
<style>
    /*contact css */
.new{

margin: 0;
padding: 0;
text-align: center;
background-size: cover;
background-position: center;
font-family: sans-serif;
}

.contact-title
{
margin-top: 50px;
color: black;
text-transform: uppercase;
transition: all 45 ease-in-out;
}

.contact-title h1{
font-size: 32px;
line-height: 10px;
color:black; 

}

.contact-title h2{
font-size: 20px;
color:green;


}
form{
margin-top: 15px;
transition: all 4s ease-in-out;
}

.forme-control{
width: 600px;
background: black;
border: none;
outline: none ;
border-bottom: 1px solid rgb(234, 32, 32);
color: rgb(240, 240, 235);
font-size: 18px;
margin-bottom: 16px;
}

input
{
height: 45px;

}

form .submit
{
background: #08124c;
border-color: rgb(152, 36, 36);
font-size: 20px;
font-weight: bold;
letter-spacing: 2px;
height: 50px;
margin-top: 15px;

}

form .submit:hover
{
background-color: #ff4757;
cursor: pointer;
}

</style>
    </head>

    <body class="new">
          <!-- navbar-->
    <div class="contenair-fluid">
        <!--first child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
          <img src="./images/elogo.png" alt="" class="logo">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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

        
        <div class="contact-title">
            <h1>Say Hello </h1> <br>
            <h2>We are always ready to serve you</h2> <br>
            <div class="contac-form">
                <form  id ="contact-form" method="POST" action="contact.php">
                    <input name ="name" type="text" class="forme-control" placeholder="Your Name" required> <br>
                    <input name ="email" type="email" class="forme-control" placeholder="Your Email" required> <br>
                    <textarea name="message" class="forme-control" placeholder="Message"  row="4" required ></textarea> <br>
                    <input type="submit" class="forme-control submit" value="SEND MESSAGE">

                </form>
            </div>
        </div>
        
    </body>
    
</html>
<?php include("./includes/footer.php") ?>