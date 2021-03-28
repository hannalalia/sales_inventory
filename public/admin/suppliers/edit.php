<?php require_once('../../../private/initialize.php');?>
<?php
if(isset($_POST['updateSupplier'])) {
  $supplier = [];
  $supplier['Id'] = $_POST['Id'];
  $supplier['CompanyName'] = $_POST['CompanyName'] ?? '';
  $supplier['Address'] = $_POST['Address'] ?? '';
  $supplier['ContactNumber'] = $_POST['ContactNumber'] ?? '';
  $supplier['Email'] = $_POST['Email'] ?? '';

  $result = update_supplier($supplier);
  if($result === true) {
    $_SESSION['message'] = $supplier['CompanyName']. ' has been updated';
    redirect_to(url_for('admin/suppliers/index.php'));
  } else {
    $errors = $result;
      $output = '';
      $output .= "Failed to update supplier:";
      foreach($errors as $error) {
        $output .= " " . h($error);
      }
     $_SESSION['errors'] = $output;
     redirect_to(url_for('admin/suppliers/index.php'));
  }
}
?>
<div class="modal fade" id="editSupplierModal">
	  <div class="modal-dialog modal-dialog-scrollable">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Edit Supplier</h5>
	        <button type="button" class="close" data-dismiss="modal">
	          <span >&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form method="POST">
	        	<input type="hidden" name="Id" id="Id">
	        	<div class="form-group">
	        		<label for="CompanyName">Company Name</label>
	        		<input type="text" class="form-control" id="CompanyName" name="CompanyName" value="">
	        	</div>
	        	<div class="form-group">
	        		<label for="Address">Address</label>
	        		<textarea  class="form-control" id="Address" name="Address" id="" cols="10" rows="2"></textarea> 
	        	</div>      	
	        	<div class="form-group">
	        		<label for="ContactNumber">Contact Number</label>
	        		<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">+63</span>
				  	</div>
						<input type="text" class="form-control" id="ContactNumber" name="ContactNumber" placeholder="9xxxxxxxxx">
					</div>
	        	</div>
	        	<div class="form-group">
	        		<label for="Email">Email</label>
	        		<input type="email" class="form-control" id="Email" name="Email">
	        	</div> 		        
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	        <input type="submit" class="btn btn-info" name="updateSupplier" value="Update Supplier">
	      </div>
	      </form>
	    </div>
	  </div>
	</div>
