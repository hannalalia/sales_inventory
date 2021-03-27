<?php require_once('../../private/initialize.php');?>
<?php
 $id = $_GET['id'];
 $po = find_po_by_id($id);
 $product_list = find_products_by_po_id($id);
 $qty_sum_arr = sums($id);
 $date_received =date('Y-m-d');



if(isset($_POST['closePo'])){
  $actualPoTotal = $qty_sum_arr['sumActualAmount'] + $po['additional_cost'];
  $supplierTotal = $_POST['supplierTotal'] ?? '';
  update_po_status_on_close($id,$actualPoTotal,$supplierTotal,$date_received);
}
if($po['status']!=='Closed' && !isset($_POST['closePo'])){
  if($qty_sum_arr['sumQtyReceived']>0 && $qty_sum_arr['sumQtyReceived'] == $qty_sum_arr['sumQty']){
    update_po_status_received_on($id,'Fully Received',$date_received);
  }elseif($qty_sum_arr['sumQtyReceived']>0 && $qty_sum_arr['sumQtyReceived'] != $qty_sum_arr['sumQty']) {
    update_po_status_received_on($id,'Partially Received');
  }else{
    update_po_status_received_on($id,'Pending');
  }
}

if(isset($_POST['received'])) {
  $product = [];
  $product['product_code'] = $_POST['pcode'] ?? '';
  $product['quantity'] =(int)$_POST['quantity'] ?? '';
  $product['po_id'] = $id;

  $result = update_items_in_po($product);
  if($result === true) {
    $_SESSION['message'] = 'Item(s) Received: '. $product['quantity'];
    redirect_to(url_for('/purchase_orders/view.php?id='."$id"));
  } else {
    $errors = $result;
     $output = '';
      $output .= "Failed to update purchase order:";
      foreach($errors as $error) {
        $output .= " " . h($error);
      }
     $_SESSION['errors'] = $output;
      redirect_to(url_for('/purchase_orders/view.php?id='."$id"));
  }
}


 
?>
<?php require('../../private/shared/public_header.php');?>
<?php require('../../private/shared/public_navigation.php');?>
<div class="container">
  <p class="my-3 col-sm-7 col-12 text-sm-left text-center"><a  class="text-secondary"href="<?php echo url_for('purchase_orders/index.php')?>">Purchase Orders</a> \ View Purchase Orders</p>
  <h2 class="my-3 col-sm-7 col-12 text-sm-left text-center">View Purchase Orders</h2>
    <?php  echo display_session_errors(); ?>
  <?php echo display_session_message(); get_and_clear_session_errors();  ?>
  <div>
  	<p>Purchase Order #: <?php echo $po['purchase_order_id']?></p>
  </div>
  <div>
  	<p>Order Date: <?php echo $po['order_date']?></p>
  </div>
   <div>
    <p>Due Date: <?php echo $po['delivery_date']?></p>
  </div>
  <div>
  	<p>Supplier: <?php $supplier = find_supplier_by_id($po['supplier_id']);
                 echo $supplier['CompanyName']?>
                      
    </p>
  </div>
  <div>
  	<p>Store: <?php  $store = find_store_by_id($po['store_id']);
                     echo $store['Name'];?></p>
  </div>
    <div>
    <p>Additional Costs: <?php echo $po['additional_cost'];?></p>
  </div>

 <table class="mx-auto table table-sm table-hover table-responsive-md">
    <thead class="thead-light">
        <tr>
         <!--  <th>Product Code</th> -->
          <th>Item Name</th>
          <th>Purchase Cost</th>
          <th>Quantity</th>
          <th>Amount</th>
          <th>Qty Received</th>
          <th></th>
        </tr>
    </thead>
    <tbody>
    <?php if (mysqli_num_rows($product_list)>0){
     while($product = mysqli_fetch_assoc($product_list)) { ?>
    	<tr>
        <!-- <td><?php //echo h($product['product_code']); ?></td> -->
        <td><?php //echo h($product['product_code']); 
        $item = find_product_by_pcode($product['product_code']);
        echo $item['ItemName'];

        ?></td>
        <td><?php echo h($product['cost']); ?></td>
        <td class="dbQty"><?php echo h($product['quantity']); ?></td>
        <td><?php echo h($product['amount']); ?></td>
        <td class="dbQtyReceived"><?php echo h($product['received']); ?></td>     
    		<td><?php if($po['status'] !== 'Closed'){  ?><button class="btn btn-sm btn-info receiveBtn" data-product="<?php echo  $product['product_code'] .",". $product['cost'].",". $product['quantity'].",". $product['amount'] . "," . $product['received'];?>">Receive</button><?php }?></td>
        
    	</tr>
    <?php }}?>
    </tbody>
  </table>
  <?php if($po['status'] !== 'Closed'){  ?>
  <button class="btn btn-info mb-3" id="closePoBtn">Close Purchase Order</button>
  <?php }?>
<!-- Receiving Item Modal-->
<div class="modal fade" id="receiveItem">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Receive Item: <span id="name"></span></h5>
        <button type="button" class="close" data-dismiss="modal">
          <span >&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <input name="pcode" type="hidden" id="product_code">
            <input name="cost" type="hidden" id="cost">
            <label for="Quantity">Quantity Received: <span id="receivedQty"></span></label>
             <input type="range" class="form-range w-100" name="quantity" id="Quantity">
          </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" name="received" class="btn btn-info" value="Update">  
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Closing Purchase order modal -->
<div class="modal fade" id="closePoModal">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Close Purchase Order<span id="name"></span></h5>
        <button type="button" class="close" data-dismiss="modal">
          <span >&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
           <dl>
             <dt class="h6">Purchase Order Total (Received): </dt>
             <dd id="actualPoTotal"><?php echo  $qty_sum_arr['sumActualAmount'] + $po['additional_cost']?></dd>
           </dl>
          <div class="form-group">
            <label class="h6"for="supplierTotal">Supplier Invoice Total: </label>
            <input type="text" class="form-control" name="supplierTotal">
          </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" name="closePo" class="btn btn-info" value="Update" id="closePo">  
      </div>
      </form>
    </div>
</div>
</div>
<?php  get_and_clear_session_message();?>
<?php require('../../private/shared/public_footer.php');?>
</body>
<script type="text/javascript">
   $(function () {
 
        $('.dbQtyReceived').each( function(){
          let qty = $(this).siblings('.dbQty').text().trim();
          if($(this).text().trim()== qty ){
             $(this).siblings(':last').replaceWith("<span class='btn btn-sm btn-secondary'>Complete</span>");
        }
        });

        $(".receiveBtn").on('click',function () {
            let productRaw = $(this).data('product').replace('/[\[\]/','');
            let product = productRaw.split(',');
            let id = product[0];
            let cost = product[1];
            let maxQty =  product[2] - product[4]; 
            $(".modal-body #product_code").val(id);
            $(".modal-body #cost").val(cost);
            $('#receiveItem').modal('show');
            $('#name').text( product[0]);
            $('#Quantity').attr('min' , 0);
            $('#Quantity').attr('max', maxQty);
            $('#Quantity').attr('value', 0);
        })
        $("#closePoBtn").on('click',function () {
            $("#closePoModal").modal('show');
        })

        $('#Quantity').on('change',function(){
          $('#receivedQty').text($(this).val())

        })
        
    });


</script>