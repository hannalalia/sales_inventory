<?php 
	//Suppliers
  function find_all_suppliers($options=[]) {
    global $db;

    $sql = "SELECT * FROM suppliers ";
    $sql .= "ORDER BY Id ASC";
    //echo $sql;
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
    //echo $sql;
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
    function find_all_categories($options=[]) {
    global $db;

    $sql = "SELECT * FROM categories ";
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
    $supplier = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $supplier; // returns an assoc. array
  }
  function find_category_by_name($name, $options=[]) {
    global $db;

    $sql = "SELECT * FROM categories ";
    $sql .= "WHERE CategoryName='" . db_escape($db, $name) . "' ";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $supplier = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $supplier; // returns an assoc. array
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

?>