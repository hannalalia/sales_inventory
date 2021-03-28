<?php require_once('../../../private/initialize.php');?>
<?php
if(isset($_POST['requestAdjustment'])) {

  $adjustment = [];
  $adjustment['ProductCode'] = $_POST['ProductCode'] ?? '';

  $product = find_product_by_pcode($adjustment['ProductCode']);
  $ItemName =  $product['ItemName'];
  // $adjustment['ItemName'] = $_POST['ItemName'] ?? '';
  $adjustment['RefId'] = $_POST['RefId'] ?? '';
  $adjustment['Reason'] = $_POST['Reason'] ?? '';
  $adjustment['StockCount'] = $_POST['StockCount'] ?? '';

  $adjustment['StockAfter'] = $product['Stocks'] + $adjustment['StockCount'];
  update_inventory_stocks($adjustment['ProductCode'],$adjustment['StockCount']);
  $result = insert_adjustment($adjustment);
  if($result === true) {
    $_SESSION['message'] = 'An adjustment of ' . $ItemName . ' - ' . $adjustment['ProductCode'] . '.  (Reference Id: ' . $adjustment['RefId'] . ')';
    redirect_to(url_for('admin/stock_adjustments/index.php'));
  } else {
    $errors = $result;
      $output = '';
      $output .= "Failed to update adjustment:";
      foreach($errors as $error) {
        $output .= " " . h($error);
      }
     $_SESSION['errors'] = $output;
     redirect_to(url_for('admin/stock_adjustments/index.php'));
  }
}
?>
<div class="modal fade" id="adjustModal">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Adjustment Details</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span >&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <!-- <input type="hidden" name="ItemName" id="ItemName" readonly> -->
          <label for="">Product Code</label>
          <input name="ProductCode" id="ProductCode" class="form-control" readonly>
          <label for="">Reference Id</label>
          <input type="text" class="form-control" name="RefId" id="RefId" readonly>
          <label for="">Reason for Adjustment</label>
          <textarea class="form-control" name="Reason"></textarea>
        <!--   <label for="">Command</label>
          <select name="" id="" class="form-control">
            <option value="">Remove from inventory</option>
            <option value="">Add to inventory</option>
          </select> -->
          <label for="">Stock Count</label>
          <input type="number" class="form-control" name="StockCount" id="StockCount" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" name="requestAdjustment" class="btn btn-info" value="Request Adjustment">  
      </div>
      </form>
    </div>
  </div>
</div>