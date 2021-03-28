<?php 
user_is_cashier();
require_login();
?>
</head>
<body> 
  <div id="wrapper" class="row m-auto">
      <nav class="sidebar bg-dark col-md-3 col-lg-2 col-12">
      <a id="menuToggleMd" class="d-md-none text-light float-right"><i data-feather="menu"></i></a>
        <li><a class="text-light" href="<?php echo url_for('/cashier/index.php')?>">Dashboard</a></li>
        <li><a class="text-light" href="#">POS Transaction</a></li>
        <li><a class="text-light" href="#">Stock Entry</a></li>
        <li><a class="text-light" href="<?php echo url_for('cashier/stock_adjustments/index.php')?>">Stock Adjustments</a></li>
        <li><a class="text-light" href="<?php echo url_for('cashier/critical_stocks/index.php')?>">Critical Stocks</a></li>
        <li><a class="text-light" href="#">Recommendation</a></li>    
         <li><a class="text-light" href="<?php echo url_for('/logout.php') ?>">Logout</a></li>
      </nav>
  <div class="content col-md-9 col-lg-10 col-12">
    <div class="bg-light">  
        <a href="" id="menuToggle" class="text-dark w-100"><i data-feather="menu"></i></a>
    </div>