</head>
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