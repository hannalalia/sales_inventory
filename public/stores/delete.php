<?php require_once('../../private/initialize.php'); ?>
<?php 

if(isset($_POST['deleteStore'])) {
  $Id = $_POST['Id'];
  $store = find_store_by_id($Id);
  $result = delete_store($Id);
   if($result === true) {
    $_SESSION['message'] =  $store['Name'] . ' has been deleted';
    redirect_to(url_for('/stores/index.php'));
  } else {
    $errors = $result;
  }
} 

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
	        	<div class="mb-3">
	        		<b>Name:</b> 
	        		<p  class="d-inline" id="NameDel"></p>
	        	</div>
	        	<div class="mb-3">
	        		<b>Address:</b>
	        		<p  class="d-inline" id="AddressDel"></p>  
	        	</div>
	        	<div class="mb-3">
	        		<b>Contact Number:</b> 
	        		<p  class="d-inline" id="ContactNumberDel"></p>
	        	</div>    
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	        <button type="Submit" name="deleteStore" class="btn btn-info">Delete Store</button>
	      </div>
	      </form>
	    </div>
	  </div>
	</div>