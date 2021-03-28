<?php require_once('../../../private/initialize.php');?>
<?php 

$products_list = find_all_products();

?>
<?php include('../../../private/shared/public_header.php');?>
<?php include('../../../private/shared/staff_navigation.php');?>
<style type="text/css">
    tr,td,th{
    text-align: center !important;
}
</style>


  <body>
    <ul class="nav nav-tabs mt-3">
      <li class="nav-item">
        <a class="nav-link active text-dark" href="#">Stock Adjustment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="<?php echo url_for('cashier/stock_adjustments/stock_adj_history.php')?>">Stock Adjustment History</a>
      </li>
<!--       <li class="nav-item">
        <a class="nav-link text-dark" href="<?php //echo url_for('stock_adjustments/approve_adj.php')?>">Approve Adjustments</a>
      </li> -->
    </ul>
  	<div class="container mb-3"> 
          <?php  echo display_session_errors(); ?>
          <?php echo display_session_message(); get_and_clear_session_errors();  ?>
        <h2 class="my-3 text-center" id="title">Stock Adjustment</h2>
    <table class="mx-auto table table-sm table-hover table-responsive-lg" id="printTable">
    	<thead class="thead-light">
    		<tr>
    			<th>Product Code</th>
    			<th>Item Name</th>
	    		<th>Description</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Selling Price</th>
	            <th>Stock On Hand</th>
                <th class="notPrintable">Action</th>
	    		<!-- <th class="notPrintable">Request Adjustment</th> -->
    		</tr>
    		
    	</thead>
    	<tbody>
    	    <?php if (mysqli_num_rows($products_list)>0){
    	    	while($product = mysqli_fetch_assoc($products_list)) { 
                    $category=find_category_by_id($product['CategoryId']);
                    $refId =  md5(uniqid(rand(), true));                  
                   ?>
    		<tr>
    			<td><?php echo h($product['ProductCode']); ?></td>
    			<td><?php echo h($product['ItemName']); ?></td>
    			<td><?php echo h($product['Description']); ?></td>
                <td><?php echo h($category['CategoryName']) ?></td>
                <td></td>
    			<td><?php echo h($product['SellingPrice']); ?></td>
                <td><?php echo h($product['Stocks']); ?></td>
	    		<td class="notPrintable"><a class="btn btn-sm bg-secondary text-light adjustStocks" data-target="#adjusttModal" data-id="<?php echo $refId; ?>" data-min="<?php echo h($product['Stocks']); ?>">Adjust</a></td>
    		</tr>
    		<?php }}else{ ?>
    			<tr class="notPrintable"><td colspan="9" align="center">No Records Found</td></tr>
    			
    		<?php }?>
    	</tbody>
    </table>
<!--     <a class="btn btn-info text-light m-2" data-toggle="modal" data-target="#newProductModal">Request adjustment</a> -->
    <!-- <button id="printBtn" class="btn btn-info m-2">Print</button> -->


	<!-- Adjust Modal -->
	<?php include('adjust.php');?>
    </div>
 </body>
<?php  //get_and_clear_session_message()?>
<?php include('../../../private/shared/public_footer.php');?>
<script type="text/javascript" src="<?php echo url_for('cashier/resources/js/populate_stock_adj.js')?>"></script>
<!-- <script type="text/javascript" src="<?php //echo url_for('cashier/resources/js/print.js')?>"> -->
</script>
<script >
$(document).ready( function () {
    $('#printTable').DataTable({
        "order": [1,"asc"],
        "columnDefs": [{
            "targets": [0,2,7],
             "orderable":false
        },
        {
            "targets": [2,5,6,7],
            "searchable": false 
        }]
    });
} );
</script>
</html>