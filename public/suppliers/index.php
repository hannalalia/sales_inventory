<?php require_once('../../private/initialize.php');?>
<?php 

$supplier_list = find_all_suppliers();

?>
<?php include('../../private/shared/public_header.php');?>
<?php include('../../private/shared/public_navigation.php');?>
<style type="text/css">
    tr,td,th{
    text-align: center !important;
}
</style>
  <body>
  	<div class="container mb-3">
          <?php  echo display_session_errors(); ?>
          <?php echo display_session_message(); get_and_clear_session_errors();  ?>
        <h2 class="my-3 text-center" id="title">List of Suppliers</h2>
    <table class="mx-auto table table-sm table-hover table-responsive-lg" id="printTable">
    	<thead class="thead-light">
    		<tr>
    			<th>#</th>
    			<th>Company Name</th>
	    		<th>Address</th>
	    		<th>Contact Number</th>
	    		<th>Email</th>
	    		<th class="notPrintable">Edit</th>
	    		<th class="notPrintable">Delete</th>
    		</tr>
    		
    	</thead>
    	<tbody>
    	    <?php if (mysqli_num_rows($supplier_list)>0){

    	    	while($supplier = mysqli_fetch_assoc($supplier_list)) { ?>
    		<tr>
    			<td><?php echo h($supplier['Id']); ?></td>
    			<td><?php echo h($supplier['CompanyName']); ?></td>
    			<td><?php echo h($supplier['Address']); ?></td>
    			<td><?php echo h($supplier['ContactNumber']); ?></td>
    			<td><?php echo h($supplier['Email']); ?></td>
	    		<td class="notPrintable"><a class="btn btn-sm bg-transparent text-danger editSupplier" data-target="#editSupplierModal" data-id="<?php echo $supplier['Id']?>"><i data-feather="edit" width="22" heigth="22" ></i></a></td>
    			<td class="notPrintable"><a class="btn btn-sm bg-transparent text-danger deleteSupplier" data-target="#deleteSupplierModal"><i data-feather="trash-2"></i></a></td>
    		</tr>
    		<?php }}else{ ?>
    			<tr class="notPrintable"><td colspan="7" align="center">No Records Found</td></tr>
    			
    		<?php }?>
    	</tbody>
    </table>
    <a class="btn btn-info text-light m-2" data-toggle="modal" data-target="#newSupplierModal">New Supplier</a>
    <button id="printBtn" class="btn btn-info m-2">Print</button>

    <!-- New Supplier Modal -->	
    <?php include('new.php');?>
	<!-- Edit Supplier Modal -->
	<?php include('edit.php');?>	
	<!-- Delete Supplier Modal -->
	<?php include('delete.php');?>	
    </div>
<?php  get_and_clear_session_message()?>
<?php include('../../private/shared/public_footer.php');?>
<script type="text/javascript" src="<?php echo url_for('resources/js/populate_supplier.js')?>"></script>
<script type="text/javascript" src="<?php echo url_for('resources/js/print.js')?>">
</script>
<script >
$(document).ready( function () {
    let row = $('#printTable tr').length;
    if(row>0){
        $('#printTable').DataTable({
            "order": [1,"asc"],
            "columnDefs": [{
                "targets": [2,3,4,5,6],
                 "orderable":false
            }]
        });
    }
});
</script>
