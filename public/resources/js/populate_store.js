$(".editStore").on('click',function(){

			$('#editStoreModal').modal('show');

				let $tr = $(this).closest('tr');

				let data = $tr.children("td").map(function(){
					return $(this).text();
				}).get();
			    // let newContactNumber = data[3].replace(/^\+63/,'')

			    $('#Id').val(data[0]);
				$('#Name').val(data[1]);
				$('#Address').val(data[2]);
				// $('#ContactNumber').val(newContactNumber);
				// $('#POS').val(data[4]);
		});

		$(".deleteStore").on('click',function(){
			$('#deleteStoreModal').modal('show');
				let $tr = $(this).closest('tr');

				let data = $tr.children("td").map(function(){
					return $(this).text();
				}).get();
				$('#IdDel').text(data[0]);
				$('#IdDelInp').val(data[0]);
				$('#NameDel').text(data[1]);
				$('#AddressDel').text(data[2]);
				// $('#ContactNumberDel').text(data[3]);
				// $('#POSDel').text(data[4]);
		});