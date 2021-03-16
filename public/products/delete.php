<?php require_once('../../private/initialize.php'); ?>
<?php 

if(isset($_POST['deleteProduct'])) {
  $ProductCode = $_POST['ProductCode'];
  $product =  find_product_by_pcode($ProductCode);
  $result = delete_product($ProductCode);
   if($result === true) {
    $_SESSION['message'] = $product['ItemName'] . ' has been deleted';
    redirect_to(url_for('/products/index.php'));
  } else {
    $errors = $result;
  }
} 

?>

<div class="modal fade" id="deleteProductModal">
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
	        	<input type="hidden" name="ProductCode" id="ProductCodeDelInp">
	        	<input type="hidden" name="pname" id="ItemNameDelInp">
	        	<div class="mb-3">
	        		<b>Product Code:</b> 
	        		<p class="d-inline" id="ProductCodeDel"></p>
	        	</div>
	        	<div class="mb-3">
	        		<b>Item Name:</b> 
	        		<p class="d-inline" id="ItemNameDel"></p>
	        	</div>
	        	<div class="mb-3">
	        		<b>Description:</b>
	        		<p class="d-inline" id="DescriptionDel"></p>  
	        	</div>
	        	<div class="mb-3">
	        		<b>Dimensions:</b> 
	        		<p class="d-inline" id="DimensionsDel"></p>
	        	</div>
	        	<div class="mb-3">
	        		<b>Category:</b>
	        		<p class="d-inline" id="CategoryDel"></p> 
	        	</div> 
	        	<div class="mb-3">
	        		<b>Selling Price:</b>
	        		<p class="d-inline" id="SellingPriceDel"></p> 
	        	</div> 
	        	<div class="mb-3">
	        		<b>Stocks On Hand:</b>
	        		<p class="d-inline" id="StocksDel"></p> 
	        	</div>         
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	        <button type="Submit" name="deleteProduct" class="btn btn-info">Delete Product</button>
	      </div>
	      </form>
	    </div>
	  </div>
	</div>