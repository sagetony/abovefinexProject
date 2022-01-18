@include('user.headh')
@include('user.headerh')
<!-- banner begin -->
<div class="banner banner-style-2">
    <div class="container">
        <div class="row justify-content-xl-between justify-content-lg-between justify-content-md-center justify-content-sm-center">
            <div class="col-xl-7 col-lg-7 col-sm-10 col-md-9 d-xl-flex d-lg-flex d-block align-items-center d-banner-tamim">
                <div class="banner-content mb-4">
                    <h4>Want to Invest Money?</h4>
                    <h1> Build A Sustainable Investment Portfolio With Wyre Investment and Financial Management Limited</h1>
                    <p>We Already Completed Our 8+ Years in Online Investment Business<br/> With Trust and Excellent Reputation.</p>
                    <a href="{{ route('login') }}" class="btn-hyipox">Start Investing Now</a>
                </div>
                <!-- <div class="banner-statics">
                    <div class="single-statics">
                        <div class="part-icon">
                            <img src="assets/img/svg/start.svg" alt="">
                        </div>
                        <div class="part-text">
                            <span class="text">Starting Date</span>
                            <span class="number">Jan 01, 2020</span>
                        </div>
                    </div>
                    <div class="single-statics">
                        <div class="part-icon">
                            <img src="assets/img/svg/user.svg" alt="">
                        </div>
                        <div class="part-text">
                            <span class="text">Online Users</span>
                            <span class="number">50257.001+</span>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="col-xl-4 col-lg-5 col-sm-10 col-md-8 monitor-for-480">
                <div class="profit-calculator">
                    <div class="calc-header">
                        <h3 class="title">Calculate Your Profit</h3>
                    </div>
                    <div class="calc-body">
                        <div class="part-plan">
                            <h4 class="title">
                                Choose Investment Plan
                            </h4>
                            <div class="dropdown show">
                                <a class="dropdown-toggle displayed-selected-plan" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    1.14% daily
                                </a>
                                <div class="dropdown-menu plan-select-list" aria-labelledby="dropdownMenuLink">
                                    
                                    <a class="dropdown-item single-select-plan selected-plan active" href="#" data-max-amount="5000" data-min-amount="100" data-package-no="1" data-parcentage="1.14" data-days="90">1.14% daily</a>
                                    <a class="dropdown-item single-select-plan selected-plan active" href="#" data-max-amount="1860" data-min-amount="580" data-package-no="1" data-parcentage="1.05" data-days="90">1.05% daily</a>
                                    <a class="dropdown-item single-select-plan selected-plan active" href="#" data-max-amount="50000" data-min-amount="1860" data-package-no="1" data-parcentage="1.18" data-days="90">1.18% daily</a>
                                    <a class="dropdown-item single-select-plan" href="#" data-package-no="2" data-max-amount="50000" data-min-amount="5000" data-parcentage="1.25" data-days="90">1.25% daily</a>
                                    <a class="dropdown-item single-select-plan" href="#" data-package-no="3" data-max-amount="5000000" data-min-amount="50000" data-parcentage="2" data-days="90">2% daily</a>
                                </div>
                            </div>
                        </div>
                        <div class="part-amount">
                            <h4 class="title">
                                Enter Amount
                            </h4>
                            <form>
                                <span class="currency-symbol" id="basic-addon1">$</span>
                                <input type="text" class="inputted-amount" value="10">
                                
                                    <button class="dropdown-toggle displayed-selected-currency" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        USD
                                    </button>
                                    <div class="dropdown-menu currency-select-list" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item single-currency-select selected-currency active" href="#" data-currency="usd">USD</a>
                                       
                                    </div> 
                                    <h4 class="title mt-4">
                                        Period Of Investment
                                    </h4>
                                    <span class="currency-symbol" id="basic-addon1">$</span>

                                    <input type="text" class="inputted-amount" id="day" value="90" style="padding: 10px;">

                            </form>
                        </div>
                        <div class="d-inline-block cursor-not-allowed">
                            <button class="calculate-all">Calculate</button>
                        </div>
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="part-result">
                        <ul>
                            <li>
                                <div class="icon">
                                    <img src="{{ asset('assetsh/img/svg/business-and-finance.svg') }}" alt="">
                                </div>
                                <div class="text">
                                    <span class="title">Total<br/> Percent</span>
                                    <span class="number js_totalPercentage">250.00%</span>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="{{ asset('assetsh/img/svg/profit.svg') }}" alt="">
                                </div>
                                <div class="text">
                                    <span class="title">Daily<br/> Profits</span>
                                <span class="number js_dailyProfit">$0.05</span>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="{{ asset('assetsh/img/svg/profits.svg') }}" alt="">
                                </div>
                                <div class="text">
                                    <span class="title">Net<br/> Profit</span>
                                <span class="number js_netProfit">$25.00</span>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="{{ asset('assetsh/img/svg/return-on-investment.svg') }}" alt="">
                                </div>
                                <div class="text">
                                    <span class="title">Total<br/> Return</span>
                                    <span class="number js_totalReturn">$35.00</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner end -->

