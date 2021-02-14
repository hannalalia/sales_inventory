<?php require_once('../../private/initialize.php');?>
<?php $supplier_list = find_all_suppliers();$company_name_list = find_all_company_name();
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
   <div class="row mx-1">      
          <?php  echo display_session_errors(); ?>
          <?php echo display_session_message(); get_and_clear_session_errors();  ?>
        <h2 class="my-3 col-sm-7 col-12 text-sm-left text-center" id="title">List of Suppliers</h2>
        <form method="post" class="col-sm-5 col-12 my-3">
            <div class="row">
            <input class="form-control col-sm-9 col-10" type="search" name="supplierSearch" placeholder="Company Name" list="companies">
            <datalist id="companies">
            <?php if (mysqli_num_rows($company_name_list)>0){
            while($companyName= mysqli_fetch_assoc($company_name_list)) { ?>
                <option><?php echo h($companyName['CompanyName']);?></option>
            <?php }}?>
            </datalist>
            <input class="btn btn-primary btn-sm col-sm-3 col-2" type="submit" name="searchBtn" value="Search">
            </div>
        </form>
    </div>
    <table class="mx-auto table table-sm table-hover table-responsive-sm" id="printTable">
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
    <a class="btn btn-primary text-light" data-toggle="modal" data-target="#newSupplierModal">New Supplier</a>
    <button id="printBtn" class="btn btn-primary">Print</button>

    <!-- New Supplier Modal -->	
    <?php include('new.php');?>
	<!-- Edit Supplier Modal -->
	<?php include('edit.php');?>	
	<!-- Delete Supplier Modal -->
	<?php include('delete.php');?>	
    </div>
 </body>
<?php  get_and_clear_session_message()?>
<?php include('../../private/shared/public_footer.php');?>
<script type="text/javascript" src="<?php echo url_for('resources/js/populate_supplier.js')?>"></script>
<script type="text/javascript" src="<?php echo url_for('resources/js/print.js')?>">
</script>
</html>