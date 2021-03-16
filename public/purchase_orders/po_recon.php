<?php require_once('../../private/initialize.php');?>
<?php
$po_list = find_po_status_closed();
?>
<?php require('../../private/shared/public_header.php');?>
<?php require('../../private/shared/public_navigation.php');?>
<div class="container">
      	<h2 class="my-3 text-center">Purchase Order Reconcillation</h2>
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
                <th>Adjust Supplier Total</th>
                <th>Create Invoice</th>
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
                <td><?php  echo h($po['status']); ?></td>
                <td><?php  echo h($po['received_on']); ?></td>
                <td><?php echo h($po['actual_po_total']);?></td>
                <td><?php echo h($po['additional_cost']);?></td>
                <td><?php  echo h($po['supplier_total']);?></td>
                <td><a class="btn btn-sm bg-transparent text-danger" data-target="#"><i data-feather="edit" width="22" heigth="22" ></i></a></td>
    			<td><a class="btn btn-sm btn-info"  href="<?php echo url_for('purchase_orders/create_invoice.php?id='. $po['purchase_order_id'])?>">
                    Invoice
                </a></td>
    		</tr>
    		<?php }}else{ ?>
    			<tr><td colspan="7" align="center">No Records Found</td></tr>
    			
    		<?php }?>
    	</tbody>
    </table>
    <a class="btn btn-info text-light m-2" href="<?php echo url_for('purchase_orders/index.php')?>" >Back</a>
     <!-- <button id="printBtn" class="btn btn-info">Print</button> -->
</div>
<?php require('../../private/shared/public_footer.php');?>
<script type="text/javascript" src="<?php echo url_for('resources/js/print.js')?>">
</script>
<script >
$(document).ready( function () {
    $('#po_table').DataTable({
        "order": [1,"desc"],
        "columnDefs": [{
            "targets": [0,4,7],
             "orderable":false
        },{
            "targets": [6],
            "searchable":false
        }]
    });
} );
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
