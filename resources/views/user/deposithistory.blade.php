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
          
          </div>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-lg-12 col-12">
              <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Deposit Transactions</h4>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin table-hover">
                          <thead>					
                            <tr class="bg-dark">
                              <th>Transaction ID</th>
                              <th>Amount</th>
                              <th>Time</th>
                              <th>Plan</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          @foreach ( $data as $dat )
                          <tbody>
                            <tr>
                              <td>
                                <a href="#" class="text-primary hover-primary">
                                  {{ $dat->transaction_id }}
                                </a>
                                
                              </td>
                              <td>{{ $dat->amount }}</td>
                              <td>
                                <time>{{ $dat->created_at }}</time>
                              </td>
                              <td>{{ $dat->plan }}</td>
                              <td>{{ $dat->status }}</td>
                            </tr>
                           
                        
                          </tbody>
                          @endforeach

                        </table>
                    </div>
                </div>
              </div>
          </div>
          
      </div>
    </section>
    </div>
</div> 

@include("user.footer")