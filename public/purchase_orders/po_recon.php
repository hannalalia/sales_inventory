<?php require_once('../../private/initialize.php');?>
<?php
$po_list = find_po_status_closed();
?>
<?php require('../../private/shared/public_header.php');?>
<?php require('../../private/shared/public_navigation.php');?>
<div class="container">
      	<h2 class="my-3 text-center">Purchase Order Reconciliation</h2>
        <?php  echo display_session_errors(); ?>
          <?php echo display_session_message(); get_and_clear_session_errors();  ?>
     <table class="mx-auto table table-sm table-hover table-responsive text-center" id="po_table">
    	<thead class="thead-light">
    		<tr>
    			<th>Purchase Order #</th>
    			<th>Purchase Date</th>
	    		<th>Supplier Name</th>
	    		<th>Store</th>
	    		<th>Status</th>
                <th>Received On</th>
                <th>Actual P.O. Total</th>
                <th>Additional Cost (Before)</th>
                <th>Supplier Invoice Total</th>
                <!-- <th>Action</th> -->
                <th>Create Invoice</th>
                <th>Add to History</th>
    		</tr>
    		
    	</thead>
    	<tbody>
    	    <?php if (mysqli_num_rows($po_list)>0){

    	    	while($po = mysqli_fetch_assoc($po_list)) { ?>
    		<tr>

    			<td><?php echo h($po['purchase_order_id']); ?></td>
                <td><?php echo h($po['order_date']); ?></td>
                <td><?php $supplier = find_supplier_by_id($po['supplier_id']);
                 echo $supplier['CompanyName'];

                ?></td>
                <td><?php $store = find_store_by_id($po['store_id']);
                     echo $store['Name'];?></td>
                <td><?php echo h($po['status']); ?></td>
                <td><?php echo h($po['received_on']); ?></td>
                <td><?php echo h($po['actual_po_total']);?></td>
                <td><?php echo h($po['additional_cost']);?></td>
                <td><?php echo h($po['supplier_total']);?></td>
                <!-- <td><a class="btn btn-sm bg-info text-light" data-target="#">Backorder</a></td> -->
    			<td><a class="btn btn-sm btn-info"  href="<?php echo url_for('purchase_orders/create_invoice.php?id='. $po['purchase_order_id'])?>">
                    Invoice
                </a></td>
                <td><a class="btn btn-sm btn-info text-light poHistory" data-target="#addToHistoryModal" data-po="<?php echo htmlspecialchars(json_encode($po), ENT_QUOTES, 'UTF-8'); ?>">
                    Add
                </a></td>

    		</tr>
    		<?php }}else{ ?>
    			<tr><td colspan="11" align="center">No Records Found</td></tr>
    			
    		<?php }?>
    	</tbody>
    </table>
    <a class="btn btn-info text-light m-2" href="<?php echo url_for('purchase_orders/index.php')?>" >Back</a>
     <!-- <button id="printBtn" class="btn btn-info">Print</button> -->

     <!-- Add to History Modal -->
     <div class="modal fade" id="addToHistoryModal">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Confirm add to history</h5>
            <button type="button" class="close" data-dismiss="modal">
              <span >&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="h6 text-center text-danger">Adding to Purchase Order History will delete the product details associated with this purchase order.</p>
          <form method="POST">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="Submit" id="addToHistoryBtn" class="btn btn-info">Add</button>
          </div>
          </form>
        </div>
      </div>
    </div>

</div><!--Closing div for container class-->
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<?php require('../../private/shared/public_footer.php');?>

<script >
$(document).ready( function () {
    let row = $('#po_tablee tr').length;
    if(row>0){
        $('#po_table').DataTable({
            "order": [1,"desc"],
            "columnDefs": [{
                "targets": [0,4,7],
                 "orderable":false
            },{
                "targets": [6,7,8],
                "searchable":false
            }]
        });
        $('#po_table_filter :input').attr("placeholder","P.O.#/Supplier/Date/Store");
    }
});

</script>
<script>
    $('#po_table tr').each(function() {
    let actual_po_total = $('td:nth-child(7)', this).text();
    let supplier_total = $('td:nth-child(9)', this).text();
    let supplierLiability = supplier_total-actual_po_total;
        if(supplierLiability!==0){
            $(this).addClass("table-danger")
        }
    });
</script>
<script>
    $(".poHistory").on('click',function(){
        $('#addToHistoryModal').modal('show');
            let po = $(this).data('po');
            $('#addToHistoryBtn').on('click',function(e){
                e.preventDefault();
                $.ajax({
                type: "POST",
                data: po,
                url: "po_history.php"           
                }).done(function(data){
                    location.reload();
                });
            })
             
        });
</script>
