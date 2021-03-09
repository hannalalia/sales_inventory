</head>
<!--  <body class="row"  > -->
<body>
    
 <header>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
      <a class="navbar-brand" href="#">Company Logo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_sm">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar_sm">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="<?php echo url_for('index.php')?>">Home</a>
          <a class="nav-item nav-link" href="<?php echo url_for('suppliers/index.php')?>">Suppliers</a>
          <a class="nav-item nav-link" href="<?php echo url_for('categories/index.php')?>">Categories</a>
           <a class="nav-item nav-link" href="<?php echo url_for('products/index.php')?>">Products</a>
          <a class="nav-item nav-link" href="<?php echo url_for('critical_stocks/index.php')?>">Critical Stocks</a>
          <a class="nav-item nav-link" href="<?php echo url_for('purchase_orders/index.php')?>">Purchase Orders</a>
           <a class="nav-item nav-link" href="<?php echo url_for('stores/index.php')?>">Stores</a>
        </div>
      </div>
    </nav>
   <!--  <nav class="col-2 bg-dark d-flex flex-column" style="height: 100vh" >
      <a class=".text-decoration-none text-light m-2" href="<?php echo url_for('index.php')?>">Home</a>
      <a class=".text-decoration-none text-light m-2" href="<?php echo url_for('suppliers/index.php')?>">Suppliers</a>
      <a class=".text-decoration-none text-light m-2" href="<?php echo url_for('categories/index.php')?>">Categories</a>
      <a class=".text-decoration-none text-light m-2" href="<?php echo url_for('products/index.php')?>">Products</a>
      <a class=".text-decoration-none text-light m-2" href="<?php echo url_for('critical_stocks/index.php')?>">Critical Stocks</a>
      <a class=".text-decoration-none text-light m-2" href="<?php echo url_for('purchase_orders/index.php')?>">Purchase Orders</a>
      <a class=".text-decoration-none text-light m-2" href="<?php echo url_for('stores/index.php')?>">Stores</a>
    </nav> -->
</header>
<!-- <div class="col-10"> -->