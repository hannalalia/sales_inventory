<?php require_once('../../private/initialize.php');?>
<?php 

if(!isset($_POST['searchBtn']) && empty($_POST['productSearch'])){
    $products_list = find_all_products();
}else{
    $products_list = find_all_products($_POST['productSearch']);
}

$item_name_list = find_all_item_name();


?>
<?php include('../../private/shared/public_header.php');?>
<?php include('../../private/shared/public_navigation.php');?>
<style type="text/css">
    tr,td,th{
    text-align: center !important;
}
</style>
  <body>
  	<div class="container mb-3">
   <div class="row mx-1">      
          <?php  echo display_session_errors(); ?>
          <?php echo display_session_message(); get_and_clear_session_errors();  ?>
        <h2 class="my-3 col-sm-7 col-12 text-sm-left text-center" id="title">List of Products</h2>
        <form method="post" class="col-sm-5 col-12 my-3">
            <div class="row">
            <input class="form-control col-sm-9 col-10" type="search" name="productSearch" placeholder="Item Name" list="items">
            <datalist id="items">
            <?php 
             if (mysqli_num_rows($item_name_list)>0){
             while($item = mysqli_fetch_assoc($item_name_list)) { ?>
                <option><?php echo h($item['ItemName']);?></option>
            // <?php }}
            ?>
            </datalist>
            <input class="btn btn-primary btn-sm col-sm-3 col-2" type="submit" name="searchBtn" value="Search">
            </div>
        </form>
    </div>
    <table class="mx-auto table table-sm table-hover table-responsive-sm" id="printTable">
    	<thead class="thead-light">
    		<tr>
    			<th>Product Code</th>
    			<th>Item Name</th>
	    		<th>Description</th>
                <th>Dimensions(l x w x h)</th>
                <th>Category</th>
	    		<th>Stock On Hand</th>
	    		<th>Re-Order Level</th>
	    		<th class="notPrintable">Edit</th>
	    		<th class="notPrintable">Delete</th>
    		</tr>
    		
    	</thead>
    	<tbody>
    	    <?php if (mysqli_num_rows($products_list)>0){

    	    	while($product = mysqli_fetch_assoc($products_list)) { ?>
    		<tr>
    			<td><?php echo h($product['ProductCode']); ?></td>
    			<td><?php echo h($product['ItemName']); ?></td>
    			<td><?php echo h($product['Description']); ?></td>
    			<td><?php echo h($product['Dimensions']); ?></td>
    			<td><?php echo h($product['CategoryId']); ?></td>
                <td><?php echo h($product['Stocks']); ?></td>
                <td><?php echo h($product['Re-Order']); ?></td>
	    		<td class="notPrintable"><a class="btn btn-sm bg-transparent text-danger editProduct" data-target="#editProductModal"><i data-feather="edit" width="22" heigth="22" ></i></a></td>
    			<td class="notPrintable"><a class="btn btn-sm bg-transparent text-danger deleteProduct" data-target="#deleteProductModal"><i data-feather="trash-2"></i></a></td>
    		</tr>
    		<?php }}else{ ?>
    			<tr class="notPrintable"><td colspan="9" align="center">No Records Found</td></tr>
    			
    		<?php }?>
    	</tbody>
    </table>
    <a class="btn btn-primary text-light" data-toggle="modal" data-target="#newProductModal">New Product</a>
    <button id="printBtn" class="btn btn-primary">Print</button>

    <!-- New Product Modal -->	
    <?php include('new.php');?>
	<!-- Edit Product Modal -->
	<?php include('edit.php');?>	
	<!-- Delete Product Modal -->
	<?php include('delete.php');?>	
    </div>
 </body>
<?php  //get_and_clear_session_message()?>
<?php include('../../private/shared/public_footer.php');?>
<script type="text/javascript" src="<?php echo url_for('resources/js/populate_product.js')?>"></script>
<script type="text/javascript" src="<?php echo url_for('resources/js/print.js')?>">
</script>
</html>