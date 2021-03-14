<?php require_once('../../private/initialize.php'); ?>
<?php 
if(isset($_POST['deleteSupplier'])) {
  $Id = $_POST['Id'];
  $supplier = find_supplier_by_id($Id);
  $result = delete_supplier($Id);
   if($result === true) {
    $_SESSION['message'] =  $supplier['CompanyName'] . ' has been deleted';
    redirect_to(url_for('/suppliers/index.php'));
  } else {
    $errors = $result;
  }
} 

?>

<div class="modal fade" id="deleteSupplierModal">
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
	        		<b>Company Name:</b> 
	        		<p class="d-inline" id="CompanyNameDel"></p>
	        	</div>
	        	<div class="mb-3">
	        		<b>Address:</b>
	        		<p class="d-inline" id="AddressDel"></p>  
	        	</div>
	        	<div class="mb-3">
	        		<b>Contact Number:</b> 
	        		<p class="d-inline" id="ContactNumberDel"></p>
	        	</div>
	        	<div class="mb-3">
	        		<b>Email:</b>
	        		<p class="d-inline" id="EmailDel"></p> 
	        	</div>        
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	        <button type="Submit" name="deleteSupplier" class="btn btn-primary">Delete Supplier</button>
	      </div>
	      </form>
	    </div>
	  </div>
	</div>