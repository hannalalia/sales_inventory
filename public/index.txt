<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/feather-icons/dist/feather.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
	<link rel="stylesheet" href="admin/resources/css/main.css">
</head>
<?php include('../private/initialize.php'); ?>
<body> 
  <div id="wrapper" class="row m-auto">
      <nav class="sidebar bg-dark col-md-3 col-lg-2 col-12">
      <a id="menuToggleMd" class="d-md-none text-light float-right"><i data-feather="menu"></i></a>
        <li><a class="text-light" href="<?php echo url_for('/index.php')?>">Dashboard</a></li>
        <li><a class="text-light" href="<?php echo url_for('admin/suppliers/index.php')?>">Suppliers</a></li>
        <li><a class="text-light" href="<?php echo url_for('admin/categories/index.php')?>">Categories</a></li>
        <li><a class="text-light" href="<?php echo url_for('admin/brands/index.php')?>">Brands</a></li>
        <li><a class="text-light" href="<?php echo url_for('admin/products/index.php')?>">Products</a></li>
        <li><a class="text-light" href="<?php echo url_for('admin/critical_stocks/index.php')?>">Critical Stocks</a></li>
        <li><a class="text-light" href="<?php echo url_for('admin/purchase_orders/index.php')?>">Purchase Orders</a></li>
        <li><a class="text-light" href="<?php echo url_for('admin/stores/index.php')?>">Stores</a></li>
        <li><a class="text-light" href="#">Logout</a></li>
      </nav>

  <div class="content col-md-9 col-lg-10 col-12">
    <div class="bg-light">  
        <a href="" id="menuToggle" class="text-dark w-100"><i data-feather="menu"></i></a>
    </div>
        <h1>(dashboard contents...)</h1>
    </div>
</div>
</body>
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script>
      feather.replace()
    </script>
<script>
    $(document).ready(function() {
        $('.sidebar').toggle();
        $('.content').toggleClass('col-md-9');
        $('.content').toggleClass('col-lg-10');
    	$('#menuToggle').on('click', function(e) {
    		e.preventDefault();
    		$('.sidebar').toggle();
    		$('.content').toggleClass('col-md-9');
            $('.content').toggleClass('col-lg-10');
    	})
    	$('#menuToggleMd').on('click', function(e) {
    		e.preventDefault();
    		$('.sidebar').toggle();
            $('.content').toggleClass('col-md-9');
    		$('.content').toggleClass('col-lg-10');
    	})
    })
</script>