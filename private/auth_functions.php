<?php

  // Performs all actions necessary to log in an admin
  function log_in_user($user) {
  // Renerating the ID protects the admin from session fixation.
    session_regenerate_id();
    // $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['last_login'] = time();
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role_id'];
    return true;
  }
  
// Performs all actions necessary to log out an admin
function log_out_user() {
  // unset($_SESSION['admin_id']);
  unset($_SESSION['last_login']);
  unset($_SESSION['username']);
  unset($_SESSION['role']);
  // session_destroy(); // optional: destroys the whole session
  return true;
}

  // is_logged_in() contains all the logic for determining if a
// request should be considered a "logged in" request or not.
// It is the core of require_login() but it can also be called
// on its own in other contexts (e.g. display one link if an admin
// is logged in and display another link if they are not)
function is_logged_in() {
  // Having a admin_id in the session serves a dual-purpose:
  // - Its presence indicates the admin is logged in.
  // - Its value tells which admin for looking up their record.
  // return isset($_SESSION['admin_id']);
  return isset($_SESSION['username']);
}

// Call require_login() at the top of any page which needs to
// require a valid login before granting acccess to the page.
function require_login() {
  if(!is_logged_in()) {
    redirect_to(url_for('/index.php'));
  } else {
    // Do nothing, let the rest of the page proceed
  }
}

function user_is_admin(){
  $role = $_SESSION['role'];
  if($role != 3){
     return log_out_user();
  }
}

function user_is_cashier(){
  $role = $_SESSION['role'];
  if($role != 4){
    return log_out_user();
  }
}



?>
