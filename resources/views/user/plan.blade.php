@include('user.headh')
@include('user.headerh')

 <!-- breadcrumb begin -->
 <div class="breadcrumb-oitila">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-8">
                <div class="part-txt">
                    <h1>investment plan</h1>
                    <ul>
                        <li>home</li>
                        <li>plan</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-4 d-flex align-items-center">
                <div class="part-img">
                    <img src="{{ asset('assetsh/img/breadcrumb-img.png') }}" alt="image">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<!-- contact begin -->
<div class="pricing-plan" style="margin-top:-10px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8">
                <div class="section-title">
                    <span class="sub-title">
                        Investment Package
                    </span>
                    <h2>
                        Check out our Investment Plans!
                        
                    </h2>
                   
                </div>
                
            </div>
        </div>
        <h3 style="text-align: center;"> <span class="special"></span>Cryptocurrency Investment Plans</span>
                        
        </h3>
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
                            <li><i class="fas fa-check"></i> Minimum Deposit $5000</li>
                            <li><i class="fas fa-check"></i> 30% Traders commission</li>
                            <li><i class="fas fa-check"></i> 45% capital insurance</li>
                            <li><i class="fas fa-check"></i> Dedicated Portfolio Manager</li>
                            <li><i class="fas fa-check"></i> 24/7 Online Support</li>
                        </ul>
                    </div>
                    <div class="price-info">
                        <span class="parcent">$5000</span>
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
                            <li><i class="fas fa-check"></i> Minimum Deposit $50000</li>
                            <li><i class="fas fa-check"></i> 30% Traders commission</li>
                            <li><i class="fas fa-check"></i> 45% capital insurance</li>
                            <li><i class="fas fa-check"></i> Dedicated Portfolio Manager</li>
                            <li><i class="fas fa-check"></i> 24/7 Online Support</li>
                        </ul>
                    </div>
                    <div class="price-info">
                        <span class="parcent">$50000</span>
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
                            <li><i class="fas fa-check"></i> Minimum Deposit $50000</li>
                            <li><i class="fas fa-check"></i> 30% Traders commission</li>
                            <li><i class="fas fa-check"></i> 45% capital insurance</li>
                            <li><i class="fas fa-check"></i> Dedicated Portfolio Manager</li>
                            <li><i class="fas fa-check"></i> 24/7 Online Support</li>
                        </ul>
                    </div>
                    <div class="price-info">
                        <span class="parcent">$50000</span>
                        <span class="price">2% <small>daily</small></span>
                    </div>
                    <a href="{{ route('login') }}" class="btn-hyipox-medium price-button">Invest now</a>
                </div>
            </div>
        </div>
        <h3 style="text-align: center; margin-top: 20px;"> <span class="special"></span>Gold Investment Plans</span>
                        
        </h3>
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
                            <li><i class="fas fa-check"></i> Minimum Deposit $1860</li>
                            <li><i class="fas fa-check"></i> 30% Traders commission</li>
                            <li><i class="fas fa-check"></i> 45% capital insurance</li>
                            <li><i class="fas fa-check"></i> Dedicated Portfolio Manager</li>
                            <li><i class="fas fa-check"></i> 24/7 Online Support</li>
                        </ul>
                    </div>
                    <div class="price-info">
                        <span class="parcent">$1860</span>
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
                            <li><i class="fas fa-check"></i> Minimum Deposit $50000</li>
                            <li><i class="fas fa-check"></i> 30% Traders commission</li>
                            <li><i class="fas fa-check"></i> 45% capital insurance</li>
                            <li><i class="fas fa-check"></i> Dedicated Portfolio Manager</li>
                            <li><i class="fas fa-check"></i> 24/7 Online Support</li>
                        </ul>
                    </div>
                    <div class="price-info">
                        <span class="parcent">$50000</span>
                        <span class="price">2% <small>daily</small></span>
                    </div>
                    <a href="{{ route('login') }}" class="btn-hyipox-medium price-button">Invest now</a>
                </div>
            </div>
            
        </div>
    </div>

</div>

<!-- contact end -->
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
        





@include('user.footerh')