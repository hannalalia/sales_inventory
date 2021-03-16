<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
	<link rel="stylesheet" href="resources/css/main.css">
</head>
<?php include('../private/initialize.php'); ?>
<body> 
  <div id="wrapper" class="row m-auto">
      <nav class="sidebar bg-dark col-md-3 col-lg-2 col-12">
      <a id="menuToggleMd" class="d-md-none text-light float-right"><i data-feather="menu"></i></a>
        <li><a class="text-light" href="<?php echo url_for('/index.php')?>">Home</a></li>
        <li><a class="text-light" href="<?php echo url_for('suppliers/index.php')?>">Suppliers</a></li>
        <li><a class="text-light" href="<?php echo url_for('categories/index.php')?>">Categories</a></li>
        <li><a class="text-light" href="<?php echo url_for('products/index.php')?>">Products</a></li>
        <li><a class="text-light" href="<?php echo url_for('critical_stocks/index.php')?>">Critical Stocks</a></li>
        <li><a class="text-light" href="<?php echo url_for('purchase_orders/index.php')?>">Purchase Orders</a></li>
        <li><a class="text-light" href="<?php echo url_for('stores/index.php')?>">Stores</a></li>
      </nav>

  <div class="content col-md-9 col-lg-10 col-12">
    <div class="bg-light">  
        <a href="" id="menuToggle" class="text-dark w-100"><i data-feather="menu"></i></a>
    </div>

    </div>
</div>
</body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script>
      feather.replace()
    </script>
    <script>
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
    </script>