<!-- about begin -->
<div class="about">
    <div class="container">
        <div class="how-to-works">
            <div class="row justify-content-center justify-content-sm-center justify-content-md-start">
                <div class="col-xl-4 col-lg-4 col-sm-10 col-md-6">
                    <div class="single-system">
                        <div class="part-icon">
                            <img src="{{ asset('assetsh/img/svg/add-user.svg') }}" alt="">
                        </div>
                        <div class="part-text">
                            <h4 class="title">Register Account</h4>
                            <p>Register for an account. It's totally easy and free</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-10 col-md-6">
                    <div class="single-system">
                        <div class="part-icon">
                            <img src="{{ asset('assetsh/img/svg/coin.svg') }}" alt="">
                        </div>
                        <div class="part-text">
                            <h4 class="title">Invest Money</h4>
                            <p>Choose your investment plan and make first deposit</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-10 col-md-6">
                    <div class="single-system">
                        
                        <div class="part-icon">
                            <img src="{{ asset('assetsh/img/svg/money-bag.svg') }}" alt="">
                        </div>
                        <div class="part-text">
                            <h4 class="title">Get Withdraw</h4>
                            <p>Request for the withdrawal and receive a payment</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!-- prcing plan begin -->
<div class="pricing-plan" style="margin-top:-90px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8">
                <div class="section-title">
                    <span class="sub-title">
                        Investment Package
                    </span>
                    <h2>
                        Check out our Investment Plans!</span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center justify-content-md-start">
            <div class="col-xl-3 col-lg-3 col-sm-10 col-md-6 prc-col">
                <div class="single-plan">
                    <h3>Economy Plan</h3>
                    <div class="plan-icon">
                        <img src="{{ asset('assetsh/img/icon/bronze-medal.png') }}" alt="">
                    </div>
                    <div class="feature-list">
                        <ul>
                            <li><i class="fas fa-check"></i> Minimum Deposit $100</li>
                            <li><i class="fas fa-check"></i> 30% Traders commission</li>
                            <li><i class="fas fa-check"></i> 45% capital insurance</li>
                            <li><i class="fas fa-check"></i> Dedicated Portfolio Manager</li>
                            <li><i class="fas fa-check"></i> 24/7 Online Support</li>
                        </ul>
                    </div>
                    <div class="price-info">
                        <span class="parcent">$100</span>
                        <span class="price">1.14% <small>daily rate</small></span>
                    </div>
                    <a href="{{ route('login') }}" class="btn-hyipox-medium price-button">Invest now</a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-10 col-md-6 prc-col">
                <div class="single-plan">
                    <h3>High Frequency Plan</h3>
                    <div class="plan-icon">
                        <img src="{{ asset('assetsh/img/icon/trophy-1.png') }}" alt="">
                    </div>
                    <div class="feature-list">
                        <ul>
                            <li><i class="fas fa-check"></i> Minimum Deposit $5,000</li>
                            <li><i class="fas fa-check"></i> 30% Traders commission</li>
                            <li><i class="fas fa-check"></i> 45% capital insurance</li>
                            <li><i class="fas fa-check"></i> Dedicated Portfolio Manager</li>
                            <li><i class="fas fa-check"></i> 24/7 Online Support</li>
                        </ul>
                    </div>
                    <div class="price-info">
                        <span class="parcent">$5,000</span>
                        <span class="price">1.25% <small>daily rate</small></span>
                    </div>
                    <a href="{{ route('login') }}" class="btn-hyipox-medium price-button">Invest now</a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-10 col-md-6 prc-col">
                <div class="single-plan">
                    <h3>Contract Plan</h3>
                    <div class="plan-icon">
                        <img src="{{ asset('assetsh/img/icon/trophy.png') }}" alt="">
                    </div>
                    <div class="feature-list">
                        <ul>
                            <li><i class="fas fa-check"></i> Minimum Deposit $50,000</li>
                            <li><i class="fas fa-check"></i> 30% Traders commission</li>
                            <li><i class="fas fa-check"></i> 45% capital insurance</li>
                            <li><i class="fas fa-check"></i> Dedicated Portfolio Manager</li>
                            <li><i class="fas fa-check"></i> 24/7 Online Support</li>
                        </ul>
                    </div>
                    <div class="price-info">
                        <span class="parcent">$50,000</span>
                        <span class="price">2% <small>daily</small></span>
                    </div>
                    <a href="{{ route('login') }}" class="btn-hyipox-medium price-button">Invest now</a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-10 col-md-6 prc-col">
                <div class="single-plan">
                    <h3>Leverage Plan</h3>
                    <div class="plan-icon">
                        <img src="{{ asset('assetsh/img/icon/trophy.png') }}" alt="">
                    </div>
                    <div class="feature-list">
                        <ul>
                            <li><i class="fas fa-check"></i> Minimum Deposit $50,000</li>
                            <li><i class="fas fa-check"></i> 30% Traders commission</li>
                            <li><i class="fas fa-check"></i> 45% capital insurance</li>
                            <li><i class="fas fa-check"></i> Dedicated Portfolio Manager</li>
                            <li><i class="fas fa-check"></i> 24/7 Online Support</li>
                        </ul>
                    </div>
                    <div class="price-info">
                        <span class="parcent">$50,000</span>
                        <span class="price">2% <small>daily</small></span>
                    </div>
                    <a href="{{ route('login') }}" class="btn-hyipox-medium price-button">Invest now</a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center justify-content-md-start mt-4">
            <div class="col-xl-4 col-lg-4 col-sm-10 col-md-6 prc-col">
                <div class="single-plan">
                    <h3>Gram Plan</h3>
                    <div class="plan-icon">
                        <img src="{{ asset('assetsh/img/icon/bronze-medal.png') }}" alt="">
                    </div>
                    <div class="feature-list">
                        <ul>
                            <li><i class="fas fa-check"></i> Minimum Deposit $580</li>
                            <li><i class="fas fa-check"></i> 30% Traders commission</li>
                            <li><i class="fas fa-check"></i> 45% capital insurance</li>
                            <li><i class="fas fa-check"></i> Dedicated Portfolio Manager</li>
                            <li><i class="fas fa-check"></i> 24/7 Online Support</li>
                        </ul>
                    </div>
                    <div class="price-info">
                        <span class="parcent">$580</span>
                        <span class="price">1.05% <small>daily rate</small></span>
                    </div>
                    <a href="{{ route('login') }}" class="btn-hyipox-medium price-button">Invest now</a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-10 col-md-6 prc-col">
                <div class="single-plan">
                    <h3>Oonze Plan</h3>
                    <div class="plan-icon">
                        <img src="{{ asset('assetsh/img/icon/trophy-1.png') }}" alt="">
                    </div>
                    <div class="feature-list">
                        <ul>
                            <li><i class="fas fa-check"></i> Minimum Deposit $1,860</li>
                            <li><i class="fas fa-check"></i> 30% Traders commission</li>
                            <li><i class="fas fa-check"></i> 45% capital insurance</li>
                            <li><i class="fas fa-check"></i> Dedicated Portfolio Manager</li>
                            <li><i class="fas fa-check"></i> 24/7 Online Support</li>
                        </ul>
                    </div>
                    <div class="price-info">
                        <span class="parcent">$1,860</span>
                        <span class="price">1.18% <small>daily rate</small></span>
                    </div>
                    <a href="{{ route('login') }}" class="btn-hyipox-medium price-button">Invest now</a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-10 col-md-6 prc-col">
                <div class="single-plan">
                    <h3>Kilogram Plan</h3>
                    <div class="plan-icon">
                        <img src="{{ asset('assetsh/img/icon/trophy.png') }}" alt="">
                    </div>
                    <div class="feature-list">
                        <ul>
                            <li><i class="fas fa-check"></i> Minimum Deposit $50,000</li>
                            <li><i class="fas fa-check"></i> 30% Traders commission</li>
                            <li><i class="fas fa-check"></i> 45% capital insurance</li>
                            <li><i class="fas fa-check"></i> Dedicated Portfolio Manager</li>
                            <li><i class="fas fa-check"></i> 24/7 Online Support</li>
                        </ul>
                    </div>
                    <div class="price-info">
                        <span class="parcent">$50,000</span>
                        <span class="price">2% <small>daily</small></span>
                    </div>
                    <a href="{{ route('login') }}" class="btn-hyipox-medium price-button">Invest now</a>
                </div>
            </div>
            
        </div>
    </div>

