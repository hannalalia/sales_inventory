<?php require_once('../../private/initialize.php'); ?>
<?php 
if(isset($_POST['deleteCategory'])) {
  $Id = $_POST['Id'];
  $result = delete_category($Id);
  $_SESSION['message'] = 'Category deleted.';
  redirect_to(url_for('/categories/index.php'));
} 

?>

<div class="modal fade" id="deleteCategoryModal">
	  <div class="modal-dialog modal-dialog-scrollable">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Confirm Deletion</h5>
	        <button type="button" class="close" data-dismiss="modal">
	          <span >&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form method="POST">
	        	<input type="hidden" name="Id" id="IdDelInp">
	        	<div class="mb-3">
	        		<b>Id:</b> 
	        		<p class="d-inline" id="IdDel"></p>
	        	</div>
	        	<div class="mb-3">
	        		<b>Category Name:</b> 
	        		<p class="d-inline" id="CategoryNameDel"></p>
	        	</div>
	        	<div class="mb-3">
	        		<b>Description:</b>
	        		<p class="d-inline" id="DescriptionDel"></p>  
	        	</div>   
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	        <button type="Submit" name="deleteCategory" class="btn btn-primary">Delete Category</button>
	      </div>
	      </form>
	    </div>
	  </div>
	</div>