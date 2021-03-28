<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../../node_modules/feather-icons/dist/feather.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <link rel="stylesheet" href="resources/css/main.css">
</head>
<?php include('../../private/initialize.php'); ?>
<?php include('../../private/shared/staff_navigation.php');?>
        <h1>(dashboard contents...)</h1>
    </div>
</div>
</body>
    <script src="../../node_modules/jquery/dist/jquery.js"></script>
    <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
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