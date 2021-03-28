<?php require_once('../../../private/initialize.php');?>
<?php
if(isset($_POST['updateBrand'])) {
  $brands = [];
  $brands['Id'] = $_POST['Id'] ;
  $brands['BrandName'] = $_POST['BrandName'] ?? '';
  $brands['Description'] = $_POST['Description'] ?? '';

  $result = update_brand($brands);
  if($result === true) {
    $_SESSION['message'] = 'Brand Updated.';
    redirect_to(url_for('admin/brands/index.php'));
  } else {
    $errors = $result;
     $output = '';
      $output .= "Failed to update brands:";
      foreach($errors as $error) {
        $output .= " " . h($error);
      }
     $_SESSION['errors'] = $output;
     redirect_to(url_for('admin/brands/index.php'));
  }
}
?>
<div class="modal fade" id="editBrandModal">
	  <div class="modal-dialog modal-dialog-scrollable">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Edit Brand</h5>
	        <button type="button" class="close" data-dismiss="modal">
	          <span >&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form method="POST">
	        	<input type="hidden" name="Id" id="Id">
	        	<div class="form-group">
	        		<label for="BrandName">Brand Name</label>
	        		<input type="text" class="form-control" id="BrandName" name="BrandName" value="">
	        	</div>
	        	<div class="form-group">
	        		<label for="Description">Description</label>
	        		<textarea  class="form-control" id="Description" name="Description" id="" cols="10" rows="2"></textarea> 
	        	</div>      	        
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	        <input type="submit" class="btn btn-info" name="updateBrand" id="updateBtn" value="Update Brand">
	      </div>
	      </form>
	    </div>
	  </div>
	</div>