</div>
<!-- prcing plan end -->
    <div class="container">
        <div class="row justify-content-xl-between justify-content-lg-between justify-content-md-between justify-content-sm-center">
            <div class="col-xl-6 col-lg-6 col-sm-10">
                <div class="part-text">
                    <h2>The right place</span> for you to invest money</h2>
                    <p>Wyre Investment and Financial Management Limited is a general financial institution specialized in various aspects of finance management and investment.</p>
                    <br>
                        <p>
                            We are registered on the 27 November 2012, the company has ever since evolved into a leading power house in the financial management industry, adding various aspects of wealth creation and management to its ever-growing portfolio.
                        </p>
                        <br>
                        
                        
                        <p>
                            
                        We offer services in financial advisory and management, investment banking, fund escrow services, stock broking, trading shares, forex and most recently cryptocurrencies.
                        </p>
                        <br>
                        
                        <p>We are well groomed to meet your ever-expanding financial needs and are never afraid to evolve and adapt to our fast-paced digital world.</p>
                    <ul>
                        <li><i class="fas fa-check"></i> Wyre Investment and Financial Management Limited is a registered company, 08309647 is our business number. </li>
                        <li><i class="fas fa-check"></i> Wyre Investment and Financial Management Limited offers different packages for investment in cryptocurrencies and gold</li>
                        
                    </ul>
                
                    <a href="{{ route('login') }}" class="btn-hyipox-2">Invest now</a>
                </div>
            </div>
            <div class="col-xl-5 col-lg-6 col-sm-10 col-md-12">
                <div class="part-feature">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-sm-12 col-md-6">
                            <div class="single-feature">
                                <div class="feature-icon">
                                    <img src="{{ asset('assetsh/img/svg/solar-energy.svg') }}" alt="">
                                </div>
                                <div class="feature-text">
                                    <h3>Cryptocurrency Trading
                                    </h3>
                                    <p>Wyre Investment and Financial Management Limited offers sensational investment packages for cryptocurrency trading. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-sm-12 col-md-6">
                            <div class="single-feature">
                                <div class="feature-icon">
                                    <img src="{{ asset('assetsh/img/svg/diploma.svg') }}" alt="">
                                </div>
                                <div class="feature-text">
                                    <h3>We're Certified</h3>
                                    <p>Wyre Investment and Financial Management Limited is a registered company, 08309647 is our business number. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-sm-12 col-md-6">
                            <div class="single-feature">
                                <div class="feature-icon">
                                    <img src="{{asset('assetsh/img/svg/blockchain.svg')}}" alt="">
                                </div>
                                <div class="feature-text">
                                    <h3>Stock & Commodities Trading</h3>
                                    <p>Stock and Commmodities trading is another offer Wyre Investment and Financial Management Limited can provide.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-sm-12 col-md-6">
                            <div class="single-feature">
                                <div class="feature-icon">
                                    <img src="{{ asset('assetsh/img/svg/worldwide.svg') }}" alt="">
                                </div>
                                <div class="feature-text">
                                    <h3>Gold Investment
                                    </h3>
                                    <p>Another service Wyre Investment and Financial Management Limited provides is our enormous gold investment which will offer robust profit.

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about end -->

