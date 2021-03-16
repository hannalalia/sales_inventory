<?php require_once('../../private/initialize.php');?>
<?php 
$category_list = find_all_categories();
$store_list = find_all_stores();

if(isset($_POST['addProduct'])) {
  $product['ProductCode'] = $_POST['ProductCode'] ?? '';
  $product['ItemName'] = $_POST['ItemName'] ?? '';
  $product['Description'] = $_POST['Description'] ?? '';
  $product['SellingPrice'] = $_POST['SellingPrice'] ?? '';

  $length = $_POST['length'] ?? '';
  $width= $_POST['width'] ?? '';
  $height = $_POST['height'] ?? '';
  $product['Dimensions'] = $length . " x " . $width . " x " . $height;
  $product['CategoryId'] = $_POST['Category'] ?? '';
  $product['Stocks'] = $_POST['Stocks'] ?? '';
  $product['Re-Order'] = $_POST['Re-Order'] ?? '';


  $result = insert_product($product);
  if($result === true) {
    $_SESSION['message'] = $product['ItemName'] . ' has been added';    
    redirect_to(url_for('/products/index.php'));

  } else {
      $errors = $result;
      $output = '';
      $output .= "Failed to insert product:";
      foreach($errors as $error) {
        $output .= " " . h($error);
      }
     $_SESSION['errors'] = $output;
     redirect_to(url_for('/products/index.php'));
  }

} 
?>

<div class="modal fade" id="newProductModal">
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
           <div class="form-group">
            <label for="ProductCode">Product Code</label>
            <input type="text" class="form-control" name="ProductCode" value="" >
          </div>
          <div class="form-group">
            <label for="ItemName">Item Name</label>
            <input type="text" class="form-control" name="ItemName" value="" >
          </div>
          <div class="form-group">
            <label for="Description" >Description</label>
            <textarea  class="form-control" name="Description" id="" cols="10" rows="2" ></textarea> 
          </div> 
          <div class="form-group">
            <label for="length">Length</label>
            <input type="number" class="form-control" name="length" min="0" >
          </div>
          <!-- <div class="input-group">
            <input type="text" class="form-control" aria-label="Text input with dropdown button" name="length" placeholder="Length">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Unit</button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">centimeter</a>
                <a class="dropdown-item" href="#">feet</a>
                <a class="dropdown-item" href="#">meter</a>
              </div>
            </div>
          </div> -->
          <div class="form-group">
            <label for="width"> Width</label>
            <input type="number" class="form-control" name="width"  min="0">
          </div>
          <div class="form-group">
            <label for="height">Height</label>
            <input type="number" class="form-control" name="height"  min="0">
          </div>
          <div class="form-group">
            <label for="Category">Category</label>
            <select name="Category" class="form-control">
              <?php while($category = mysqli_fetch_assoc($category_list)){ ?>
              <option value="<?php echo $category['Id'];?>"><?php echo $category['CategoryName'];?></option>
            <?php }?>
            </select>            
          </div>
          <div class="form-group">
            <label for="SellingPrice">Selling Price</label>
            <input type="text" class="form-control" name="SellingPrice" value="" >
          </div>
         <!--  <div>
            <label for="Stores">Available in store:</label> <br>        
            <?php while($store = mysqli_fetch_assoc($store_list)){ ?>
              <input class="m-1" type="checkbox" name="<?php echo $store['Id'];?>" value="<?php echo $store['Id'];?>">
              <label for="<?php echo $store['Id'];?>"><?php echo $store['Name'];?></label>
            <?php }?>

          </div> -->
          <div class="form-group">
            <label for="Stocks">Stocks On Hand</label>
            <input type="number" class="form-control" name="Stocks"  min="0">
          </div>    
          <div class="form-group">
            <label for="Re-Order">Re-Order Level</label>
            <input type="number" class="form-control" name="Re-Order"  min="0">
          </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" name="addProduct" class="btn btn-info" value="Add Product">  
      </div>
      </form>
    </div>
  </div>
</div>