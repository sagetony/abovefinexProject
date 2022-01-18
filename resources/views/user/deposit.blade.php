@include("user.head")

@include("user.header")
	
@include("user.sidebar")

<!--**********************************
            Content body start
        ***********************************-->
        			
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
              				<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
	<div class="tradingview-widget-container__widget"></div>
	<div class="tradingview-widget-copyright"><a href="https://www.tradingview.com" rel="noopener" target="_blank">TradingView</div>
	<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
	{
	"symbols": [
	  {
		"proName": "FOREXCOM:SPXUSD",
		"title": "S&P 500"
	  },
	  {
		"proName": "FOREXCOM:NSXUSD",
		"title": "US 100"
	  },
	  {
		"proName": "FX_IDC:EURUSD",
		"title": "EUR/USD"
	  },
	  {
		"proName": "BITSTAMP:BTCUSD",
		"title": "Bitcoin"
	  },
	  {
		"proName": "BITSTAMP:ETHUSD",
		"title": "Ethereum"
	  },
	  {
		"description": "XAU/USD",
		"proName": "OANDA:XAUUSD"
	  },
	  {
		"description": "EUR/USD",
		"proName": "FX:EURUSD"
	  },
	  {
		"description": "GBP/USD",
		"proName": "FX:GBPUSD"
	  },
	  {
		"description": "GBP/JPY",
		"proName": "FX:GBPJPY"
	  },
	  {
		"description": "Matic",
		"proName": "BINANCE:MATICUSDT"
	  },
	  {
		"description": "USD/CAD",
		"proName": "FX:USDCAD"
	  }
	],
	"showSymbolLogo": true,
	"colorTheme": "light",
	"isTransparent": true,
	"displayMode": "adaptive",
	"locale": "en"
  }
	</script>
  </div>
  <!-- TradingView Widget END -->
  <div class="text-right mb-4">
    <a href="javascript:void(0);" class="btn btn-primary btn-rounded"> Fund Wallet</a>
</div>
                <div class="cards-slider owl-carousel mb-4">
                    <div class="items">
                        <div class="wallet-card bg-secondary" style="background-image:url('{{asset('assetsn/images/pattern/pattern1.png')}}');">
                            <div class="head">
                                <p class="fs-14 text-white mb-0 op6 font-w100">My Wallet</p>
                                <span>${{ 0 + $data }}</span>
                            </div>
                            <div class="wallet-footer">
                                <img src="{{asset('assetsn/images/card-logo.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="wallet-card bg-success" style="background-image:url('{{asset('assetsn/images/pattern/pattern2.png')}}');">
                            <div class="head">
                                <p class="fs-14 text-white mb-0 op6 font-w100">Total Deposit</p>
                                <span>${{ $datadeposit + 0 }} </span>
                            </div>
                            <div class="wallet-footer">
                                <img src="{{ asset('assetsn/images/card-logo2.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="wallet-card bg-primary" style="background-image:url('{{ asset('assetsn/images/pattern/pattern3.png') }}');">
                            <div class="head">
                                <p class="fs-14 text-white mb-0 op6 font-w100">Total Investment</p>
                                <span>${{ $datadeposit + 0 }} </span>
                            </div>
                            <div class="wallet-footer">
                                <img src="{{ asset('assetsn/images/card-logo.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="wallet-card bg-info" style="background-image:url('images/pattern/pattern4.png');">
                            <div class="head">
                                <p class="fs-14 text-white mb-0 op6 font-w100">Interest</p>
                                <span>${{ $datainterest + 0 - $datawiti }}</span>
                            </div>
                            <div class="wallet-footer">
                                <img src="{{ asset('assetsn/images/card-logo2.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="wallet-card bg-primary" style="background-image:url('{{ asset('assetsn/images/pattern/pattern3.png') }}');">
                            <div class="head">
                                <p class="fs-14 text-white mb-0 op6 font-w100">Bonus</p>
                                <span>${{ $databonus + 0 }}</span>
                            </div>
                            <div class="wallet-footer">
                                <img src="images/card-logo.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="wallet-card bg-info" style="background-image:url('{{ asset('assetsn/images/pattern/pattern4.png') }}');">
                            <div class="head">
                                <p class="fs-14 text-white mb-0 op6 font-w100">Withdraw</p>
                                <span>${{( $datawit + 0) }} </span>
                            </div>
                            <div class="wallet-footer">
                                <img src="{{asset('assetsn/images/card-logo2.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                   
                </div>
                
				<div class="row">
					
					<div class="col-xl-7 col-xxl-7">
						<div class="card">
							<div class="card-header border-0 pb-0">
								<h5 class="mb-0 text-black fs-20">My Investment</h5>
								
							</div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('deposit') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="col-sm-6 col-form-label">Investment Package</label>
                                                    <select class="default-select  form-control col-sm-9" name="package" >
                                                        @foreach ($datas as $dat)
                                                            <option value="{{ $dat->pack_name }}">{{ $dat->pack_name }}</option>
                                                        @endforeach
                                                    </select>
                                        </div>
                                       
                                        <div class="mb-3">
                                            <label class="col-sm-6 col-form-label">Amount</label>
															<div class="col-sm-9">
																<input type="text" name="amount" class="form-control" id="amount" >
															</div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class=" col-sm-9 btn btn-primary btn-block">Invest Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
						</div>
					</div>
					
					
				</div>
				
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
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
          @include('sweetalert::alert')
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