<!-- statics begin -->
<!-- <div class="statics">
    <div class="container">
        <div class="all-statics">
            <div class="row no-gutters justify-content-center">
                <div class="col-xl-4 col-lg-3 col-sm-10 col-md-4">
                    <div class="single-statics">
                        <div class="part-img">
                            <img src="assets/img/svg/investor.svg" alt="investor">
                        </div>
                        <div class="part-text">
                            <span class="counter">565+</span>
                            <span class="title">total investor</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-3 col-sm-10 col-md-4">
                    <div class="single-statics">
                        <div class="part-img">
                            <img src="assets/img/svg/withdraw.svg" alt="investor">
                        </div>
                        <div class="part-text">
                            <span class="counter">255+</span>
                            <span class="title">total withdraw</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-3 col-sm-10 col-md-4">
                    <div class="single-statics">
                        <div class="part-img">
                            <img src="assets/img/svg/money-transfering.svg" alt="investor">
                        </div>
                        <div class="part-text">
                            <span class="counter">265+</span>
                            <span class="title">total transaction</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- statics end -->

<!-- prcing plan begin -->

<!-- prcing plan end -->

<!-- call to action begin -->
<div class="cta">
    <div class="container">
        <div class="cta-bg">
            <div class="row justify-content-xl-between justify-content-lg-between justify-content-md-between justify-content-sm-center">
                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-10 d-xl-flex d-lg-flex d-block align-items-center">
                    <div class="cta-text">
                        <h2>We're Always Thinking Something Different</h2>
                        <p>Our teams boast extensive experience in financial markets; they are constantly in search of innovative, high-performance solutions; we apply full transparency in the information we communicate to our clients and strive at all times to achieve excellence in the standard and bespoke services we provide. </p>
                        
                        <a href="{{ route('login') }}" class="btn-hyipox-medium cta-btn">Start Investing</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 d-xl-flex d-lg-flex justify-content-end d-block align-items-center">
                    <div class="part-video">
                        <img src="{{ asset('assetsh/img/video.jpg') }}" alt="">
                        <button data-video-id="L61p2uyiMSo" class="play-video js-video-button"><i class="fas fa-play"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- call to action end -->

