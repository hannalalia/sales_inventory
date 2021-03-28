<?php require_once('../../../private/initialize.php');?>
<?php 
if(isset($_POST['addBrand'])) {
  $brand['BrandName'] = $_POST['BrandName'] ?? '';
  $brand['Description'] = $_POST['Description'] ?? '';

  $result = insert_brand($brand);
  if($result === true) {
    $_SESSION['message'] =  $brand['BrandName']. ' has been added.';
    redirect_to(url_for('admin/brands/index.php'));
  } else {
    $errors = $result;
    $output = '';
      $output .= "Failed to insert brand:";
      foreach($errors as $error) {
        $output .= " " . h($error);
      }
     $_SESSION['errors'] = $output;
     redirect_to(url_for('admin/brands/index.php'));
  }
} 
?>

<div class="modal fade" id="newBrandModal">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Brand Details</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span >&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <label for="BrandName">Brand Name</label>
            <input type="text" class="form-control" name="BrandName" required>
          </div>
          <div class="form-group">
            <label for="Description" required>Description</label>
            <textarea  class="form-control" name="Description" cols="10" rows="2"></textarea> 
          </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" name="addBrand" class="btn btn-info" value="Add Brand">  
      </div>
      </form>
    </div>
  </div>
</div>