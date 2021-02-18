<?php require_once('../../private/initialize.php');?>
<?php
$company_name_list= find_all_company_name();


if(!isset($_POST['searchBtn']) && empty($_POST['categorySearch'])){
    $category_list = find_all_categories();
}else{
    $category_list = find_all_categories($_POST['categorySearch']);
}

$category_name_list = find_all_category_name();
?>
<?php require('../../private/shared/public_header.php');?>
<?php require('../../private/shared/public_navigation.php');?>

  	<div class="container">
 
     	<?php  echo display_session_errors(); ?>
        <?php echo display_session_message(); get_and_clear_session_errors();  ?>
      	<h2 class="my-3 col-sm-7 col-12 text-sm-left text-center">Purchase Orders</h2>
        <form method="post" class="col-sm-5 col-12 my-3">
            <div class="form-group row">
            <label for="status" class="col-sm-3 col-form-label">Status: </label>
            <select name="status" id="" class="form-control col-sm-6">
                <option value="">Pending</option>
                <option value="">Partially Received</option>
                <option value="">Fully Received</option>
            </select>
            </div>
            <div class="form-group row">
            <label for="supplier" class="col-sm-3 col-form-label">Supplier: </label>
            <select name="supplier" id="" class="form-control col-sm-6">
                 <?php if (mysqli_num_rows($company_name_list)>0){
            while($company= mysqli_fetch_assoc($company_name_list)) { ?>
                <option><?php echo h($company['CompanyName']);?></option>
            <?php }}?>
            </select>
            </div>
             <div class="form-group row">
            <label for="store" class="col-sm-3 col-form-label">Stores: </label>
            <select name="store" id="" class="form-control col-sm-6">
                <option value=""></option>
            </select>
            </div>
        </form>

    <table class="mx-auto table table-sm table-hover table-responsive-sm">
    	<thead class="thead-light">
    		<tr>
    			<th>Purchase Order #</th>
    			<th>Date</th>
	    		<th>Supplier</th>
	    		<th>Store</th>
	    		<th>Status</th>
                <th>Received</th>
                <th>Expected On</th>
                <th>Total Cost</th>
                <th>View</th>
    		</tr>
    		
    	</thead>
    	<tbody>
    	    <?php if (mysqli_num_rows($category_list)>0){

    	    	while($category = mysqli_fetch_assoc($category_list)) { ?>
    		<tr>

    			<td><?php echo h($category['Id']); ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
    			<td><a class="btn btn-sm bg-transparent text-secondary"  href="<?php echo url_for('purchase_orders/view.php')?>">
                    <i data-feather="eye"></i>
                </a></td>
    		</tr>
    		<?php }}else{ ?>
    			<tr><td colspan="7" align="center">No Records Found</td></tr>
    			
    		<?php }?>
    	</tbody>
    </table>
    <a class="btn btn-primary text-light mb-3" href="<?php echo url_for('purchase_orders/new.php')?>" >Create Purchase Order</a>
    </div>
<?php  get_and_clear_session_message();?>
<?php require('../../private/shared/public_footer.php');?>
<script type="text/javascript" src="<?php echo url_for('resources/js/populate_category.js')?>"></script>
</body>
</html>