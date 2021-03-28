<?php require_once('../../../private/initialize.php');?>
<?php
$category_list = find_all_categories();
$brand_list = find_all_brands();
if(isset($_POST['updateProduct'])) {
  $product = [];
  $product['ProductCode'] = $_POST['ProductCode'];
  $product['ItemName'] = $_POST['ItemName'] ?? '';
  $product['Description'] = $_POST['Description'] ?? '';
  $product['CategoryId'] = $_POST['CategoryId'] ?? '';
  $product['BrandId'] = $_POST['BrandId'] ?? '';
  $product['SellingPrice'] = $_POST['SellingPrice'] ?? '';
  $product['Stocks'] = $_POST['Stocks'] ?? '';
  $product['Re-Order'] = $_POST['Re-Order'] ?? '';

  $result = update_product($product);
  if($result === true) {
    $_SESSION['message'] = $product['ItemName']. ' - ' . $product['ProductCode'] . ' has been updated';
    redirect_to(url_for('admin/products/index.php'));
  } else {
    $errors = $result;
      $output = '';
      $output .= "Failed to update product:";
      foreach($errors as $error) {
        $output .= " " . h($error);
      }
     $_SESSION['errors'] = $output;
     redirect_to(url_for('admin/products/index.php'));
  }
}
?>
<div class="modal fade" id="editProductModal">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Product Details</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span >&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
           <!-- <div class="form-group">
            <label for="ProductCode">Product Code</label>
            <input type="text" class="form-control" name="ProductCode" id="ProductCode">
          </div> -->
          <input type="hidden" name="ProductCode" id="ProductCode">
          <div class="form-group">
            <label for="ItemName">Item Name</label>
            <input type="text" class="form-control" name="ItemName" id="ItemName" >
          </div>
          <div class="form-group">
            <label for="Description" >Description</label>
            <textarea  class="form-control" name="Description" cols="10" rows="2" id="Description"></textarea> 
          </div>         
          <div class="form-group">
            <label for="CategoryId">Category</label>
            <select name="CategoryId" class="form-control" id="Category">
              <?php while($category = mysqli_fetch_assoc($category_list)){ ?>
              <option value="<?php echo $category['Id'];?>"><?php echo $category['CategoryName'];?></option>
            <?php }?>
            </select>           
          </div>
          <div class="form-group">
            <label for="Brand">Brand</label>
            <select name="BrandId" class="form-control" id="Brand">
              <?php while($brand = mysqli_fetch_assoc($brand_list)){ ?>
              <option value="<?php echo $brand['Id'];?>"><?php echo $brand['BrandName'];?></option>
            <?php }?>
            </select>            
          </div>
          <div class="form-group">
            <label for="SellingPrice">Selling Price</label>
            <input type="text" class="form-control" name="SellingPrice" id="SellingPrice" value="" >
          </div>
<!--           <div class="form-group">
            <label for="Stocks">Stocks On Hand</label>
            <input type="number" class="form-control" name="Stocks" id="Stocks"  min="0">
          </div>   -->  
          <div class="form-group">
            <label for="Re-Order">Re-Order Level</label>
            <input type="number" class="form-control" name="Re-Order" id="Re-Order"  min="1">
          </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" name="updateProduct" class="btn btn-info" value="Update Product">  
      </div>
      </form>
    </div>
  </div>
</div>