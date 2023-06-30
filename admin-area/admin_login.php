<?php
 include('../includes/connect.php');
include('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
     <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
    <!--font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            overflow-x:hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin admin_login</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/registration.png" alt="Admin Login" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="admin_name" class="form-label">Username</label>
                        <input type="text" id="admin_name" name="admin_name" placeholder="Enter your Username" required="required" class="form-control">
                    </div>
                    
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="text" id="admin_password" name="admin_password" placeholder="Enter your Password" required="required" class="form-control">
                    </div>
                    
                    <div>
                        <input type="submit" class="bg-success py-2 px-3 border-0" name="admin_login" value="Login">
                        <p class="small fw-bold mt-2 pt-1">Don't you have an account?<a href="admin_registration.php" class="text-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php include("../includes/footer.php")?>
<?php
if(isset($_POST['admin_login'])){
    $admin_name=$_POST['admin_name'];
    $admin_password=$_POST['admin_password'];
    $select_query="Select * from `admin_table` where admin_name='$admin_name'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);

if($row_count>0){
    $_SESSION['admin_name']=$admin_name;
    //if(password_verify($admin_password['admin_password'])){
        if($admin_password!=$confirm_password){
        if($row_count==1){
            $_SESSION['admin_name']=$admin_name;
            echo "<script>alert('Login successful')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }else{
        echo "<script>alert('Invalid admin Name or password')</script>";
    }

}
}
?>