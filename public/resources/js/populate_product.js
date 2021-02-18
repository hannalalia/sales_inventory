$(".editProduct").on('click',function(){

			$('#editProductModal').modal('show');

				let $tr = $(this).closest('tr');

				let data = $tr.children("td").map(function(){
					return $(this).text();
				}).get();

				let dimensions = data[3].split('x');
				let length = dimensions[0].trim();
				let width = dimensions[1].trim();
				let height= dimensions[2].trim();

				$('#ProductCode').val(data[0]);
				$('#ItemName').val(data[1]);
				$('#Description').val(data[2]);
				$('#Length').val(length);
				$('#Width').val(width);
				$('#Height').val(height);
				$('#Category').val(data[4]);
				$('#Stocks').val(data[5]);
				$('#Re-Order').val(data[6]);
		});

		$(".deleteProduct").on('click',function(){

			$('#deleteProductModal').modal('show');

				let $tr = $(this).closest('tr');

				let data = $tr.children("td").map(function(){
					return $(this).text();
				}).get();
				$('#ProductCodeDelInp').val(data[0]);
				$('#ProductCodeDel').text(data[0]);
				$('#ItemNameDelInp').text(data[1]);
				$('#ItemNameDel').text(data[1]);
				$('#DescriptionDel').text(data[2]);
				$('#DimensionsDel').text(data[3]);
				$('#CategoryDel').text(data[4]);
				$('#StocksDel').text(data[5]);
		});