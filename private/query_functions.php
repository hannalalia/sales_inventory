<?php 
	//Suppliers
  function find_all_suppliers($search = null,$options=[]) {
    global $db;

    $sql = "SELECT * FROM suppliers ";
    
    if(!empty($search)){
      $sql .= "WHERE CompanyName = '" . db_escape($db,$search) . "' ";
    }
    $sql .= "ORDER BY Id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_supplier_by_id($id, $options=[]) {
    global $db;

    $sql = "SELECT * FROM suppliers ";
    $sql .= "WHERE Id='" . db_escape($db, $id) . "' ";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $supplier = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $supplier; // returns an assoc. array
  }
  
  function find_all_company_name($options=[]) {
    global $db;

    $sql = "SELECT CompanyName FROM suppliers ";
    $sql .= "ORDER BY Id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }


 function validate_supplier($supplier) {
    $errors = [];

    // Company Name
    if(is_blank($supplier['CompanyName'])) {
      $errors[] = "Name cannot be blank.";
    } elseif(!has_length($supplier['CompanyName'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Name must be between 2 and 255 characters.";
    }
    //Address
    if(is_blank($supplier['Address'])) {
      $errors[] = "Address cannot be blank.";
    }
    //Email
    if(is_blank($supplier['Email'])) {
      $errors[] = "Email cannot be blank.";
    } elseif (!filter_var($supplier['Email'], FILTER_VALIDATE_EMAIL)) {
      $errors[] = "Email must be in a valid format.";
    }
    //Contact Number
    if(is_blank($supplier['ContactNumber'])) {
      $errors[] = "Contact number cannot be blank.";
    } elseif(!is_valid_mobile_number($supplier['ContactNumber'])) {
      $errors[] = "Contact number must be in a valid format.";
    } 

    return $errors;
  }

 function insert_supplier($supplier) {
    global $db;

    $errors = validate_supplier($supplier);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO suppliers ";
    $sql .= "(CompanyName, Address, ContactNumber, Email) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $supplier['CompanyName']) . "',";
    $sql .= "'" . db_escape($db, $supplier['Address']) . "',";
    $sql .= "'" . "+63" . db_escape($db, $supplier['ContactNumber']) . "',";
    $sql .= "'" . db_escape($db, $supplier['Email']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_supplier($supplier) {
    global $db;

    $errors = validate_supplier($supplier);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "UPDATE suppliers SET ";
    $sql .= "CompanyName='" . db_escape($db, $supplier['CompanyName']) . "', ";
    $sql .= "Address='" . db_escape($db, $supplier['Address']) . "', ";
    $sql .= "ContactNumber='" ."+63" .  db_escape($db, $supplier['ContactNumber']) . "', ";
    $sql .= "Email='" . db_escape($db, $supplier['Email']) . "' ";
    $sql .= "WHERE Id='" . db_escape($db, $supplier['Id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

   function delete_supplier($id) {
    global $db;

    $sql = "DELETE FROM suppliers ";
    $sql .= "WHERE Id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  //Categories
    function find_all_categories($search = null, $options=[]) {
    global $db;

    $sql = "SELECT * FROM categories ";
    if(!empty($search)){
      $sql .= "WHERE CategoryName = '" . db_escape($db,$search) . "' ";
    }
    $sql .= "ORDER BY Id ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

   function find_all_category_name($options=[]) {
    global $db;

    $sql = "SELECT CategoryName FROM categories ";
    $sql .= "ORDER BY Id ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }


  function find_category_by_id($id, $options=[]) {
    global $db;

    $sql = "SELECT * FROM categories ";
    $sql .= "WHERE Id='" . db_escape($db, $id) . "' ";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $category = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $category; // returns an assoc. array
  }
  function find_category_by_name($name, $options=[]) {
    global $db;

    $sql = "SELECT * FROM categories ";
    $sql .= "WHERE CategoryName='" . db_escape($db, $name) . "' ";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $category = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $category; // returns an assoc. array
  }

   function find_category_name_by_id($id, $options=[]) {
    global $db;

    $sql = "SELECT CategoryName FROM categories ";
    $sql .= "WHERE Id='" . db_escape($db, $id) . "' ";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    return $result; // returns an assoc. array
  }
  

  function validate_category($category) {
    $errors = [];

    // Category Name
    if(is_blank($category['CategoryName'])) {
      $errors[] = "Category Name cannot be blank.";
    }
    
    return $errors;
  }
 function insert_category($category) {
    global $db;

    $errors = validate_category($category);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO categories ";
    $sql .= "(CategoryName, Description) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $category['CategoryName']) . "',";
    $sql .= "'" . db_escape($db, $category['Description']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_category($category) {
    global $db;

    
    $errors = validate_category($category);
    if(!empty($errors)) {
      return $errors;
    }


    $sql = "UPDATE categories SET ";
    $sql .= "CategoryName='" . db_escape($db, $category['CategoryName']) . "', ";
    $sql .= "Description='" . db_escape($db, $category['Description']) . "' ";
    $sql .= "WHERE Id='" . db_escape($db, $category['Id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

   function delete_category($id) {
    global $db;

    $sql = "DELETE FROM categories ";
    $sql .= "WHERE Id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  //PRODUCTS
   function find_all_products($search = null,$options=[]) {
    global $db;

    $sql = "SELECT * FROM products ";
    
    if(!empty($search)){
      $sql .= "WHERE ItemName = '" . db_escape($db,$search) . "' ";
    }
    $sql .= "ORDER BY ItemName ASC";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }
 function find_product_by_pcode($pCode, $options=[]) {
    global $db;

    $sql = "SELECT * FROM products ";
    $sql .= "WHERE ProductCode='" . db_escape($db, $pCode) . "' ";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $product = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $product; // returns an assoc. array
  }
  function find_all_item_name($options=[]) {
    global $db;

    $sql = "SELECT ItemName FROM products ";
    $sql .= "ORDER BY ItemName ASC";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_all_critical($options=[]) {
    global $db;

    $sql = "SELECT * FROM products WHERE `Stocks` <= `Re-Order` ORDER BY Stocks DESC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

 function validate_product($product) {
    $errors = [];

    if(is_blank($product['ProductCode']) ||is_blank($product['ItemName']) || is_blank($product['CategoryId']) || is_blank($product['Stocks']) || is_blank($product['Re-Order']) ){
      $errors[] = 'Please complete all fields';
    }

    return $errors;
  }

 function insert_product($product) {
    global $db;

    $errors = validate_product($product);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO products ";
    $sql .= "(`ProductCode`,`ItemName`,`Description`,`Dimensions`,`CategoryId`,`Stocks`,`Re-Order`) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $product['ProductCode']) . "',";
    $sql .= "'" . db_escape($db, $product['ItemName']) . "',";
    $sql .= "'" . db_escape($db, $product['Description']) . "',";
    $sql .= "'" . db_escape($db, $product['Dimensions']) . "',";
    $sql .= db_escape($db, $product['CategoryId']) . ",";
    $sql .= db_escape($db, $product['Stocks']) . ",";
    $sql .=  db_escape($db, $product['Re-Order']);
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

   function update_product($product) {
    global $db;

    $errors = validate_product($product);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "UPDATE products SET ";
    $sql .= "`ItemName`='" . db_escape($db, $product['ItemName']) . "', ";
    $sql .= "`Description`='" . db_escape($db, $product['Description']) . "', ";
    $sql .= "`Dimensions`='" . db_escape($db, $product['Dimensions']) . "', ";
    $sql .= "`CategoryId`=" . db_escape($db, $product['CategoryId']) . ", ";
    $sql .= "`Stocks`=" . db_escape($db, $product['Stocks']) . ", ";
    $sql .= "`Re-Order`=" . db_escape($db, $product['Re-Order']) . " ";
    $sql .= "WHERE ProductCode='" . db_escape($db, $product['ProductCode']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo "<br>". $sql ."<br>";
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

  function delete_product($product_code) {
    global $db;

    $sql = "DELETE FROM products ";
    $sql .= "WHERE ProductCode='" . db_escape($db, $product_code) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  // Stores
   function find_all_stores($search = null,$options=[]) {
    global $db;

    $sql = "SELECT * FROM stores ";
    
    if(!empty($search)){
      $sql .= "WHERE Name = '" . db_escape($db,$search) . "' ";
    }
    $sql .= "ORDER BY Id ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_store_by_id($id, $options=[]) {
    global $db;

    $sql = "SELECT * FROM stores ";
    $sql .= "WHERE Id='" . db_escape($db, $id) . "' ";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $store = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $store; // returns an assoc. array
  }
  
  function find_all_store_name($options=[]) {
    global $db;

    $sql = "SELECT Name FROM stores ";
    $sql .= "ORDER BY Id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }


 function validate_store($store) {
    $errors = [];
    if(is_blank($store['Name'])){
      $errors[] = 'Store name cannot be blank';
    }
    return $errors;
  }

 function insert_store($store) {
    global $db;

    $errors = validate_store($store);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO stores ";
    $sql .= "(Name, Address) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $store['Name']) . "',";
    $sql .= "'" . db_escape($db, $store['Address']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_store($store) {
    global $db;

    $errors = validate_store($store);
    if(!empty($errors)) {
      return $errors;
    }
    $sql = "UPDATE stores SET ";
    $sql .= "Name='" . db_escape($db, $store['Name']) . "', ";
    $sql .= "Address='" . db_escape($db, $store['Address']) . "' ";  
    $sql .= "WHERE Id='" . db_escape($db, $store['Id']) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

   function delete_store($id) {
    global $db;

    $sql = "DELETE FROM stores ";
    $sql .= "WHERE Id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  //Purchase order
  function find_all_po($options=[]) {
    global $db;

    $sql = "SELECT * FROM purchase_orders ";   

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }
   function find_po_by_id($id, $options=[]) {
    global $db;

    $sql = "SELECT * FROM purchase_orders ";
    $sql .= "WHERE purchase_order_id='" . db_escape($db, $id) . "' ";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $po = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $po; // returns an assoc. array
  }

   function find_products_by_po_id($id, $options=[]) {
    global $db;

    $sql = "SELECT * FROM po_products ";
    $sql .= "WHERE po_id='" . db_escape($db, $id) . "' ";

    $result = mysqli_query($db, $sql);
    return $result; 
  }

  function update_items_in_po($product){
    global $db;


    $sql = "UPDATE po_products SET ";
    $sql .= "received = received +" . db_escape($db, $product['quantity']) . " ";
    $sql .= "WHERE po_id='" . db_escape($db, $product['po_id']) . "' ";
    $sql .= "AND product_code='" . db_escape($db, $product['product_code']) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/falses

    if($result) {
      //return true;
      return update_inventory_stocks($product['product_code'],$product['quantity']);
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }
function update_inventory_stocks($ProductCode,$quantity){
   global $db;


    $sql = "UPDATE products SET ";
    $sql .= "Stocks = Stocks +" . db_escape($db, $quantity) . " ";
    $sql .= "WHERE ProductCode='" . db_escape($db, $ProductCode) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/falses

    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

}

   function update_po_status($id, $message){
    global $db;


    $sql = "UPDATE purchase_orders SET ";
    $sql .= "status ='"  . db_escape($db, $message) . "' ";
    $sql .= "WHERE purchase_order_id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/falses

    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }
  function sums($id){
    global $db;
    $sql = "SELECT SUM(quantity) as sumQty,SUM(received) as sumQtyReceived FROM po_products ";
    $sql.= "WHERE po_id='" . db_escape($db, $id) . "' ";

     $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $po_sums = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $po_sums;
  }


?>