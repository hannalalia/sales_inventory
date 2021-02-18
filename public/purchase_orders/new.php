<?php require_once('../../private/initialize.php');?>
<?php 
$company_name_list= find_all_company_name();

$product_list = find_all_products()


?>
<?php require('../../private/shared/public_header.php');?>
<?php require('../../private/shared/public_navigation.php');?>
  <div class="container">
  <p class="my-3 col-sm-7 col-12 text-sm-left text-center"><a  class="text-secondary"href="<?php echo url_for('purchase_orders/index.php')?>">Purchase Orders</a> \ Create Purchase Orders</p>
  <h2 class="my-3 col-sm-7 col-12 text-sm-left text-center">Create Purchase Orders</h2>
  <?php  echo display_session_errors(); ?>
  <?php echo display_session_message(); get_and_clear_session_errors();  ?>
    <form method="post" action="">
    <div class="form-group row">
        <label for="supplier" class="col-sm-2 col-form-label">Supplier: </label>
        <select name="supplier" id="" class="form-control col-sm-6">
        <?php if (mysqli_num_rows($company_name_list)>0){
            while($company= mysqli_fetch_assoc($company_name_list)) { ?>
          <option><?php echo h($company['CompanyName']);?></option>
            <?php }}?>
        </select>
    </div>
    <div class="form-group row">
      <label for="store" class="col-sm-2 col-form-label">Stores: </label>
      <select name="store" id="" class="form-control col-sm-6">
          <option value=""></option>
      </select>
    </div>
    <div class="form-group row">
      <label for="po_date" class="col-sm-2 col-form-label">Purchase Order Date: </label>
      <input type="date" name="po_date" class="form-control col-sm-6">
      </select>
    </div>
    <div class="form-group row">
      <label for="delivery_date" class="col-sm-2 col-form-label">Expected Delivery: </label>
      <input type="date" name="delivery_date" class="form-control col-sm-6">
      </select>
    </div>
    
    <table class="mx-auto table table-sm table-hover table-responsive-sm">
      <thead class="thead-light">
        <tr>
          <th>Item</th>
          <th>Purchase Cost</th>
          <th>Quantity</th>
          <th>Store</th>
          <th>Amount</th>
        </tr>
        
      </thead>
      <tbody>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>       
        </tr>
    </table>
     <!-- Search Item -->
    <div class="row mx-3 mb-3">
            <input class="form-control col-sm-5 col-10" type="search" name="itemSearch" placeholder="Search Item" list="items">
            <datalist id="items">
               <?php if (mysqli_num_rows($product_list)>0){
            while($item= mysqli_fetch_assoc($product_list )) { ?>
                <option><?php echo h($item['ItemName']);?></option>
            <?php }}?>
            </datalist>
            <input class="btn btn-primary btn-sm col-1" type="submit" name="searchBtn" value="Add item">
    </div>
    <!-- Search Item End -->
    <input class="btn btn-primary text-light mb-3" type="submit" value="Create">
    </form>
  </div>

<?php  get_and_clear_session_message();?>
<?php require('../../private/shared/public_footer.php');?>
<script type="text/javascript" src="<?php echo url_for('resources/js/populate_category.js')?>"></script>
</body>
</html>