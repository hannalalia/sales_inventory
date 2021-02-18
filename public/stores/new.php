<?php require_once('../../private/initialize.php');?>
<?php 
// if(isset($_POST['addStore'])) {
//   $supplier['CompanyName'] = $_POST['CompanyName'] ?? '';
//   $supplier['Address'] = $_POST['Address'] ?? '';
//   $supplier['ContactNumber'] = $_POST['ContactNumber'] ?? '';
//   $supplier['Email'] = $_POST['Email'] ?? '';

//   $result = insert_supplier($supplier);
//   if($result === true) {
//     $_SESSION['message'] = $supplier['CompanyName'] . ' has been added';    
//     redirect_to(url_for('/suppliers/index.php'));

//   } else {
//       $errors = $result;
//       $output = '';
//       $output .= "Failed to insert supplier:";
//       foreach($errors as $error) {
//         $output .= " " . h($error);
//       }
//      $_SESSION['errors'] = $output;
//      redirect_to(url_for('/suppliers/index.php'));
//   }

// } else {
//   // display the blank form
//   $supplier = [];
//   $supplier["CompanyName"] = '';
//   $supplier["Address"] = '';
//   $supplier["ContactNumber"] = '';
//   $supplier["Email"] = '';
// }
?>

<div class="modal fade" id="newStoreModal">
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
          <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" class="form-control" name="Name" value="" >
          </div>
          <div class="form-group">
            <label for="Address" >Address</label>
            <textarea  class="form-control" name="Address" id="" cols="10" rows="2" >
            </textarea> 
          </div>        
          <div class="form-group">
            <label for="ContactNumber">Contact Number</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" >+63</span>
              </div>
              <input type="text" class="form-control" name="ContactNumber" placeholder="9xxxxxxxx" value="">
            </div>
          </div>
          <div class="form-group">
            <label for="pos">POS Devices</label>
            <input type="number" class="form-control" name="pos" value="" >
          </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" name="addStore" class="btn btn-primary" value="Add Store">  
      </div>
      </form>
    </div>
  </div>
</div>