<?php
require_once('../private/initialize.php');

log_out_user();
// or you could use
// $_SESSION['username'] = NULL;

redirect_to(url_for('/index.php'));

?>
