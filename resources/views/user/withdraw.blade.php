@include("user.head")

@include("user.header")
	
@include("user.sidebar")

<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">			
          <div class="row">
        <div class="row">
                <div class="col-xl-12 col-md-12 col-lg-12">
                    <div class=" overflow-hidden bg-transparent card-crypto-scroll shadow-none">
                        <div class="js-conveyor-example">
                        <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/coinMarquee.js"></script><div id="coinmarketcap-widget-marquee" coins="1,1027,825,1839,52,2010" currency="USD" theme="light" transparent="true" show-symbol-logo="true" width="1000000"></div>
                            
                        </div>
                    </div>
                </div>
            </div>	
            <div class="col-xl-8 col-12">
               
                <div class="row">
                    <div class="col-lg-10 col-12">
                        <div class="box">
                            <div class="box-header with-border">
                            <h4 class="box-title">WITHDRAW</h4>

                            </div>
                            <div class="box-body">
                              
                                <div class="tab-content p-10 tabcontent-border">
                                    <div class="tab-pane active" id="market" role="tabpanel">
                                        <form action="{{ route('withdraw') }}" method="post">
                                            @csrf
                                            <p>Balance: <span class="fw-600">{{ 0 + $datadeposit + $datadepositi + $databonus + $datainterest - $datawit}} $</span></p>
                                                                                        <div class="form-group input-group">
                                                <span class="input-group-addon">Withdraw Type</span>

                                                <select class="form-select" name="type">
                                                    <option>Bonus</option>
                                                    <option>Interest</option>
                                                    <option>Capital</option>
                                                   
                                                </select>
                                            </div>
                                            <div class="form-group input-group">
                                                <span class="input-group-addon">Coin</span>

                                                <select class="form-select" name="coin" >
                                                    
                                                    @foreach ($datacs as $datac)
                                                    <option>{{ $datac->coinName }}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            <div class="input-group mb-10">
                                                <span class="input-group-addon">Amount</span>
                                                <input type="number" name="amount" class="form-control" placeholder="0">
                                            </div>
                                            
                                            <div class="input-group mb-10">
                                                <span class="input-group-addon">Wallet Address</span>
                                                <input type="text" name="wallet" class="form-control" placeholder="">
                                            </div>
                                            <button type="submit" class="btn btn-block btn-success mt-20">Withdraw Now</button>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
               						
            </div>
          </div>
      </section>
    </div>
</div> 

@include("user.footer")