<!-- team begin -->

<!-- team end -->

<!-- transaction begin -->

<!-- transaction end -->

<!-- choosing reson begin -->
<div class="choosing-reason">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8">
                <div class="section-title">
                    <span class="sub-title">
                        You couldn't think
                    </span>
                    <h2>
                        why Wyre Investment and Financial Management Limited is the best
                    </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-sm-10 col-md-12">
                <div class="part-left">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-4">
                            <div class="single-reason">
                                <div class="icon-box">
                                    <div class="part-icon">
                                        <img src="{{ asset('assetsh/img/svg/withdraw.svg') }}" alt="">
                                    </div>
                                </div>
                                <div class="part-text">
                                    <h3 class="title">Get Instant Withdrawals</h3>
                                    <p>Get your payment instantly through requesting it! We don't take percentage</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-4">
                            <div class="single-reason">
                                <div class="icon-box">
                                    <div class="part-icon">
                                        <img src="{{ asset('assetsh/img/svg/referral.svg') }}" alt="">
                                    </div>
                                </div>
                                <div class="part-text">
                                    <h3 class="title">Referral Bonus</h3>
                                    <p>Promote Wyre Investment and Financial Management Limited Investment and earn 5% referral commission from each referral links</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-4">
                            <div class="single-reason">
                                <div class="icon-box">
                                    <div class="part-icon">
                                        <img src="{{asset('assetsh/img/svg/affiliate-marketing.svg')}}" alt="">
                                    </div>
                                </div>
                                <div class="part-text">
                                    <h3 class="title">Join To Affiliate Program</h3>
                                    <p>Our affiliate program is a great way to grow your earning. It's more easy to join with us</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-2 d-xl-flex d-lg-none d-block align-items-end">
                <div class="part-img">
                    <div class="shadow-shape"></div>
                    <img src="{{ asset('assetsh/img/choosing-reason.png') }}" alt="">
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-sm-10 col-md-12">
                <div class="part-right">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-4">
                            <div class="single-reason">
                                <div class="icon-box">
                                    <div class="part-icon">
                                        <img src="{{asset('assetsh/img/svg/bird.svg')}}" alt="">
                                    </div>
                                </div>
                                <div class="part-text">
                                    <h3 class="title"> Profitable Investment</h3>
                                    <p>Our company guarantee the safety of your investment. We secure your capital.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-4">
                            <div class="single-reason">
                                <div class="icon-box">
                                    <div class="part-icon">
                                        <img src="{{ asset('assetsh/img/svg/shield.svg') }}" alt="">
                                    </div>
                                </div>
                                <div class="part-text">
                                    <h3 class="title">SSL Security</h3>
                                    <p>Our system is secured and protected using DDos protection and SSL. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-4">
                            <div class="single-reason">
                                <div class="icon-box">
                                    <div class="part-icon">
                                        <img src="{{ asset('assetsh/img/svg/customer-service.svg') }}" alt="">
                                    </div>
                                </div>
                                <div class="part-text">
                                    <h3 class="title">24/7 Friendly Support</h3>
                                    <p>We provide 24/7 friendly support in Wyre Investment and Financial Management Limited Investment. We're always responsible to take care</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- choosing reson end -->

