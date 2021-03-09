<?php require_once('../../private/initialize.php');?>
<?php

if(isset($_POST['editStore'])) {
  $store = [];
  $store['Id'] = $_POST['Id'];
  $store['Name'] = $_POST['Name'] ?? '';
  $store['Address'] = $_POST['Address'] ?? '';

  $result = update_store($store);
  if($result === true) {
    $_SESSION['message'] = $store['Name']. ' has been updated';
    redirect_to(url_for('/stores/index.php'));
  } else {
    $errors = $result;
      $output = '';
      $output .= "Failed to update store:";
      foreach($errors as $error) {
        $output .= " " . h($error);
      }
     $_SESSION['errors'] = $output;
     redirect_to(url_for('/stores/index.php'));
  }
} 
?>
<div class="modal fade" id="editStoreModal">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Store Details</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span >&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <input type="hidden"  id="Id" name="Id">
          <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" class="form-control" name="Name" id="Name">
          </div>
          <div class="form-group">
            <label for="Address" >Address</label>
            <textarea  class="form-control" name="Address" id="Address" cols="10" rows="2" >
            </textarea> 
          </div>        
         <!--  <div class="form-group">
            <label for="ContactNumber">Contact Number</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" >+63</span>
              </div>
              <input type="text" class="form-control" name="ContactNumber" id="ContactNumber" placeholder="9xxxxxxxx" value="">
            </div>
          </div>
          <div class="form-group">
            <label for="POS">POS Devices</label>
            <input type="number" class="form-control" name="POS" id="POS"  >
          </div>        
      </div> -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" name="editStore" class="btn btn-primary" value="Update Store">  
      </div>
      </form>
    </div>
  </div>
</div>
</div>