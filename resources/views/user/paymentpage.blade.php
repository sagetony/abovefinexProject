@include("user.head")

@include("user.header")
	
@include("user.sidebar")

<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">			
          <div class="row">
        <div class="row mb-4">
                <div class="col-xl-12 col-md-12 col-lg-12">
                    <div class=" overflow-hidden bg-transparent card-crypto-scroll shadow-none">
                        <div class="js-conveyor-example">
                        <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/coinMarquee.js"></script><div id="coinmarketcap-widget-marquee" coins="1,1027,825,1839,52,2010" currency="USD" theme="light" transparent="true" show-symbol-logo="true" width="1000000"></div>
                            
                        </div>
                    </div>
                </div>
            </div>	
<marquee behavior="" direction=""> <h4>Kindly Deposit To The Wallet Address Below</h4></marquee>            
<div class="col-lg-6 col-12">
                <div class="box">
                  <div class="box-header with-border">
                    <h4 class="box-title">Transaction</h4>
                  </div>
                  <div class="box-body">
                      <div class="table-responsive">
                          <table class="table table-striped table-hover no-margin">
                              <tbody>
                                <tr>
                                  <td>Investment Package</td>
                                  <td>{{ $data[0]->plan }}</td>
                                </tr>
                                <tr>
                                  <td>Coin</td>
                                  <td>{{ $data[0]->coin }}</td>
                                </tr>
                                <tr>
                                  <td>Amount</td>
                                  <td>{{$data[0]->amount}}</td>
                                </tr>
                                <tr>
                                @if($data[0]->coin == 'BTC' )
                                  <td>Wallet Address</td>
                                  <td>{{ $databtc[0]->coinAddress }}</td>
                                @elseif($data[0]->coin == 'ETH')
                                <td>Wallet Address</td>
                                  <td>{{ $dataeth[0]->coinAddress }}</td>
                                @elseif($data[0]->coin == 'BNB')
                                <td>Wallet Address</td>
                                  <td>{{ $databnb[0]->coinAddress }}</td>
                                @elseif($data[0]->coin == 'BCH')
                                <td>Wallet Address</td>
                                  <td>{{ $databch[0]->coinAddress }}</td>
                                @elseif($data[0]->coin == 'USDT')
                                <td>Wallet Address</td>
                                  <td>{{ $datausdt[0]->coinAddress }}</td>
                                @endif

                                </tr>
                                
                                
                             </tbody>
                        </table>
                      </div>
                  </div>
                  <!-- /.box-body -->
                </div>
              </div>
          </div>
      </section>
    </div>
</div> 

@include("user.footer")

