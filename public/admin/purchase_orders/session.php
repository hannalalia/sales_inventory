<?php require_once('../../../private/initialize.php');?>
<?php 
if(isset($_POST['errors'])){
    echo $_SESSION['errors'] = $_POST['errors'];
}

?>