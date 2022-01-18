
    <body class="homepage-3">

        <div class="notification-alert">
            <div class="notice-list">
                
            </div>
        </div>

        <!-- preloader begin-->
        <div class="preloader">
            <img src="{{ asset('assetsh/img/tenor.gif') }}" alt="">
        </div>
        <!-- preloader end -->

        <div class="mobile-navbar-wrapper">

            <!-- header begin -->
            <div class="header header-style-5" id="header">
                <div class="top">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-5 col-lg-3">
                                <div class="welcome-text">
                                    <p>Welcome to Wyre Investment and Financial Management Limited</p>
                                    
                                </div>
                            </div>
                            
                            <div class="col-xl-7 col-lg-9 d-xl-flex d-lg-flex d-block align-items-center">
                                <div class="part-right">
                                    <ul>
                                        <li>
                                            
                                            <span class="simple-text"></span>
                                            <div class="server-time">
                                                 
                                            <div id="google_translate_element"></div>
                                            <script type="text/javascript">
                                                function googleTranslateElementInit() {
                                                  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                                                }
                                                </script>
                                                 
                                                <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                                                
                                            </div>
                                        </li>
                                        <li>
                                            <div class="user-panel">
                                                <span>
                                                    <a href="{{ route('login') }}" class="login-btn">Login</a>or</span><a href="{{ route('register') }}" class="register-btn">Register</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bottom">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-xl-3 col-lg-2 d-xl-flex d-lg-flex d-block align-items-center">
                                <div class="row">
                                    <div class="col-4 d-xl-none d-lg-none d-block">
                                        <button class="navbar-toggler" type="button">
                                            <span class="dag"></span>
                                            <span class="dag2"></span>
                                            <span class="dag3"></span>
                                        </button>    
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-8 d-xl-block d-lg-block d-flex align-items-center justify-content-end">
                                        <div class="logo">
                                            <a href="{{ route('home') }}">
                                                <span><img src="{{ asset("images/log.png") }}" alt=""> </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-10">
                                <div class="mainmenu">
                                    
                                    <nav class="navbar navbar-expand-lg">              

                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <ul class="navbar-nav ml-auto">
                                               
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('home') }}">home<span class="sr-only">(current)</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{route('about')}}">about us<span class="sr-only">(current)</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('plan') }}">Plan<span class="sr-only">(current)</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('faq') }}">Faq<span class="sr-only">(current)</span></a>
                                                </li>
                                               
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('contact') }}">contact</a>
                                                </li>
                                                <li class="nav-item join-now-btn">
                                                    <a class="nav-link" href="{{ route('register') }}">Join Now</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header end -->