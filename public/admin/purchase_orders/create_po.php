<?php 
require_once('../../../private/initialize.php');
global $db;
$po_id = md5(uniqid(rand(), true));
$supplier_id = $_POST['supplier'] ?? '';
$store_id = $_POST['store'] ?? '';
$po_date = $_POST['po_date'] ?? '';
$delivery = $_POST['delivery'] ?? '';
$status = $_POST['status'] ?? '';
$additional_cost = $_POST['additional_cost'] ?? '';
$items = $_POST['itemRow'] ?? '';
$subtotal = 0;
settype($delivery, "string");
settype($po_date, "string");

foreach ($items as $value) {
$amount = $value["data"][3];
$subtotal += $amount;
}

$sql = "INSERT INTO purchase_orders ";
$sql .= "(purchase_order_id,supplier_id,store_id,order_date,
delivery_date,status,subtotal,additional_cost) ";
$sql .= "VALUES( ";
$sql .= "'" . db_escape($db, $po_id) . "',";
$sql .= "'" . db_escape($db, $supplier_id) . "',";
$sql .= "'" . db_escape($db, $store_id) . "',";
$sql .= "'" . db_escape($db, $po_date) . "',";
$sql .= "'" . db_escape($db, $delivery) . "',";
$sql .= "'" . db_escape($db, $status) . "',";
$sql .= "'" . db_escape($db, $subtotal) . "',";
$sql .= "'" . db_escape($db, $additional_cost) . "'";

$sql .= ")";
mysqli_query($db, $sql);

foreach ($items as $value) {
	$product = explode('-',preg_replace('/\s+/','',$value["data"][0]));
	$product_code = $product[0];
	$productName = $product[1];
	$cost = $value["data"][1];
	$quantity = $value["data"][2];
	$amount = $value["data"][3];
  $subtotal += $amount;

  $sql2 = "INSERT INTO po_products ";
  $sql2 .= "(po_id, product_code, cost, quantity, amount) ";
  $sql2 .= "VALUES (";
  $sql2 .= "'" . db_escape($db, $po_id ) . "',";
  $sql2 .= "'" . db_escape($db, $product_code) . "',";
  $sql2 .= "'" .  db_escape($db, $cost) . "',";
  $sql2 .= "'" .  db_escape($db, $quantity) . "',";
  $sql2 .= "'" . db_escape($db, $amount) . "'";
  $sql2 .= ")";
  $result2 = mysqli_query($db, $sql2);
}

echo $po_id;
 ?>