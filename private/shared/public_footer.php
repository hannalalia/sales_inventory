    </div>
</div>
</body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script>
      feather.replace()
    </script>
    <script>
    	$('#menuToggle').on('click', function(e) {
    		e.preventDefault();
    		$('.sidebar').toggle();
    		$('.content').toggleClass('col-md-9');
            $('.content').toggleClass('col-lg-10');
    	})
    	$('#menuToggleMd').on('click', function(e) {
    		e.preventDefault();
    		$('.sidebar').toggle();
            $('.content').toggleClass('col-md-9');
    		$('.content').toggleClass('col-lg-10');
    	})
    </script>