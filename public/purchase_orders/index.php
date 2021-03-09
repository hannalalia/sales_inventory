<?php require_once('../../private/initialize.php');?>
<?php
//$supplier_list= find_all_suppliers();


//if(!isset($_POST['searchBtn']) && empty($_POST['categorySearch'])){
    //$category_list = find_all_categories();
// }else{
//     $category_list = find_all_categories($_POST['categorySearch']);
// }

// $category_name_list = find_all_category_name();
// $store_list=find_all_stores();
$po_list = find_all_po();

?>
<?php require('../../private/shared/public_header.php');?>
<?php require('../../private/shared/public_navigation.php');?>

  	<div class="container">
 
     	<?php  echo display_session_errors(); ?>
        <?php echo display_session_message(); get_and_clear_session_errors();  ?>
      	<h2 class="my-3 text-center">Purchase Orders</h2>
      <!--  <form method="post" class="col-sm-5 col-12 my-3">
            <div class="form-group row">
            <label for="status" class="col-sm-3 col-form-label">Status: </label>
            <select name="status" id="" class="form-control col-sm-6">
                <option value="All">All</option>
                <option value="">Pending</option>
                <option value="">Partially Received</option>
                <option value="">Fully Received</option>
            </select>
            </div>
            <div class="form-group row">
            <label for="supplier" class="col-sm-3 col-form-label">Supplier: </label>
            <select name="supplier" id="" class="form-control col-sm-6">
                <option value="All">All</option>
                <?php// if (mysqli_num_rows($supplier_list)>0){
                     //while($supplier= mysqli_fetch_assoc($supplier_list)) { ?>
                        <option ><?php //echo h($supplier['CompanyName']);?></option>
                <?php //}}?>
            </select>
            </div>
             <div class="form-group row">
            <label for="store" class="col-sm-3 col-form-label">Stores: </label>
            <select name="store" id="" class="form-control col-sm-6">
                <option value="All">All</option>
                <?php //if (mysqli_num_rows($store_list)>0){
                     //while($store= mysqli_fetch_assoc($store_list)) { ?>
                        <option value="<?php //echo h($store['Id']); ?>"><?php //echo h($store['Name']);?></option>
                <?php //}}?>
            </select>
            </div>
        </form> -->

    <table class="mx-auto table table-sm table-hover table-responsive-md text-center" id="po_table">
    	<thead class="thead-light">
    		<tr>
    			<th>Purchase Order #</th>
    			<th>Date</th>
	    		<th>Supplier</th>
	    		<th>Store</th>
	    		<th>Status</th>
                <th>Expected On</th>
                <th>Total Cost</th>
                <th>View</th>
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
                <td ><?php echo h($po['subtotal']); ?></td>
    			<td><a class="btn btn-sm bg-transparent text-secondary"  href="<?php echo url_for('purchase_orders/view.php?id='. $po['purchase_order_id'])?>">
                    <i data-feather="eye"></i>
                </a></td>
    		</tr>
    		<?php }}else{ ?>
    			<tr><td colspan="7" align="center">No Records Found</td></tr>
    			
    		<?php }?>
    	</tbody>
    </table>
    <a class="btn btn-primary text-light m-2" href="<?php echo url_for('purchase_orders/new.php')?>" >Create Purchase Order</a>
    </div>
<?php  get_and_clear_session_message();?>
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