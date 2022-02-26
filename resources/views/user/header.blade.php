<body>

  <!--*******************
      Preloader start
  ********************-->
  <div id="preloader">
      <div class="sk-three-bounce">
          <div class="sk-child sk-bounce1"></div>
          <div class="sk-child sk-bounce2"></div>
          <div class="sk-child sk-bounce3"></div>
      </div>
  </div>
  <!--*******************
      Preloader end
  ********************-->

  <!--**********************************
      Main wrapper start
  ***********************************-->
  <div id="main-wrapper">

      <!--**********************************
          Nav header start
      ***********************************-->
      <div class="nav-header">
          <a href="{{ route('dashboard') }}" class="brand-logo">
            <img src="{{ asset('assetsn/images/logo-full.png') }}" alt="Abovefinex">
          </a>

          <div class="nav-control">
              <div class="hamburger">
                  <span class="line"></span><span class="line"></span><span class="line"></span>
              </div>
          </div>
      </div>
      <!--**********************************
          Nav header end
      ***********************************-->
  
  <!--**********************************
          Chat box start
      ***********************************-->
  
  <!--**********************************
          Chat box End
      ***********************************-->
  
  <!--**********************************
          Header start
      ***********************************-->
      <div class="header">
          <div class="header-content">
              <nav class="navbar navbar-expand">
                  <div class="collapse navbar-collapse justify-content-between">
                      <div class="header-left">
                          <div class="dashboard_bar">
                              My Dashboard
                          </div>
                      </div>

                      <ul class="navbar-nav header-right">
            
                          <li class="nav-item dropdown header-profile">
                              <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
                                  <img src="{{ auth()->user()->photo }}" width="20" alt=""/>
                <div class="header-info">
                  <span>{{ auth()->user()->firstname.' '. auth()->user()->lastname}}</span>
                </div>
                              </a>
                             
                          </li>
                      </ul>
                  </div>
              </nav>
          </div>
      </div>
      <!--**********************************
          Header end ti-comment-alt
      ***********************************-->
