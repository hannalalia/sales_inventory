    </div>
</div>
</body>
    <script src="../../../node_modules/jquery/dist/jquery.js"></script>
    <script src="../../../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script>
        feather.replace()
    </script>
    <script>
    $(document).ready(function() {
        $('.sidebar').toggle();
        $('.content').toggleClass('col-md-9');
        $('.content').toggleClass('col-lg-10');
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
    });
    </script>