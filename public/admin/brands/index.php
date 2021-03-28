<?php require_once('../../../private/initialize.php');?>
<?php 
    $brand_list = find_all_brands();

?>
<?php require('../../../private/shared/public_header.php');?>
<?php require('../../../private/shared/public_navigation.php');?>

  	<div class="container"> 
     	<?php  echo display_session_errors(); ?>
        <?php echo display_session_message(); get_and_clear_session_errors();  ?>
      	<h2 class="my-3  text-center">List of Brands</h2>

    <table class="mx-auto table table-sm table-hover table-responsive-sm text-center" id="cat_table">
    	<thead class="thead-light">
    		<tr>
    			<th>#</th>
    			<th>Brand Name</th>
	    		<th>Description</th>
	    		<th>Edit</th>
	    		<th>Delete</th>
    		</tr>
    		
    	</thead>
    	<tbody>
    	    <?php if (mysqli_num_rows($brand_list)>0){

    	    	while($brand = mysqli_fetch_assoc($brand_list)) { ?>
    		<tr>

    			<td><?php echo h($brand['Id']); ?></td>
    			<td><?php echo h($brand['BrandName']); ?></td>
    			<td><?php echo h($brand['Description']); ?></td>
	    		<td><a class="btn btn-sm bg-transparent text-danger editBrand" data-target="#editBrandModal"><i data-feather="edit" width="22" heigth="22" ></i></a></td>
    			<td><a class="btn btn-sm bg-transparent text-danger deleteBrand" data-target="#deleteBrandModal"><i data-feather="trash-2"></i></a></td>
    		</tr>
    		<?php }}else{ ?>
    			<tr><td colspan="7" align="center">No Records Found</td></tr>
    			
    		<?php }?>
    	</tbody>
    </table>
    <a class="btn btn-info text-light m-2" data-toggle="modal" data-target="#newBrandModal" >New Brand</a>

    <!-- New Brand Modal -->	
    <?php include('new.php')?>
	<!-- Edit Brand Modal -->
	<?php include('edit.php')?>	
	<!-- Delete Brand Modal -->
	<?php include('delete.php')?>	
    </div>
<?php  get_and_clear_session_message();?>
<?php require('../../../private/shared/public_footer.php');?>
<script type="text/javascript" src="<?php echo url_for('admin/resources/js/populate_brand.js')?>"></script>
<script >
$(document).ready( function () {
    let row = $('#cat_table tr').length;
    if(row>1){
        $('#cat_table').DataTable({
            "order": [1,"asc"],
            "columnDefs": [{
                "targets": [2,3,4],
                 "orderable":false
            },        {
                "targets": [2,3,4],
                "searchable": false 
            }]

        });
    }
});
</script>
</body>
</html>