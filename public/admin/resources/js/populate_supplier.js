$(".editSupplier").on('click',function(){

			$('#editSupplierModal').modal('show');

				let $tr = $(this).closest('tr');

				let data = $tr.children("td").map(function(){
					return $(this).text();
				}).get();
			    let newContactNumber = data[3].replace(/^\+63/,'')


				$('#Id').val(data[0]);
				$('#CompanyName').val(data[1]);
				$('#Address').val(data[2]);
				$('#ContactNumber').val(newContactNumber);
				$('#Email').val(data[4]);
		});

		$(".deleteSupplier").on('click',function(){

			$('#deleteSupplierModal').modal('show');

				let $tr = $(this).closest('tr');

				let data = $tr.children("td").map(function(){
					return $(this).text();
				}).get();
				$('#IdDel').text(data[0]);
				$('#IdDelInp').val(data[0]);
				$('#CompanyNameDel').text(data[1]);
				$('#AddressDel').text(data[2]);
				$('#ContactNumberDel').text(data[3]);
				$('#EmailDel').text(data[4]);
		});