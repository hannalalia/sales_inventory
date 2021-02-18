<?php require_once('../../private/initialize.php');?>
<?php
if(isset($_POST['updateCategory'])) {
  $category = [];
  $category['Id'] = $_POST['Id'] ;
  $category['CategoryName'] = $_POST['CategoryName'] ?? '';
  $category['Description'] = $_POST['Description'] ?? '';

  $result = update_category($category);
  if($result === true) {
    $_SESSION['message'] = 'Category Updated.';
    redirect_to(url_for('/categories/index.php'));
  } else {
    $errors = $result;
     $output = '';
      $output .= "Failed to update category:";
      foreach($errors as $error) {
        $output .= " " . h($error);
      }
     $_SESSION['errors'] = $output;
     redirect_to(url_for('/categories/index.php'));
  }
}
//  else {
//   $category = find_category_by_id($Id);
// }
?>
<div class="modal fade" id="editCategoryModal">
	  <div class="modal-dialog modal-dialog-scrollable">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Edit Category</h5>
	        <button type="button" class="close" data-dismiss="modal">
	          <span >&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form method="POST">
	        <!-- <?php //echo display_errors($errors);?> -->
	        	<input type="hidden" name="Id" id="Id">
	        	<div class="form-group">
	        		<label for="CategoryName">Category Name</label>
	        		<input type="text" class="form-control" id="CategoryName" name="CategoryName" value="">
	        	</div>
	        	<div class="form-group">
	        		<label for="Description">Description</label>
	        		<textarea  class="form-control" id="Description" name="Description" id="" cols="10" rows="2"></textarea> 
	        	</div>      	        
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	        <input type="submit" class="btn btn-primary" name="updateCategory" id="updateBtn" value="Update Category">
	      </div>
	      </form>
	    </div>
	  </div>
	</div>