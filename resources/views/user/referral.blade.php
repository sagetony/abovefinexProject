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
                    <div class="col-lg-12 col-12">
                        <div class="box">
                            <div class="box-header with-border">
                            <h4 class="box-title">REFERRAL</h4>

                            </div>
                            <div class="box-body">
                              
                                <div class="tab-content p-10 tabcontent-border">
                                    <div class="tab-pane active" id="market" role="tabpanel">
                                        <form class="dash-form">
                                            
                                            
                                            <div class="input-group mb-10">
                                                <span class="input-group-addon">Referral Link</span>
                                                <input type="text" class="form-control" placeholder="{{ Route('register',['ref' => auth()->user()->refereeID]) }}" value="{{ Route('register',['ref' => auth()->user()->refereeID]) }}">
                                            </div>
                                           
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
               						
            </div>
            <section class="content">
              <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="box">
                      <div class="box-header with-border">
                        <h4 class="box-title">My Referee</h4>
                      </div>
                      <div class="box-body">
                          <div class="table-responsive">
                            @if (count($users) > 0)
                            @foreach ( $users as $user )
                              <table class="table no-margin table-hover">
                                <thead>					
                                  <tr class="bg-dark">
                                    <th>Referral ID</th>
                                    <th>Referee</th>
                                    <th>Email</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>
                                      <a href="#" class="text-primary hover-primary">
                                        {{ $user->refereeID }}
                                      </a>
                                      ...
                                    </td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>

                                    
                                    
                                  </tr>
                                 
                                </tbody>
                              </table>
                              @endforeach
                              @else
                              <marquee behavior="" direction="">                            
                                  <h5 class="font-weight-bold">No Referee found</h5>
                              </marquee>
                              @endif
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
                          <h4 class="box-title">Referral Transactions</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                              @if (count($bonus) > 0)
                              @foreach ( $bonus as $bon )
                                <table class="table no-margin table-hover">
                                  <thead>					
                                    <tr class="bg-dark">
                                      <th>Referral ID</th>
                                      <th>Referee</th>
                                      <th>Amount</th>
                                      <th>Time</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <a href="#" class="text-primary hover-primary">
                                          {{ $bon->referralID }}
                                        </a>
                                        ...
                                      </td>
                                      <td>{{ $bon->referee }}</td>
                                      <td>{{ $bon->amount }}</td>

                                      <td>
                                        <time >{{ $bon->created_at }}</time>
                                      </td>
                                      
                                    </tr>
                                   
                                  </tbody>
                                </table>
                                @endforeach
                                @else
                                <marquee behavior="" direction="">                            
                                    <h5 class="font-weight-bold">No Referee found</h5>
                                </marquee>
                                @endif
                            </div>
                        </div>
                      </div>
                  </div>
                  
              </div>
            </section>
          </div>
      </section>
    </div>
</div> 

@include("user.footer")

