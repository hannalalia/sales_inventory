<?php require_once('../../private/initialize.php');?>
<?php $category_list = find_all_categories();
$category_name_list = find_all_category_name();
?>
<?php include('../../private/shared/public_header.php');?>
<?php include('../../private/shared/public_navigation.php');?>
<style type="text/css">
    tr,td,th{
    text-align: center !important;
}
</style>
  	<div class="container">
    <div class="row mx-1">      
     	<?php echo display_session_message(); ?>
      	<h2 class="my-3 col-sm-7 col-12 text-sm-left text-center" id="title">List of Critical Stocks</h2>
        <form method="post" class="col-sm-5 col-12 my-3">
            <div class="row">
            <input class="form-control col-sm-9 col-10" type="search" name="itemSearch" placeholder="By: Item Name/Product Code/Category" list="item">
            <datalist id="categories">
            <?php if (mysqli_num_rows($category_name_list)>0){
            while($categoryName= mysqli_fetch_assoc($category_name_list)) { ?>
                <option><?php echo h($categoryName['CategoryName']);?></option>
            <?php }}?>
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
                <th>Brand</th>
	    		<th>Category</th>
	    		<th>Stock On Hand</th>
	    		<th>Re-Order</th>
                <th class="notPrintable">Purchase</th>
    		</tr>	
    	</thead>
    	<tbody>
    	    <tr>
                <td>123ABC</td>
                <td>Dell inspiron </td>
                <td>Description</td>
                <td>Brand</td>
                <td>Laptop</td>
                <td>12</td>
                <td>12</td>
                <td class="notPrintable"><a href="#" class="btn btn-primary btn-sm">Purchase</a></td>
            </tr>
    	</tbody>
    </table>
    <button id="printBtn" class="btn btn-primary">Print</button>
</body>
<?php include('../../private/shared/public_footer.php');?>
<script type="text/javascript" src="<?php echo url_for('resources/js/print.js')?>">
</script>
</html>