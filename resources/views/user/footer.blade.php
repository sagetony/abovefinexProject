<div class="footer">
  <div class="copyright">
      <p>Copyright © by AboveFinex 2022</p>
  </div>
</div>
<!--**********************************
  Footer end
***********************************-->

<!--**********************************
 Support ticket button start
***********************************-->

<!--**********************************
 Support ticket button end
***********************************-->


</div>
<!--**********************************
Main wrapper end
***********************************-->

<!--**********************************
Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{ asset('assetsn/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('assetsn/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assetsn/vendor/chart.js/Chart.bundle.min.js') }}"></script>

<!-- Chart piety plugin files -->
<script src="{{ asset('assetsn/vendor/peity/jquery.peity.min.js') }}"></script>

<!-- Apex Chart -->
<script src="{{ asset('assetsn/vendor/apexchart/apexchart.js') }}"></script>

<!-- Dashboard 1 -->
<!-- <script src="js/dashboard/dashboard-4.js"></script> -->
<script src="{{ asset('assetsn/js/dashboard/my-wallet.js') }}"></script>
<script src="{{ asset('assetsn/vendor/owl-carousel/owl.carousel.js') }}"></script>

<script src="{{ asset('assetsn/js/custom.min.js') }}"></script>
<script src="{{ asset('assetsn/js/deznav-init.js') }}"></script>
<script src="{{ asset('assetsn/js/demo.js') }}"></script>
<script src="{{ asset('assetsn/js/styleSwitcher.js') }}"></script>
@include('sweetalert::alert')

<script>
jQuery('.cards-slider').owlCarousel({
loop:true,
margin:30,
nav:true,
autoplay:true,
autoplayTimeout:9000,
autoplayHoverPause:false,
  rtl:(getUrlParams('dir') == 'rtl')?true:false,
autoWidth:true,
  //rtl:true,
dots: false,
navText: ['', ''],
});	
</script>
</body>


</html>