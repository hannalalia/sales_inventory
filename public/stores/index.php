<?php require_once('../../private/initialize.php');?>
<?php 

//if(!isset($_POST['searchBtn']) && empty($_POST['storeSearch'])){
    $store_list = find_all_stores();
// }else{
//     $store_list = find_all_stores($_POST['storeSearch']);
// }

// $store_name_list = find_all_store_name();


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
   <!-- <div class="row mx-1">       -->
          <?php  echo display_session_errors(); ?>
          <?php echo display_session_message(); get_and_clear_session_errors();  ?>
        <h2 class="my-3 text-center" id="title">List of Stores</h2>
        <!-- <form method="post" class="col-sm-5 col-12 my-3">
            <div class="row">
            <input class="form-control col-sm-9 col-10" type="search" name="storeSearch" placeholder="Name of Store" list="stores">
            <datalist id="stores">
            <?php //if (mysqli_num_rows($store_name_list)>0){
            //while($store= mysqli_fetch_assoc($store_name_list)) { ?>
                <option><?php //echo h($store['Name']);?></option>
            <?php //}}?>
            </datalist>
            <input class="btn btn-primary btn-sm col-sm-3 col-2" type="submit" name="searchBtn" value="Search">
            </div>
        </form> -->
    <!-- </div> -->
    <table class="mx-auto table table-sm table-hover table-responsive-sm" id="printTable">
    	<thead class="thead-light">
    		<tr>
                <th class="d-none notPrintable"></th>
    			<th>Name</th>
	    		<th>Address</th>
	    		<th>Contact Number</th>
                <th>Daily Sale</th>
                <th>Number of Employees</th>
	    		<th class="notPrintable">Edit</th>
	    		<th class="notPrintable">Delete</th>
    		</tr>
    		
    	</thead>
    	<tbody>
    	    <?php if (mysqli_num_rows($store_list)>0){

    	    	while($store = mysqli_fetch_assoc($store_list)) { ?>
    		<tr>
                <td class="d-none notPrintable"><?php  echo h($store['Id']); ?></td>
    			<td><?php echo h($store['Name']); ?></td>
    			<td><?php echo h($store['Address']); ?></td>
                <td><?php echo h($store['ContactNumber']); ?></td>
                <td></td>
                <td></td>
	    		<td class="notPrintable"><a class="btn btn-sm bg-transparent text-danger editStore" ><i data-feather="edit" width="22" heigth="22" ></i></a></td>
    			<td class="notPrintable"><a class="btn btn-sm bg-transparent text-danger deleteStore" ><i data-feather="trash-2"></i></a></td>
    		</tr>
    		<?php }}else{ ?>
    			<tr class="notPrintable"><td colspan="7" align="center">No Records Found</td></tr>
    			
    		<?php }?>
    	</tbody>
    </table>
    <a class="btn btn-primary text-light" data-toggle="modal" data-target="#newStoreModal">New Store</a>
    <button id="printBtn" class="btn btn-primary">Print</button>

    <!-- New Store Modal -->	
    <?php include('new.php');?>
	<!-- Edit Store Modal -->
	<?php include('edit.php');?>	
	<!-- Delete Store Modal -->
	<?php include('delete.php');?>	
    
</div>
 
<?php  get_and_clear_session_message()?>
<?php include('../../private/shared/public_footer.php');?>
<script type="text/javascript" src="<?php echo url_for('resources/js/populate_store.js')?>"></script>
<script type="text/javascript" src="<?php echo url_for('resources/js/print.js')?>">
</script>
<script >
$(document).ready( function () {
    $('#printTable').DataTable({
        "order": [1,"asc"],
        "columnDefs": [{
            "targets": [3,6,7],
             "orderable":false
        },
        {
            "targets": [3,4,5,6,7],
            "searchable":false
        }]
    });
} );
</script>
</body>
</html>