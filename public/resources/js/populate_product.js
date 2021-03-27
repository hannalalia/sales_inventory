$(".editProduct").on('click',function(){

			$('#editProductModal').modal('show');

				let $tr = $(this).closest('tr');

				let data = $tr.children("td").map(function(){
					return $(this).text();
				}).get();

				$('#ProductCode').val(data[0]);
				$('#ItemName').val(data[1]);
				$('#Description').val(data[2]);
				$("#Category option:contains(" + data[3]+ ")").attr('selected', 'selected');
				$("#Brand").val(data[4])
				$("#SellingPrice").val(data[5])
				$('#Stocks').val(data[6]);
				$('#Re-Order').val(data[7]);
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
				$('#CategoryDel').text(data[3]);
				$('#BrandDel').text(data[4]);
				$('#SellingPriceDel').text(data[5]);
				$('#StocksDel').text(data[6]);
		});