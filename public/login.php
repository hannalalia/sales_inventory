<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/feather-icons/dist/feather.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&display=swap" rel="stylesheet">
    <style>
      body{
      background: radial-gradient(circle, rgba(77,208,225,1) 0%, rgba(148,187,233,1) 100%);
      font-family: 'Open Sans', sans-serif;
      }
      .row{
        border-radius: .5rem;
        overflow:hidden;

      }
      a{
        font-size: .90rem;
      }
    </style>
</head>
<?php
require_once('../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  if(is_blank($username)){
    $errors[] = "Username cannot be blank";
  }
  if(is_blank($password)){
    $errors[] = "Password cannot be blank";
  }
  if(empty($errors)){

    $admin = find_admin_by_username($username);
       $login_failure_msg = "Log in was unsuccessful.";

    if($admin){

        if(password_verify($password, $admin['hashed_password'])){
            //password matches
          log_in_admin($admin);
          redirect_to(url_for('/admin/index.php'));
        }
        else{
          //username found but password does not match
          $errors[] = $login_failure_msg;

        }
    }
    
    else {
    //no username found
      $errors[] = $login_failure_msg;
    }
  }
}

?>
<body> 
<div id="content" class="mt-5 p-3">
<!--   <?php //echo display_errors($errors); ?> -->
  <div class="row  w-75  mx-auto">
    <div class="col-6 bg-light p-5 d-md-block d-none">
      <img src="admin/resources/images/logoInverted.png" class="d-block mx-auto w-25" alt="">
      <img src="admin/resources/images/login.svg" class="img-fluid" alt="">
    </div>
    <form action="login.php" method="post" class="col-md-6 col-12 p-5 bg-dark" id="loginForm">
      <div class="form-group">
        <h1 class="text-center text-light">Log in</h1>
        <label class="text-light" for="">Username:</label>
        <input type="text" class="form-control" name="username" value="<?php echo h($username); ?>" >
      </div>
     <div class="form-group">
       <label class="text-light" for="">Password:</label>
      <input type="password" class="form-control" name="password" value="" /><br />
     </div>
      <input type="submit"  class="btn btn-info w-100" name="submit" value="Submit" >
      <br/> <br>
      <a href="" class="text-light text-center d-block">Forgot password</a>
    </form>
</div>
  

</div>

</body>
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
      feather.replace()
    </script>