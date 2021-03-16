<?php require_once('../../private/initialize.php');?>
<?php 
    $category_list = find_all_categories();

?>
<?php require('../../private/shared/public_header.php');?>
<?php require('../../private/shared/public_navigation.php');?>

  	<div class="container"> 
     	<?php  echo display_session_errors(); ?>
        <?php echo display_session_message(); get_and_clear_session_errors();  ?>
      	<h2 class="my-3  text-center">List of Categories</h2>

    <table class="mx-auto table table-sm table-hover table-responsive-sm text-center" id="cat_table">
    	<thead class="thead-light">
    		<tr>
    			<th>#</th>
    			<th>Category Name</th>
	    		<th>Description</th>
	    		<th>Edit</th>
	    		<th>Delete</th>
    		</tr>
    		
    	</thead>
    	<tbody>
    	    <?php if (mysqli_num_rows($category_list)>0){

    	    	while($category = mysqli_fetch_assoc($category_list)) { ?>
    		<tr>

    			<td><?php echo h($category['Id']); ?></td>
    			<td><?php echo h($category['CategoryName']); ?></td>
    			<td><?php echo h($category['Description']); ?></td>
	    		<td><a class="btn btn-sm bg-transparent text-danger editCategory" data-target="#editCategoryModal"><i data-feather="edit" width="22" heigth="22" ></i></a></td>
    			<td><a class="btn btn-sm bg-transparent text-danger deleteCategory" data-target="#deleteCategoryModal"><i data-feather="trash-2"></i></a></td>
    		</tr>
    		<?php }}else{ ?>
    			<tr><td colspan="7" align="center">No Records Found</td></tr>
    			
    		<?php }?>
    	</tbody>
    </table>
    <a class="btn btn-info text-light m-2" data-toggle="modal" data-target="#newCategoryModal" >New Category</a>

    <!-- New Category Modal -->	
    <?php include('new.php')?>
	<!-- Edit Category Modal -->
	<?php include('edit.php')?>	
	<!-- Delete Category Modal -->
	<?php include('delete.php')?>	
    </div>
<?php  get_and_clear_session_message();?>
<?php require('../../private/shared/public_footer.php');?>
<script type="text/javascript" src="<?php echo url_for('resources/js/populate_category.js')?>"></script>
<script >
$(document).ready( function () {
    $('#cat_table').DataTable({
        "order": [1,"asc"],
        "columnDefs": [{
            "targets": [2],
             "orderable":false
        },        {
            "targets": [2],
            "searchable": false 
        }]

    });
} );
</script>
</body>
</html>