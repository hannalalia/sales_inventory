<?php require_once('../../private/initialize.php');?>
<?php 

$history_list = find_all_stock_adjustments();


?>
<?php include('../../private/shared/public_header.php');?>
<?php include('../../private/shared/public_navigation.php');?>
<style type="text/css">
    tr,td,th{
    text-align: center !important;
}
</style>


  <body>
    <ul class="nav nav-tabs mt-3">
      <li class="nav-item">
        <a class="nav-link text-dark" href="<?php echo url_for('stock_adjustments/index.php')?>">Stock Adjustment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="<?php echo url_for('stock_adjustments/stock_adj_history.php')?>">Stock Adjustment History</a>
      </li>
<!--       <li class="nav-item">
        <a class="nav-link active text-dark" href="#">Approve Adjustments</a>
      </li> -->
    </ul>
  	<div class="container mb-3"> 
          <?php  echo display_session_errors(); ?>
          <?php echo display_session_message(); get_and_clear_session_errors();  ?>
        <h2 class="my-3 text-center" id="title">Approve Stock Adjustments</h2>
    <table class="mx-auto table table-sm table-hover table-responsive" id="printTable">
    	<thead class="thead-light">
    		<tr>
    			<th>Reference Id</th>
    			<th>Product Code</th>
                <th>Employee Name</th>
	    		<th>Reason</th>
                <th>Adjustment</th>
                <th>Stock After</th>
                <th>Request Status</th>
                <th>Date</th>
                <th>Action</th>
    		</tr>
    		
    	</thead>
    	<tbody>
    	    <?php if (mysqli_num_rows($history_list)>0){

    	    	while($history = mysqli_fetch_assoc($history_list)) { 
                   
                    ?>

    		<tr>
    			<td><?php echo h($history['Ref_Id']); ?></td>
    			<td><?php echo h($history['ProductCode']); ?></td>
                <td></td>
    			<td><?php echo h($history['Reason']); ?></td>
                <td><?php echo h($history['StockCount']) ?></td>
                <td></td>
                <td></td>
    			<td><?php echo h($history['Date']); ?></td>
                <td class="notPrintable"><a class="btn btn-sm bg-info text-light w-100 m-1" id="approveBtn">Approve</a>
                <a class="btn btn-sm bg-danger text-light w-100 m-1" id="declineBtn">Decline</a>
                </td>
	    	
    		</tr>
    		<?php }}else{ ?>
    			<tr class="notPrintable"><td colspan="9" align="center">No Records Found</td></tr>
    			
    		<?php }?>
    	</tbody>
    </table>
<!--     <a class="btn btn-info text-light m-2" data-toggle="modal" data-target="#newProductModal">Request adjustment</a> -->
    <button id="printBtn" class="btn btn-info m-2">Print</button>
    </div>
 </body>
<?php  //get_and_clear_session_message()?>
<?php include('../../private/shared/public_footer.php');?>
<script type="text/javascript" src="<?php echo url_for('resources/js/populate_stock_adj.js')?>"></script>
<script type="text/javascript" src="<?php echo url_for('resources/js/print.js')?>">
</script>
<script >
$(document).ready( function () {
    $('#printTable').DataTable({
        
    });
} );
</script>
<script>
$(document).ready( function () {
$('#approveBtn').on('click', function(e){
e.preventDefault();
    $.post( "approveAdjustment.php", {RefId, ProductCode, Adj} )
           .done(function(id) {
              
            })
            .fail(function() {
              alert( "Failed to create purchase order");
            })
})

})
</script>
</html>