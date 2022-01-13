<script src="{{ asset('webssets/js/jquery.min.js')}}"></script>
  <script src="{{ asset('webssets/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{ asset('webssets/js/popper.min.js')}}"></script>
  <script src="{{ asset('webssets/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{ asset('webssets/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{ asset('webssets/js/jquery.stellar.min.js')}}"></script>
  <script src="{{ asset('webssets/js/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('webssets/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{ asset('webssets/js/aos.js')}}"></script>
  <script src="{{ asset('webssets/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{ asset('webssets/js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('webssets/js/google-map.js')}}"></script>
  <script src="{{ asset('webssets/js/main.js')}}"></script>

 
  	<script src="{{ asset('webssets/js/jquery-3.2.1.min.js')}}"></script>
  	<script src="{{ asset('webssets/js/bootstrap.min.js')}}"></script>
  	<script src="{{ asset('webssets/js/owl.carousel.js')}}"></script>
  	<script src="{{ asset('webssets/js/custom.js')}}"></script>

	<script>
		$(document).ready(function () {

			$(".filter-button").click(function () {
				var value = $(this).attr('data-filter');

				if (value == "all") {

					$('.filter').show('1000');
				} else {

					$(".filter").not('.' + value).hide('3000');
					$('.filter').filter('.' + value).show('3000');

				}


				if ($(".filter-button").removeClass("active")) {
					$(this).removeClass("active");
				}
				$(this).addClass("active");
			});

		});
	</script>
	<script src="{{ asset('webssets/js/slick.js')}}"></script>
  	<script src="{{ asset('webssets/js/main-menu.js')}}"></script>

      @yield('scripts')
  </body>
</html>
