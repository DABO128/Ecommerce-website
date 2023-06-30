<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status='true';


    //accessing images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    //accessing image tmp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    //checking empty condition
    if($product_title=='' and $description=='' and $product_keywords==''
    and $product_brands=='' and $product_category=='' and $product_price=='' and $product_image1==''
    and $product_image2=='' and $product_image3==''){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        //insert query
        $insert_products="insert into `products`(product_title,product_description,
        product_keywords,category_id,brand_id,product_image1,product_image2,
        product_image3,product_price,date,status) values ('$product_title','$description',
        '$product_keywords','$product_brands','$product_category','$product_image1',
        '$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('Successfully inserted the products')</script>";

        }


    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert product- Admim dashboard</title>
    <!--bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--css file-->
<link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container">
        <h1 class="text-center">Insert Products </h1>
            <!--form -->
            <form action="" method="post" enctype="multipart/form-data">

            <!--title-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_title" class="form-label">Product title</label>
                    <input type="text" name="product_title" id="product_title" 
                    class="form-control" placeholder="Enter product title" 
                    autocomplete="off" required="required">
                </div>
                <!--description-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="description" class="form-label">Product description</label>
                    <input type="text" name="description" id="description" 
                    class="form-control" placeholder="Enter product description" 
                    autocomplete="off" required="required">
                </div>
                 <!--keywords-->
                 <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_keywords" class="form-label">Product keywords</label>
                    <input type="text" name="product_keywords" id="product_keywords" 
                    class="form-control" placeholder="Enter product keywords" 
                    autocomplete="off" required="required">
                </div>
                <br>
                    <!--categories-->
                    <div class="form-outline mb-4 w-50 m-auto">
                    <select name="product_category" id="" class="form-control">
                    <option value="">Select a category</option>
                    <?php
                    $select_query="Select * from `categories`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $category_title=$row['category_title'];   
                        $category_id=$row['category_id'];
                        echo "<option value ='$category_id'>$category_title</option>";
                    
                    }
                    ?>
                    
                </select>
                </div>
                <br>
                <!--Brands-->
               <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-control">
                    <option value="">select a Brands</option>
                    <?php
                    $select_query="Select * from `brands`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $brand_title=$row['brand_title'];   
                        $brand_id=$row['brand_id'];
                        echo "<option value ='$brand_id'>$brand_title</option>";
                    
                    }
                    ?>
                </select>
                </div>

                 <!--Image1-->
                 <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image1" class="form-label">Product image 1</label>
                    <input type="file" name="product_image1" id="product_image1" 
                    class="form-control"  required="required">
                </div>

                <!--Image2-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image2" class="form-label">Product image 2</label>
                    <input type="file" name="product_image2" id="product_image2" 
                    class="form-control"  required="required">
                </div>
                <!--Image3-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image3" class="form-label">Product image 3</label>
                    <input type="file" name="product_image3" id="product_image3" 
                    class="form-control"  required="required">
                </div>
                <!--price-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_price" class="form-label">Product price</label>
                    <input type="text" name="product_price" id="product_price" 
                    class="form-control" placeholder="Enter product price" 
                    autocomplete="off" required="required">
                </div>

                <br>

                <!--insert product-->
                <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-success"
                value="Insert Product"> 
                </div>

                
                
            </form>
    </div>
    
</body>
</html>