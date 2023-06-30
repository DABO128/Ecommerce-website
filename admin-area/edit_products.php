<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    //echo $edit_id;
    $get_data="Select * from `products` where product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
   // echo $product_title;
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];

    //fetching category name
    
    //echo $category_title;

      /*fetching category name
      $select_brand="Select * from `brands` where brand_id=$brand_id";
      $result_brand=mysqli_query($con,$select_brand);
      $row_brand=mysqli_fetch_assoc($result_brand);
      $brand_title=$row_brand['brand_title'];*/
      //echo $brand_title;
    
}
?>
<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto ">
            <label for="product_title" class="form-label">Products Title</label>
            <input type="text" id="product_title" value =<?php echo $product_title?> name="product_title" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto">
            <label for="product_desc" class="form-label">Products Description</label>
            <input type="text" id="product_desc" value =<?php echo $product_description?> name="product_desc" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto">
            <label for="product_keywords" class="form-label">Products Keywords</label>
            <input type="text" id="product_keywords" value =<?php echo $product_keywords?> name="product_keywords" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto"><br>
        <label for="products_category" class="form-label">Products Categories</label>
            <select name="products_category" class="form-select">
           <!-- <option selected>Open this select menu</option>-->
                <?php
$select_category_all ="Select * from `categories`";
$result_category_all=mysqli_query($con,$select_category_all);
while($row_category_all=mysqli_fetch_assoc($result_category_all)){
    $category_title=$row_category_all['category_title'];
    $category_id=$row_category_all['category_id'];
echo " <option value ='$category_id'>$category_title</option>";             
};
?>
                
            </select>
            </div>
            <div class="form-outline w-50 m-auto"><br>
            <label for="product_brands" class="form-label">Products Brands </label>
            <select name="product_brands" class="form-select">
            <!--<option selected>Open this select menu</option>-->
           <?php
            
$select_brand_all ="Select * from `brands`";
$result_brand_all=mysqli_query($con,$select_brand_all);
while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
    $brand_title=$row_brand_all['brand_title'];
    $brand_id=$row_brand_all['brand_id'];
echo " <option value ='$brand_id'>$brand_title</option>";             
};
?>
            </select>
        </div> 
        <div class="form-outline w-50 m-auto mb-4"><br>
            <label for="product_image1" class="form-label">Products Image1</label>
            <div class="d-flex">
            <input type="file" id="product_image1" name="product_image1" class="form-control" required="required">
            <img src="./product_images/<?php echo $product_image1?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4"><br>
            <label for="product_image2" class="form-label">Products Image2</label>
            <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control" required="required">
            <img src="./product_images/<?php echo $product_image2?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4"><br>
            <label for="product_image3" class="form-label">Products Image3</label>
            <div class="d-flex">
            <input type="file" id="product_image3"  name="product_image3" class="form-control" required="required">
            <img src="./product_images/<?php echo $product_image3?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto">
            <label for="product_price" class="form-label">Products Price</label>
            <input type="text" id="product_price"  value =<?php echo $product_price?> name="product_price" class="form-control" required="required">
        </div>
        <div class="w-50 m-auto  md-5"><br>
            <input type="submit" name= "edit_product" value="Update product" class="btn btn-success px-3 mb-3">
        </div>
    </form>
</div>

<!--editing products-->
<?php
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_desc=$_POST['product_desc'];
    $product_keywords=$_POST['product_keywords'];
    $products_category=$_POST['products_category'];
    $product_price=$_POST['product_price'];
    $product_brands=$_POST['product_brands'];

    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];


    //checking to fields empty or not
    if($product_title=='' or $product_desc=='' or $product_keywords==''
        or $product_brands=='' or $product_title=='' or $products_category==''
        or $product_image1=='' or $product_image2=='' or $product_image3==''){
            echo "<script>('Please fill all the fields and continue the process')</script>";
        }else{
            move_uploaded_file($temp_image1,"./product_images/$product_image1");
            move_uploaded_file($temp_image2,"./product_images/$product_image2");
            move_uploaded_file($temp_image3,"./product_images/$product_image3");

            //query to update products
            $update_product="update  `products` set product_title='$product_title',
            product_description='$product_desc', product_keywords='$product_keywords',
            product_price='$product_price',product_image1='$product_image1',brand_id='$product_brands',category_id='$products_category',
            product_image2='$product_image2',product_image3='$product_image3',date=NOW()
            where product_id =$edit_id";
            $result_update=mysqli_query($con,$update_product);
            if($result_update){
                echo "<script>alert('Product updated successfully')</script>";
                echo "<script>window.open('./insert_product.php','_self')</script>";

            }
        }

   
}
?>