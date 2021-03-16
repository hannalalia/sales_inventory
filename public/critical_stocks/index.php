<?php require_once('../../private/initialize.php');?>
<?php 
$critical_list = find_all_critical();

?>
<?php include('../../private/shared/public_header.php');?>
<style type="text/css">
    tr,td,th{
    text-align: center !important;
}
</style>
<?php include('../../private/shared/public_navigation.php');?>

  	<div class="container">
     	<?php echo display_session_message(); ?>
      	<h2 class="my-3 text-center" id="title">List of Critical Stocks</h2>
    <form method="get"  action="<?php echo url_for('purchase_orders/new.php')?>" -->
    <table class="mx-auto table table-sm table-hover table-responsive-lg" id="printTable">
    	<thead class="thead-light">
    		<tr>
    			<th>Product Code</th>
    			<th>Item Name</th>
                <th>Description</th>
	    		<th>Category</th>
                <th>Price</th>
	    		<th>Stock On Hand</th>
	    		<th>Re-Order</th>
                <th class="notPrintable">Purchase</th>
    		</tr>	
    	</thead>
    	<tbody>
             <?php if (mysqli_num_rows($critical_list)>0){

                while($critical = mysqli_fetch_assoc($critical_list)) {

                     $category=find_category_by_id($critical['CategoryId']);

                 ?>
            <tr>

                <td><?php echo h($critical['ProductCode']); ?></td>
                <td><?php echo h($critical['ItemName']); ?></td>
                <td><?php echo h($critical['Description']); ?></td>
                <td><?php echo h($category['CategoryName']); ?></td>
                <td><?php echo h($critical['SellingPrice']); ?></td>
                <td><?php echo h($critical['Stocks']); ?></td>
                <td><?php echo h($critical['Re-Order']); ?></td>
                <td class="notPrintable">
                <input type="checkbox" name="ProductCode[]" value="<?php  echo $critical['ProductCode'];?>">
                </td>
            </tr>
            <?php }}else{ ?>
                <tr><td colspan="7" align="center">No Records Found</td></tr>
                
            <?php }?>
    	</tbody>
    </table>
    <input type="submit" class="btn btn-info m-2" value="Purchase">
    <button id="printBtn" class="btn btn-info m-2">Print</button>
    </form> 
</body>
<?php include('../../private/shared/public_footer.php');?>
<script type="text/javascript" src="<?php echo url_for('resources/js/print.js')?>">
</script>
<script >
$(document).ready( function () {
    $('#printTable').DataTable({
        "order": [1,"desc"],
        "columnDefs": [{
            "targets": [0,2,3,7],
             "orderable":false
        },
        {
            "targets": [2],
            "searchable":false
        }]
    });
} );
</script>
</html>