<?php require_once('../../private/initialize.php');?>
<?php
$po_list = find_all_po();

?>
<?php require('../../private/shared/public_header.php');?>
<?php require('../../private/shared/public_navigation.php');?>

  	<div class="container">
      	<h2 class="my-3 text-center">Purchase Orders</h2>
    <table class="mx-auto table table-sm table-hover table-responsive-lg text-center" id="po_table">
    	<thead class="thead-light">
    		<tr>
    			<th>Purchase Order #</th>
    			<th>Date</th>
	    		<th>Supplier</th>
	    		<th>Store</th>
	    		<th>Status</th>
                <th>Due Date</th>
                <th>Total Cost</th>
                <th>View/Receive</th>
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
                <td><?php echo h($po['delivery_date']); ?></td>
                <td ><?php echo h($po['subtotal'] + $po['additional_cost']); ?></td>
    			<td><a class="btn btn-sm bg-transparent text-secondary"  href="<?php echo url_for('purchase_orders/view.php?id='. $po['purchase_order_id'])?>">
                    <i data-feather="eye"></i>
                </a></td>
    		</tr>
    		<?php }}else{ ?>
    			<tr><td colspan="7" align="center">No Records Found</td></tr>
    			
    		<?php }?>
    	</tbody>
    </table>
    <a class="btn btn-info text-light m-2" href="<?php echo url_for('purchase_orders/new.php')?>" >Create Purchase Order</a>
    <a class="btn btn-info text-light m-2" href="<?php echo url_for('purchase_orders/po_recon.php')?>" >P.O. Recon</a>
    </div>
<?php require('../../private/shared/public_footer.php');?>
<script type="text/javascript" src="<?php echo url_for('resources/js/populate_category.js')?>"></script>
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
    let d = new Date();
    let month = '' + (d.getMonth() + 1);
    let day = '' + d.getDate();
    let year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    let formattedDate = [year, month, day].join('/');
    let today = new Date(formattedDate);
    console.log(formattedDate);
    $('#po_table tr').each(function() {
    let due_date = $('td:nth-child(6)', this).text();
    let status = $('td:nth-child(5)', this).text();
    let due_date_arr = due_date.split("-");
    let date = new Date(due_date_arr[1]+'/'+due_date_arr[2] +'/'+due_date_arr[0]);
    console.log(date);
        if(today >=date && (status == 'Pending' || status == 'Fully Received' || status == 'Partially Received')){
            $(this).addClass("table-danger")
        }
    });
</script>