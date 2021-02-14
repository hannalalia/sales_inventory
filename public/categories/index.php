<?php require_once('../../private/initialize.php');?>
<?php $category_list = find_all_categories();
$category_name_list = find_all_category_name();
?>
<?php require('../../private/shared/public_header.php');?>
<?php require('../../private/shared/public_navigation.php');?>

  	<div class="container">
    <div class="row mx-1">      
     	<?php  echo display_session_errors(); ?>
        <?php echo display_session_message(); get_and_clear_session_errors();  ?>
      	<h2 class="my-3 col-sm-7 col-12 text-sm-left text-center">List of Categories</h2>
        <form method="post" class="col-sm-5 col-12 my-3">
            <div class="row">
            <input class="form-control col-sm-9 col-10" type="search" name="categorySearch" placeholder="Category Name" list="categories">
            <datalist id="categories">
            <?php if (mysqli_num_rows($category_name_list)>0){
            while($categoryName= mysqli_fetch_assoc($category_name_list)) { ?>
                <option><?php echo h($categoryName['CategoryName']);?></option>
            <?php }}?>
            </datalist>
            <input class="btn btn-primary btn-sm col-sm-3 col-2" type="submit" name="searchBtn" value="Search">
            </div>
        </form>
    </div>
    <table class="mx-auto table table-sm table-hover table-responsive-sm">
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
    <a class="btn btn-primary text-light mb-3" data-toggle="modal" data-target="#newCategoryModal" >New Category</a>

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
</body>
</html>