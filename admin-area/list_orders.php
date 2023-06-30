<?php
include('../includes/connect.php');
?>

<h3 class="text-center text-info">All orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-success">
       <?php
$get_orders= "Select * from `users_order`";
$result=mysqli_query($con,$get_orders);
$row_count=mysqli_num_rows($result);

if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'>No Orders yet</h2>";
}else{
    echo " <tr>
<th>S1 no</th>
<th>Due Amount</th>
<th>Invoice number</th>
<th>Total products</th>
<th>Order Date</th>
<th>Status</th>
<th>Delete</th>
</tr>
</thead>
<tbody class='bg-secondary text-light'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $order_id=$row_data['order_id'];
        $user_id=$row_data['user_id'];
        $amount_due=$row_data['amount_due'];
        $invoice_number=$row_data['invoice_number'];
        $total_products=$row_data['total_products'];
        $order_date=$row_data['order_date'];
        $order_status=$row_data['order_status'];
        $number++;
        echo"<tr>
        <td>$number</td>
        <td>$amount_due</td>
        <td>$invoice_number</td>
        <td>$total_products</td>
        <td>$order_date</td>
        <td>$order_status</td>
        <td><a href='index.php?delete_order=$order_id'class='text-light'><i class='fa-solid fa-trash'></i></a></td>
    </tr>";
    }
}
?>
        
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