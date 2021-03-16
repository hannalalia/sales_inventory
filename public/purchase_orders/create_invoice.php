<?php require_once('../../private/initialize.php');?>
<?php

$id = $_GET['id'];
$po = find_po_by_id($id);
$product_list = find_products_by_po_id($id);

?>
<?php require('../../private/shared/public_header.php');?>
<?php require('../../private/shared/public_navigation.php');?>
<div class="container ">
	<div class="m-3 border border-secondary w-75"  id="printInvoice">
		<div class="d-flex justify-content-between align-items-center">		
			<h4 class="m-3 ">Jars Cellular Phones and Accessories</h4>
			<img class="img-fluid rounded mr-2" style="width: 5%; height: 5%" src="<?php echo url_for('resources/images/logo.jpg')?>"  alt="">

		</div>
			<hr width="100%">
		<div class="px-3">
			<div class="d-flex flex-md-row flex-column justify-content-between">
				<dl>
					<dt>Purchase Order #:</dt>
					<dd style="word-wrap: break-word"><?php echo $id?></dd>
				</dl>
				<dl>
					<dt>Order Date:</dt>
					<dd><?php echo $po['order_date']?></dd>
				</dl>
				<dl>
					<dt>Due Date:</dt>
					<dd><?php echo $po['delivery_date']?></dd>
				</dl>
				<dl>
					<dt>Received Date:</dt>
					<dd><?php echo $po['received_on']?></dd>
				</dl>				
			</div>
		<div class="d-flex flex-sm-row flex-column  justify-content-between">
			<dl>
				<dt>Supplier:</dt>
				<dd>Name: <?php $supplier = find_supplier_by_id($po['supplier_id']);
                 echo $supplier['CompanyName'];?></dd>	
                 <dd>Address: <?php echo $supplier['Address'];?></dd>
                <dd>Contact Number: <?php echo $supplier['ContactNumber'];?></dd>			
			</dl>
			<dl class="mx-2">
				<dt>Shipped to:</dt>
				<dd>Store: <?php $store = find_store_by_id($po['store_id']);
                 echo $store['Name'];?></dd>	
                 <dd>Address: <?php echo $store['Address'];?></dd>
                <dd>Contact Number: <?php echo $store['ContactNumber'];?></dd>
			</dl>
			</div>
		<table class="mx-auto table table-sm table-responsive-md ">
			<thead class="thead-light">
				<tr>
					<th>Product Code</th>
					<th>Item Name</th>
					<th>Description</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total</th>
				</tr>
			
			</thead>
			<tbody>
				<?php
				if(mysqli_num_rows($product_list)>0){
					$subtotal = 0;
				 	while($products=mysqli_fetch_assoc($product_list)){
				 		// $subtotal += $products['cost'] * $products['received'];
				 		?>
				 <tr>
				 	<td><?php echo $products['product_code'];?></td>
				 	<td><?php $item = find_product_by_pcode($products['product_code']);
                 echo $item['ItemName'];?></td>
                 	<td><?php echo $item['Description'];?></td>
				 	<td><?php echo $products['cost'];?></td>
				 	<td><?php echo $products['received'];?></td>
				 	<td><?php echo $products['cost'] * $products['received'];?></td>
				 </tr>

				<?php }} ?>
			</tbody>
		</table>
		<table class="my-5 table table-sm table-bordered w-25">
			<tr>
				<td>Subtotal: </td>
				<td class="text-center"><?php echo $po['actual_po_total'] - $po['additional_cost']?></td>
			</tr>
			<tr>
				<td>Additional Cost: </td>
				<td class="text-center"><?php echo $po['additional_cost'] + ($po['supplier_total']-$po['actual_po_total']);?></td>
			</tr>
			<tr>
				<td>Total: </td>
				<td class="text-center"><?php echo $po['supplier_total'];?></td>
			</tr>
		</table>
		<div style="" class="d-flex justify-content-between">
			<!-- <hr> -->
			<p class="text-center" style="border-top: 1px solid grey; width: 25%">Authorized Signature</p>
			<p class="text-center" style="border-top: 1px solid grey; width: 25%">Date</p>
		</div>
		</div>
		
	</div>
    <a class="btn btn-info text-light m-2" href="<?php echo url_for('purchase_orders/po_recon.php')?>" >Back</a>
    <button id="printInvoiceBtn" class="btn btn-info">Print</button>
</div>
<?php require('../../private/shared/public_footer.php');?>
<script>
$('#printInvoiceBtn').on('click', function() {
	let printContainer =document.createElement("div");
	let receiptToPrint = $("#printInvoice").clone().appendTo(printContainer);
	$(printContainer).find(".notPrintable").remove();
	$(printContainer).removeClass('w-75');
	$(printContainer).css('width', '900px');
	newWin= window.open("",'_blank');
	newWin.document.open();
	newWin.document.write('<html><body>');
	newWin.document.write(`    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
	`);
	newWin.document.write(printContainer.outerHTML);
	newWin.document.write('</html></body>');
	newWin.focus(); 
	newWin.print();
	newWin.close(); 
})

</script>
