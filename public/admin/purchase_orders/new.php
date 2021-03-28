<?php require_once('../../../private/initialize.php');?>
<?php 
$supplier_list= find_all_suppliers();
$product_list = find_all_products();
$store_list=find_all_stores();

?>
<?php require('../../../private/shared/public_header.php');?>
<?php require('../../../private/shared/public_navigation.php');?>
  <div class="container">
  <p class="my-3 col-sm-7 col-12 text-sm-left text-center"><a  class="text-secondary"href="<?php echo url_for('admin/purchase_orders/index.php')?>">Purchase Orders</a> \ Create Purchase Orders</p>
  <h2 class="my-3 col-sm-7 col-12 text-sm-left text-center">Create Purchase Orders</h2>
  <?php echo display_session_errors(); ?>
  <?php echo display_session_message(); get_and_clear_session_errors();  ?> 
    <form method="post" action="" id="po_form">
    <div class="form-group row">
        <label for="supplier" class="col-sm-2 col-form-label">Supplier: </label>
        <select id="supplier" class="form-control col-sm-6">
        <?php if (mysqli_num_rows($supplier_list)>0){
                 while($supplier= mysqli_fetch_assoc($supplier_list)) { ?>
                    <option value="<?php echo h($supplier['Id']); ?>"><?php echo h($supplier['CompanyName']);?></option>
            <?php }}?>
        </select>
    </div>
    <div class="form-group row">
      <label for="store" class="col-sm-2 col-form-label">Stores: </label>
      <select  id="store" class="form-control col-sm-6">
           <?php if (mysqli_num_rows($store_list)>0){
                 while($store= mysqli_fetch_assoc($store_list)) { ?>
                    <option value="<?php echo h($store['Id']); ?>"><?php echo h($store['Name']);?></option>
            <?php }}?>
      </select>
    </div>
    <div class="form-group row">
      <label for="po_date" class="col-sm-2 col-form-label">Purchase Order Date: </label>
      <input type="date"  id="po_date" class="form-control col-sm-6" required>
    </div>
    <div class="form-group row">
      <label for="delivery_date" class="col-sm-2 col-form-label">Expected Delivery: </label>
      <input type="date"  id="delivery_date" class="form-control col-sm-6" required>
    </div>
    <div class="form-group row">
        <label for="additional_cost" class="col-sm-2 col-form-label">Additional Cost: </label>
        <input type="text" class="form-control col-sm-6" id="additional_cost" required>
    </div>
    
    <table class="mx-auto table table-sm table-hover table-responsive-md text-center">
      <thead class="thead-light">
        <tr>
          <th>Item</th>
          <th>Purchase Cost</th>
          <th>Quantity</th>
          <th>Amount</th>
          <th></th>
        </tr>
        
      </thead>
      <tbody id="po_table">
      </tbody>
    </table>
     <label for="product"></label>
    <div class="row m-3">
    <select  id="select_product" class="form-control col-sm-4">
      <?php if (mysqli_num_rows($product_list)>0){
                 while($product= mysqli_fetch_assoc($product_list)) { ?>
                    <option value="<?php echo h($product['ProductCode']); ?>"><?php echo h($product['ItemName']);?></option>
            <?php }}?>
    </select>
    <input type="text" id="cost" class="form-control col-sm-3" placeholder="Purchase cost">
    <input type="number" id="qty" class="form-control col-sm-3" placeholder="Quantity" >
  
   <button id="addItem" class="btn btn-info text-light">Add Item</button>  </div>
    <input class="btn btn-info text-light mb-3 mr-2" id="create" type="submit" value="Create">
    </form>
  </div>

<?php // get_and_clear_session_message();?>
<?php require('../../../private/shared/public_footer.php');?>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
  // $.ajax({   
  //         type: "GET",
  //         url: "get_products.php",             
  //         dataType: "html",               
  //         success: function(response){ 
  //           $('#select_product').html(response);
  //         }
  //       });

  $('#addItem').on('click', function(e){
    e.preventDefault();
    let productId = $(this).siblings('#select_product').val();
    let productName = $(this).siblings('#select_product').find('option:selected').text();
    let cost = $(this).siblings('#cost').val();
    let qty = $(this).siblings('#qty').val();
    let amount = cost* qty;
    if(productId && cost!='' && qty!='' && amount!=''){

    let output = `<tr name='row'>
      <td>${productId} - ${productName}</td>
      <td>${cost}</td>
      <td>${qty}</td>
      <td>${amount}</td>
      <td><input id='removeRow'type='submit' class='btn btn-sm bg-transparent' value='x'></td>
    </tr>`;
    $('#po_table').append(output);
    }
    else{
      alert('Please complete all fields before adding item');
    }
    });

  $('#removeRow').on('click', function(e){
    e.preventDefault();
    $(this).parent('tr').remove();
  })

  $('#create').on('click', function(e){
    e.preventDefault();
    let supplier = $('#supplier').val();
    let store = $('#store').val();
    let po_date = $('#po_date').val();
    let delivery = $('#delivery_date').val();
    let additional_cost = $('#additional_cost').val();
    let status = 'Pending';
    let itemRow = [];

    $("#po_table tr").each(function(){
      let data =[];
      $(this).find("td").each(function(index, element){
        if(index!=4){
        data.push($(this).text());}
      })
      itemRow.push({data});
    })
    let jsonItemRow = JSON.stringify(itemRow);


    if($("#po_table tr").length > 0 ){
      $('#po_form').validate({
       errorPlacement: function(error,element) {
          return true;
        }
      });
      if ($('#delivery_date').valid() &&  $('#po_date').valid()){
          $.post( "create_po.php", {supplier,store,po_date,delivery,status,additional_cost,itemRow} )
           .done(function(id) {
              // alert( "Purchase order created" );           
              location.href = 'view.php?id='+ id;
            })
            .fail(function() {
              alert( "Failed to create purchase order");
            })
     }else{
       $.post( "session.php", {"errors": 'Please complete all fields.' } )
           .done(function(error) {   
              location.reload();                 
            })
      // alert('Please complete all fields.');
      }
    }else{
       $.post("session.php", {"errors": 'There must be atleast one item in the table.' } )
           .done(function(error) {     
              location.reload();                 
            })

    }
    
  });
})

</script>
</html>