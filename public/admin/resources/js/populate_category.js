		$(".editCategory").on('click',function(){
			$('#editCategoryModal').modal('show');

				let $tr = $(this).closest('tr');

				let data = $tr.children("td").map(function(){
					return $(this).text();
				}).get();
            
				$('#Id').val(data[0]);
				$('#CategoryName').val(data[1]);
				$('#Description').val(data[2]);

		});
		$(".deleteCategory").on('click',function(){

			$('#deleteCategoryModal').modal('show');

				let $tr = $(this).closest('tr');

				let data = $tr.children("td").map(function(){
					return $(this).text();
				}).get();
				$('#IdDel').text(data[0]);
				$('#IdDelInp').val(data[0]);
				$('#CategoryNameDel').text(data[1]);
				$('#DescriptionDel').text(data[2]);
		});