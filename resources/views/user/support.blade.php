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
                <div class="box">
                  <div class="box-header">
                    <h4 class="box-title">Support Ticket</h4>
                    <!-- tools box -->
                      <ul class="box-controls pull-right">
                        
                        <li><a class="box-btn-fullscreen" href="#"></a></li>
                      </ul>
                    <!-- /. tools -->
                  </div>
                  <div class="box-body">
                    <form action="{{ 'support' }}" method="post">
                      @csrf
                      <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email address:">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control"  name="title" placeholder="Subject">
                      </div>
                      <div>
                        <textarea class="textarea b-1 p-10 w-p100" placeholder="Message" name="msg"></textarea>
                      </div>
                      <div class="box-footer">
                        <button type="submit" class="pull-right btn btn-info"> Send <i class="fa fa-paper-plane-o"></i></button>
                      </div>
                    </form>
                  </div>
                  
                </div>
              </div>
              <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">						
                        <h4 class="box-title">Support Ticket List</h4>
                    </div>
                    <div class="box-body p-15">						
                        <div class="table-responsive">
                            <table id="tickets" class="table mt-0 table-hover no-wrap" data-page-size="10">
                                <thead>
                                  @foreach ( $data as $dat )

                                    <tr>
                                        <th>Ticket ID</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  

                                    <tr>
                                        <td>{{ $dat->ticketID }}</td>
                                        
                                        <td>{{ $dat->email }}</td>
                                        <td>{{ $dat->title }}</td>
                                        <td><span class="badge badge-warning">{{ $dat->status }}</span> </td>
                                    
                                        <td>{{ $dat->created_at }}</td>
                                      
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

