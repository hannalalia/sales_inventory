$(".adjustStocks").on('click',function(){


			$('#adjustModal').modal('show');
				let refId = $(this).data("id");
				let minStockAdj = $(this).data("min");
				let $tr = $(this).closest('tr');

				let data = $tr.children("td").map(function(){
					return $(this).text();
				}).get();
				
				$('#ProductCode').val(data[0]);
				$('#ItemName').val(data[1]);
				$('#RefId').val(refId);
				$('#StockCount').val(null);
				$('#StockCount').attr('min', -minStockAdj);
		});
