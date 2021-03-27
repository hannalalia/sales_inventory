<?php require_once('../../private/initialize.php');?>
<?php 
if(isset($_POST['addCategory'])) {
  $category['CategoryName'] = $_POST['CategoryName'] ?? '';
  $category['Description'] = $_POST['Description'] ?? '';

  $result = insert_category($category);
  if($result === true) {
    $_SESSION['message'] =  $category['CategoryName']. ' has been added.';
    redirect_to(url_for('/categories/index.php'));
  } else {
    $errors = $result;
    $output = '';
      $output .= "Failed to insert category:";
      foreach($errors as $error) {
        $output .= " " . h($error);
      }
     $_SESSION['errors'] = $output;
     redirect_to(url_for('/categories/index.php'));
  }
} 
?>

<div class="modal fade" id="newCategoryModal">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Category Details</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span >&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <label for="CategoryName">Category Name</label>
            <input type="text" class="form-control" name="CategoryName" required>
          </div>
          <div class="form-group">
            <label for="Description" required>Description</label>
            <textarea  class="form-control" name="Description" cols="10" rows="2"></textarea> 
          </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" name="addCategory" class="btn btn-info" value="Add Category">  
      </div>
      </form>
    </div>
  </div>
</div>