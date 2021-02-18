<?php require_once('../../private/initialize.php'); ?>
<?php 

// if(isset($_POST['deleteStore'])) {
//   $Id = $_POST['Id'];
//   $supplier = find_supplier_by_id($Id);
//   $result = delete_supplier($Id);
//    if($result === true) {
//     $_SESSION['message'] =  $supplier['CompanyName'] . ' has been deleted';
//     redirect_to(url_for('/suppliers/index.php'));
//   } else {
//     $errors = $result;
//   }
// } 

?>

<div class="modal fade" id="deleteStoreModal">
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
	        	<div>
	        		<b>Name:</b> 
	        		<p id="NameDel"></p>
	        	</div>
	        	<div>
	        		<b>Address:</b>
	        		<p id="AddressDel"></p>  
	        	</div>
	        	<div>
	        		<b>Contact Number:</b> 
	        		<p id="ContactNumberDel"></p>
	        	</div>
	        	<div>
	        		<b>POS Devices:</b>
	        		<p id="POSDel"></p> 
	        	</div>        
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	        <button type="Submit" name="deleteStore" class="btn btn-primary">Delete Store</button>
	      </div>
	      </form>
	    </div>
	  </div>
	</div>