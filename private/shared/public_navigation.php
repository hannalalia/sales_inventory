</head>
<body> 
  <div id="wrapper" class="row m-auto">
      <nav class="sidebar bg-dark col-md-3 col-lg-2 col-12">
      <a id="menuToggleMd" class="d-md-none text-light float-right"><i data-feather="menu"></i></a>
        <li><a class="text-light" href="<?php echo url_for('/index.php')?>">Dashboard</a></li>
        <li><a class="text-light" href="<?php echo url_for('/admin/suppliers/index.php')?>">Suppliers</a></li>
        <li><a class="text-light" href="<?php echo url_for('/admin/categories/index.php')?>">Categories</a></li>
        <li><a class="text-light" href="<?php echo url_for('/admin/brands/index.php')?>">Brands</a></li>
        <li><a class="text-light" href="<?php echo url_for('/admin/products/index.php')?>">Products</a></li>
        <li><a class="text-light" href="<?php echo url_for('/admin/stock_adjustments/index.php')?>">Stock Adjustments</a></li>
        <li><a class="text-light" href="<?php echo url_for('/admin/critical_stocks/index.php')?>">Critical Stocks</a></li>
        <li><a class="text-light" href="<?php echo url_for('/admin/purchase_orders/index.php')?>">Purchase Orders</a></li>
        <li><a class="text-light" href="<?php echo url_for('/admin/stores/index.php')?>">Stores</a></li>
        <li><a class="text-light" href="#">Logout</a></li>
      </nav>

  <div class="content col-md-9 col-lg-10 col-12">
    <div class="bg-light">  
        <a href="" id="menuToggle" class="text-dark w-100"><i data-feather="menu"></i></a>
    </div>