<?php require_once('../../private/initialize.php');?>
<?php 
if(isset($_POST['addSupplier'])) {
  $supplier['CompanyName'] = $_POST['CompanyName'] ?? '';
  $supplier['Address'] = $_POST['Address'] ?? '';
  $supplier['ContactNumber'] = $_POST['ContactNumber'] ?? '';
  $supplier['Email'] = $_POST['Email'] ?? '';

  $result = insert_supplier($supplier);
  if($result === true) {
    $_SESSION['message'] = $supplier['CompanyName'] . ' has been added';    
    redirect_to(url_for('/suppliers/index.php'));

  } else {
      $errors = $result;
      $output = '';
      $output .= "Failed to insert supplier:";
      foreach($errors as $error) {
        $output .= " " . h($error);
      }
     $_SESSION['errors'] = $output;
     redirect_to(url_for('/suppliers/index.php'));
  }
}
?>

<div class="modal fade" id="newSupplierModal">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Supplier Details</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span >&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <label for="CompanyName">Company Name</label>
            <input type="text" class="form-control" name="CompanyName"  >
          </div>
          <div class="form-group">
            <label for="Address" >Address</label>
            <textarea  class="form-control" name="Address" id="" cols="10" rows="2" ></textarea> 
          </div>        
          <div class="form-group">
            <label for="ContactNumber">Contact Number</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">+63</span>
              </div>
              <input type="text" class="form-control" name="ContactNumber" placeholder="9xxxxxxxx" >
            </div>
          </div>
          <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" name="Email" placeholder="john_doe@example.com" >
          </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" name="addSupplier" class="btn btn-primary" value="Add Supplier">  
      </div>
      </form>
    </div>
  </div>
</div>