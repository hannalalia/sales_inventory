<?php 
require_once('../../../private/initialize.php');
$product_list = find_all_products();
$output = '';
 if (mysqli_num_rows($product_list)>0){
    while($item= mysqli_fetch_assoc($product_list )) { 
    $output .= 	"<option value=";
    $output .=  $item['ProductCode'];
    $output .= ">";
    $output .= $item['ItemName'];
    $output .="</option>";
 }}
echo $output;

?>