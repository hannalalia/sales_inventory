		$(".editBrand").on('click',function(){
			$('#editBrandModal').modal('show');

				let $tr = $(this).closest('tr');

				let data = $tr.children("td").map(function(){
					return $(this).text();
				}).get();
            
				$('#Id').val(data[0]);
				$('#BrandName').val(data[1]);
				$('#Description').val(data[2]);

		});
		$(".deleteBrand").on('click',function(){

			$('#deleteBrandModal').modal('show');

				let $tr = $(this).closest('tr');

				let data = $tr.children("td").map(function(){
					return $(this).text();
				}).get();
				$('#IdDel').text(data[0]);
				$('#IdDelInp').val(data[0]);
				$('#BrandNameDel').text(data[1]);
				$('#DescriptionDel').text(data[2]);
		});