<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="admin, dashboard" />
	<meta name="author" content="DexignZone" />
	<meta name="robots" content="index, follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Sign up to your account. AboveFinex Investment Limited is the leading financial establishment providing high-quality international investment services" />
	<meta property="og:title" content="Sign up to your account. AboveFinex Investment Limited is the leading financial establishment providing high-quality international investment services" />
	<meta property="og:description" content="Sign up to your account. AboveFinex Investment Limited is the leading financial establishment providing high-quality international investment services" />
	<meta property="og:image" content="social-image.png"/>
	<meta name="format-detection" content="telephone=no">
    <title>Withdrawal History | AboveFinex </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assetsn/images/favicon.png ')}}">
    <link href="{{ asset('assetsn/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assetsn/vendor/chartist/css/chartist.min.css') }}">
    <link href="{{ asset('assetsn/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assetsn/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
	
    <link href="{{ asset('assetsn/css/style.css') }}" rel="stylesheet">
	
</head>
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
		
				

				<div class="row">
					<div class="col-xl-12">
					
					</div>
					
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-2 d-block d-sm-flex flex-wrap border-0">
								<div class="mb-3">
									<h4 class="fs-20 text-black">Withdrawal Activity</h4>
								
								</div>
								
							</div>
							<div class="card-body tab-content p-0">
								<div class="tab-pane active show fade">
									<div class="table-responsive">
										<table class="table shadow-hover short-one card-table border-no">
                      @foreach ( $data as $dat )

											<tbody>
												<tr>
													
													<td>
														<span class="font-w600 text-black">{{ $dat->withdraw_id }}</span>
													</td>
													<td>
														<span class="text-black">{{ $dat->amount }}USD</span>
													</td>
													<td>
														<span class="font-w600 text-black">{{ $dat->type_withdraw }}</span>
                          </td>
                          <td>
														<span class="font-w600">{{ $dat->created_at }}</span>
													</td>
													<td><a class="btn-link text-success float-end" href="javascript:void(0);">{{ $dat->status }}</a></td>
												</tr>
												
                      </tbody>
                      @endforeach

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
