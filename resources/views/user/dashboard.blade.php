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
					<a href="{{ route('fund') }}" class="btn btn-primary btn-rounded"> Fund Wallet</a>
				</div>
				<div class="cards-slider owl-carousel mb-4"> 
					<div class="items">
						<div class="wallet-card bg-secondary" style="background-image:url('{{asset('assetsn/images/pattern/pattern1.png')}}');">
							<div class="head">
								<p class="fs-14 text-white mb-0 op6 font-w100">My Wallet</p>
								<span>${{ 0 + $data - $datawitw - $datadeposit - $datarobot-  $datasignal}}</span>
							</div>
							<div class="wallet-footer">
								<img src="{{asset('assetsn/images/card-logo.png')}}" alt="">
							</div>
						</div>
					</div>
					{{-- <div class="items">
						<div class="wallet-card bg-success" style="background-image:url('{{asset('assetsn/images/pattern/pattern2.png')}}');">
							<div class="head">
								<p class="fs-14 text-white mb-0 op6 font-w100">Total Deposit</p>
								<span>${{ $datadeposit + 0 }} </span>
							</div>
							<div class="wallet-footer">
								<img src="{{ asset('assetsn/images/card-logo2.png') }}" alt="">
							</div>
						</div>
					</div> --}}
					<div class="items">
						<div class="wallet-card bg-success" style="background-image:url('{{ asset('assetsn/images/pattern/pattern2.png') }}');">
							<div class="head">
								<p class="fs-14 text-white mb-0 op6 font-w100">Total Investment</p>
								<span>${{ $datadeposit + 0 - $datawitc}} </span>
							</div>
							<div class="wallet-footer">
								<img src="{{ asset('assetsn/images/card-logo2.png') }}" alt="">
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
					<div class="col-xl-12">
						<div class="card-body">
							<div class="basic-form">
								<form action="#">
									<div class="input-group mb-3">
										<button class="btn btn-primary" type="button">Referral Link</button>
										<input type="text" class="form-control"  placeholder="{{ Route('register',['ref' => auth()->user()->refereeID]) }}" value="{{ Route('register',['ref' => auth()->user()->refereeID]) }}">
									</div>

								
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xl-12">
						<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/key-events/" rel="noopener" target="_blank"><span class="blue-text">Daily news roundup</span></a></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-timeline.js" async>
  {
  "feedMode": "all_symbols",
  "colorTheme": "light",
  "isTransparent": true,
  "displayMode": "regular",
  "width": "480px",
  "height": "830px",
  "locale": "en"
}
  </script>
</div>
<!-- TradingView Widget END -->
					</div>
					
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-2 d-block d-sm-flex flex-wrap border-0">
								<div class="mb-3">
									<h4 class="fs-20 text-black">Wallet Activity</h4>
								
								</div>
								
							</div>
							<div class="card-body tab-content p-0">
								<div class="tab-pane active show fade">
									<div class="table-responsive">
										<table class="table shadow-hover short-one card-table border-no">
											<tbody>
												<tr>
													
													<td>
														<span class="font-w600 text-black">Withdraw</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">+$5,553</span>
													</td>
													<td><a class="btn-link text-light float-end" href="javascript:void(0);">Pending</a></td>
												</tr>
												<tr>
													
													<td>
														<span class="font-w600 text-black">Topup</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">+$5,553</span>
													</td>
													<td>
														<a class="btn-link text-success float-end" href="javascript:void(0);">Completed</a>
													</td>
												</tr>
												<tr>
													
													<td>
														<span class="font-w600 text-black">Wihtdraw</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">-$912</span>
													</td>
													<td>
														<a class="btn-link text-danger float-end" href="javascript:void(0);">Canceled</a>
													</td>
												</tr>
												<tr>
													
													<td>
														<span class="font-w600 text-black">Topup</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">+$7,762</span>
													</td>
													<td>
														<a class="btn-link text-success float-end" href="javascript:void(0);">Completed</a>
													</td>
												</tr>
												<tr>
													
													<td>
														<span class="font-w600 text-black">Topup</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">+$5,553</span>
													</td>
													<td>
														<a class="btn-link text-success float-end" href="javascript:void(0);">Completed</a>
													</td>
												</tr>
												<tr>
													
													<td>
														<span class="font-w600 text-black">Wihtdraw</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">-$912</span>
													</td>
													<td>
														<a class="btn-link text-danger float-end" href="javascript:void(0);">Canceled</a>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
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

  @include("user.footer")
