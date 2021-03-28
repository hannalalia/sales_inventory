<?php require_once('../../../private/initialize.php'); ?>
<?php 
if(isset($_POST['deleteBrand'])) {
  $Id = $_POST['Id'];
  $result = delete_brand($Id);
  $_SESSION['message'] = 'Brand deleted.';
  redirect_to(url_for('admin/brands/index.php'));
} 

?>

<div class="modal fade" id="deleteBrandModal">
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
	        		<b>Brand Name:</b> 
	        		<p class="d-inline" id="BrandNameDel"></p>
	        	</div>
	        	<div class="mb-3">
	        		<b>Description:</b>
	        		<p class="d-inline" id="DescriptionDel"></p>  
	        	</div>   
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	        <button type="Submit" name="deleteBrand" class="btn btn-info">Delete Brand</button>
	      </div>
	      </form>
	    </div>
	  </div>
	</div>