<!-- testimonial begin -->
<div class="testimonial">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8">
                <div class="section-title">
                    <span class="sub-title">
                        Our Customer Feedback
                    </span>
                    <h2>
                        Clients are happily Satisfied</span>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="all-testimonials">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="testi-text-slider">
                        <div class="single-testimonial">
                            <span class="quot-icon">
                                <img src="{{ asset('assetsh/img/icon/quot.png') }}" alt="">
                            </span>
                            <p>I wish to offer my sincere thanks to Karl and his team at Wyre investment and Financial management for their ongoing expertise and helpfulness. Firstly, from a personal perspective, Karl helped source and set up an appropriate decreasing term life assurance product for me to cover my mortgage on my new home.  Karl can also, equally, assist me in providing financial advice and setting up a portfolio of investment(s)  in Crypto and Gold so that the money 'goes to work' and help ensure that i can receive a steady return on my investments and, if necessary, receive regular payments. I have found Karl and his team to be very professional, remaining both approachable and very knowledgeable, which can be a great comfort to me, in time of need.</p>
                            <div class="part-user">
                                <span class="user-name">Karen mason</span>
                                <!-- <span class="user-location">London, UK</span> -->
                            </div>
                        </div>

                        <div class="single-testimonial">
                            <span class="quot-icon">
                                <img src="{{ asset('assetsh/img/icon/quot.png') }}" alt="">
                            </span>
                            <p>I have been a client of Wyre investment and Financial management LTD for the past 14 months investing in gold. My personal financial advisor is Mr Zack. I have always found Zack to be very friendly and approachable. I find him easy to understand, as well as being knowledgeable and approachable. He has also arranged for me to get to know the more about the investment market, Overall I am very happy with the personal service I receive from Wyre. Incidentally, my portfolio and that of my family has also grown under their guidance!!</p>
                            <div class="part-user">
                                <span class="user-name">C Martin</span>
                                <!-- <span class="user-location">London, UK</span> -->
                            </div>
                        </div>
                        
                        <div class="single-testimonial">
                            <span class="quot-icon">
                                <img src="{{ asset('assetsh/img/icon/quot.png') }}" alt="">
                            </span>
                            <p>I would confidently recommend Wyre investment and Financial management LTD as a professional and expert partner to anyone looking to make important decisions in the complex realm of pensions investments.</p>
                            <div class="part-user">
                                <span class="user-name">Ostrieko</span>
                                <!-- <span class="user-location">London, UK</span> -->
                            </div>
                        </div>
                        

                    </div>
                    <div class="testi-user-slider">
                        
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
</div>
<!-- testimonial end -->

