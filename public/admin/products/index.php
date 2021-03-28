<?php require_once('../../../private/initialize.php');?>
<?php 

$products_list = find_all_products();

?>
<?php include('../../../private/shared/public_header.php');?>
<?php include('../../../private/shared/public_navigation.php');?>
<style type="text/css">
    tr,td,th{
    text-align: center !important;
}
</style>
  <body>
  	<div class="container mb-3">
<!--    <div class="row mx-1">   -->    
          <?php  echo display_session_errors(); ?>
          <?php echo display_session_message(); get_and_clear_session_errors();  ?>
        <h2 class="my-3 text-center" id="title">List of Products</h2>
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
	    		<th>Re-Order Level</th>
	    		<th class="notPrintable">Edit</th>
	    		<th class="notPrintable">Delete</th>
    		</tr>
    		
    	</thead>
    	<tbody>
    	    <?php if (mysqli_num_rows($products_list)>0){

    	    	while($product = mysqli_fetch_assoc($products_list)) { 
                    $category=find_category_by_id($product['CategoryId']);
                    $brand=find_brand_by_id($product['BrandId']);
                   
                    ?>

    		<tr>
    			<td><?php echo h($product['ProductCode']); ?></td>
    			<td><?php echo h($product['ItemName']); ?></td>
    			<td><?php echo h($product['Description']); ?></td>
                <td><?php echo h($category['CategoryName']);?></td>
                <td><?php echo h($brand['BrandName']); ?></td>
    			<td><?php echo h($product['SellingPrice']); ?></td>
                <td><?php echo h($product['Stocks']); ?></td>
                <td><?php echo h($product['Re-Order']); ?></td>
	    		<td class="notPrintable"><a class="btn btn-sm bg-transparent text-danger editProduct" data-target="#editProductModal"><i data-feather="edit" width="22" heigth="22" ></i></a></td>
    			<td class="notPrintable"><a class="btn btn-sm bg-transparent text-danger deleteProduct" data-target="#deleteProductModal"><i data-feather="trash-2"></i></a></td>
    		</tr>
    		<?php }}else{ ?>
    			<tr class="notPrintable"><td colspan="10" align="center">No Records Found</td></tr>
    			
    		<?php }?>
    	</tbody>
    </table>
    <a class="btn btn-info text-light m-2" data-toggle="modal" data-target="#newProductModal">New Product</a>
    <button id="printBtn" class="btn btn-info m-2">Print</button>

    <!-- New Product Modal -->	
    <?php include('new.php');?>
	<!-- Edit Product Modal -->
	<?php include('edit.php');?>	
	<!-- Delete Product Modal -->
	<?php include('delete.php');?>	
    </div>
 </body>
<?php  //get_and_clear_session_message()?>
<?php include('../../../private/shared/public_footer.php');?>
<script src="<?php echo url_for('admin/resources/js/populate_product.js')?>"></script>
<script src="<?php echo url_for('admin/resources/js/print.js')?>">
</script>
<script >
$(document).ready( function () {

    $('#printTable').DataTable({
        "order": [1,"asc"],
        "columnDefs": [{
            "targets": [0,2],
             "orderable":false
        },
        {
            "targets": [2,5,6,7],
            "searchable": false 
        }]
    });

});
</script>
</html>