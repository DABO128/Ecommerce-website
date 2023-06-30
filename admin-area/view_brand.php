<h3 class="text-center text-sinfo">All Brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-success">
        <tr class="text-center">
            <th>S1no</th>
            <th>Brand Title </th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody class="bg-secondary text-light">
        <?php
        $select_cart="Select * from `brands`";
        $result=mysqli_query($con,$select_cart);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $brand_id=$row['brand_id'];
            $brand_title=$row['brand_title'];
            $number++;
            ?>
       
        <tr class="text-center">
            <td><?php echo $number;?></td>
            <td><?php echo $brand_title;?></td>
            <td><a href='index.php?edit_brand=<?php echo $brand_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_brand=<?php echo $brand_id?>' type ="button" class='text-light' data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='fa-solid fa-trash'></i></td>
        </tr>
        <?php 
        }?>
    </tbody>
  
</table>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
   <h4>Are you sure that you want to delete this ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="./index.php?view_brands" class='text-light text-decoration-none'>No</a></button>
        <button type="button" class="btn btn-success"><a href='index.php?delete_brand=<?php echo $brand_id?>'class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>