<!-- payment gateway begin -->
<!-- <div class="payment-gateway">
    <div class="container">
        <div class="row justify-content-xl-between justify-content-lg-between justify-content-md-between justify-content-sm-center">
            <div class="col-xl-8 col-lg-8 col-sm-10 col-md-12 d-xl-flex d-lg-flex d-block align-items-center">
                <div class="part-text">
                    <h2>We accepted Local currency, also CryptoCurrencies</h2>
                    <p>Quis nostrud exercitation ullamco laboris nisi utaliquip commodo consequat. Duis aute feeirure dolor voluptate velit esse cillum dolore eu fugiat nulla exercitation ullamco laboris nisi utaliquip commodo consequat. Duis aute feeirure </p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum nemo quasi impedit, voluptatem quae voluptas numquam unde dolor!</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-10 col-md-6">
                <div class="part-crypto">
                    <h3 class="title">for CryptoCurrency payment:</h3>
                    <div class="part-img">
                        <img src="assets/img/crypto-currency.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-sm-10 col-md-12">
                <div class="all-payment">
                <h3 class="title">local payment gateway :</h3>
                    <div class="gateway-slider">
                        <div class="single-payment-way">
                            <img src="assets/img/brand/brand-1.jpg" alt="">
                        </div>
                        <div class="single-payment-way">
                            <img src="assets/img/brand/brand-2.jpg" alt="">
                        </div>
                        <div class="single-payment-way">
                            <img src="assets/img/brand/brand-4.jpg" alt="">
                        </div>
                        <div class="single-payment-way">
                            <img src="assets/img/brand/brand-3.jpg" alt="">
                        </div>
                        <div class="single-payment-way">
                            <img src="assets/img/brand/brand-5.jpg" alt="">
                        </div>
                        <div class="single-payment-way">
                            <img src="assets/img/brand/brand-1.jpg" alt="">
                        </div>
                        <div class="single-payment-way">
                            <img src="assets/img/brand/brand-3.jpg" alt="">
                        </div>
                        <div class="single-payment-way">
                            <img src="assets/img/brand/brand-5.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- payment gateway end -->

<!-- blog begin -->
<!-- <div class="blog">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8">
                <div class="section-title">
                    <span class="sub-title">
                        Oitila Blogs News
                    </span>
                    <h2>
                        Read Investment<span class="special"> News</span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center justify-content-md-start">
            <div class="col-xl-4 col-lg-4 col-sm-10 col-md-6">
                <div class="single-blog">
                    <div class="part-img">
                        <img src="assets/img/blog/blog-1.jpg" alt="">
                        <a href="#"><i class="far fa-eye"></i></a>
                        <div class="post-date">
                            <span class="date">26</span>
                            <span class="month">JAn</span>
                        </div>
                    </div>
                    <div class="part-text">
                        <a href="#" class="title">When coronavirus stops your league</a>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis sint esse vel atque asperiores eligendi vero blanditiis, totam eos beatae hic harum commodi quisquam debitis ipsam obcaecati deserunt nihil? Sed.</p>
                        <a href="#" class="share-btn"><i class="fas fa-share-alt"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-10 col-md-6">
                <div class="single-blog">
                    <div class="part-img">
                        <img src="assets/img/blog/blog-2.jpg" alt="">
                        <a href="#"><i class="far fa-eye"></i></a>
                        <div class="post-date">
                            <span class="date">26</span>
                            <span class="month">JAn</span>
                        </div>
                    </div>
                    <div class="part-text">
                        <a href="#" class="title">When coronavirus stops your league</a>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis sint esse vel atque asperiores eligendi vero blanditiis, totam eos beatae hic harum commodi quisquam debitis ipsam obcaecati deserunt nihil? Sed.</p>
                        <a href="#" class="share-btn"><i class="fas fa-share-alt"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-10 col-md-6">
                <div class="single-blog">
                    <div class="part-img">
                        <img src="assets/img/blog/blog-3.jpg" alt="">
                        <a href="#"><i class="far fa-eye"></i></a>
                        <div class="post-date">
                            <span class="date">26</span>
                            <span class="month">JAn</span>
                        </div>
                    </div>
                    <div class="part-text">
                        <a href="#" class="title">When coronavirus stops your league</a>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis sint esse vel atque asperiores eligendi vero blanditiis, totam eos beatae hic harum commodi quisquam debitis ipsam obcaecati deserunt nihil? Sed.</p>
                        <a href="#" class="share-btn"><i class="fas fa-share-alt"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- blog end -->

@include('user.footerh')