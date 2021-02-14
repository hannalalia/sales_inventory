</head>
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
          <a class="nav-item nav-link" href="<?php echo url_for('critical_stocks/index.php')?>">Critical Stocks</a>
        </div>
      </div>
    </nav>
</header>