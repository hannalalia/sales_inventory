<?php 
require_once('../../private/initialize.php');
global $db;



$po_id = $_POST['purchase_order_id'] ?? '';
$supplier_id = $_POST['supplier_id'] ?? '';
$store_id = $_POST['store_id'] ?? '';
$po_date = $_POST['order_date'] ?? '';
$delivery = $_POST['delivery_date'] ?? '';
$status = $_POST['status'] ?? '';
$subtotal = $_POST['subtotal'] ?? '';
$additional_cost = $_POST['additional_cost'] ?? '';
$received_on = $_POST['received_on'] ?? '';
$actual_po_total = $_POST['actual_po_total'] ?? '';
$supplier_total = $_POST['supplier_total'] ?? '';



$sql = "INSERT INTO po_history ";
$sql .= "(purchase_order_id,supplier_id,store_id,order_date,delivery_date,status,subtotal,additional_cost,received_on,actual_po_total,supplier_total) ";
$sql .= "VALUES( ";
$sql .= "'" . db_escape($db, $po_id) . "',";
$sql .= "'" . db_escape($db, $supplier_id) . "',";
$sql .= "'" . db_escape($db, $store_id) . "',";
$sql .= "'" . db_escape($db, $po_date) . "',";
$sql .= "'" . db_escape($db, $delivery) . "',";
$sql .= "'" . db_escape($db, $status) . "',";
$sql .= "'" . db_escape($db, $subtotal) . "',";
$sql .= "'" . db_escape($db, $additional_cost) . "',";
$sql .= "'" . db_escape($db, $received_on) . "',";
$sql .= "'" . db_escape($db, $actual_po_total) . "',";
$sql .= "'" . db_escape($db, $supplier_total) . "'";
$sql .= ");";

// $sql = "DELETE FROM purchase_orders ";
// $sql .= "WHERE purchase_order_id='" . db_escape($db, $po_id) . "' ";
// $sql .= "LIMIT 1;";
$result = mysqli_query($db, $sql);

$sql2 = "DELETE FROM po_products ";
$sql2 .= "WHERE po_id='" . db_escape($db, $po_id) . "' ";

$result2 = mysqli_query($db, $sql2);

$sql3 = "DELETE FROM purchase_orders ";
$sql3 .= "WHERE purchase_order_id='" . db_escape($db, $po_id) . "' ";
$sql3 .= "LIMIT 1;";

$result3 = mysqli_query($db, $sql3);

if($result3) {
      echo $_SESSION['message'] = 'Purchase Order was successfully added to Purchase Order History';
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
}



//prone to sql injection using prepared statements is better
// $result = mysqli_multi_query($mysqli, $query);

// if ($result) {
//     do {
//         if (($result = mysqli_store_result($mysqli)) === false && mysqli_error($mysqli) != '') {
//             echo "Query failed: " . mysqli_error($mysqli);
//         }
//     } while (mysqli_more_results($mysqli) && mysqli_next_result($mysqli)); // while there are more results
// } else {
//     echo "First query failed..." . mysqli_error($mysqli);
// }


?>