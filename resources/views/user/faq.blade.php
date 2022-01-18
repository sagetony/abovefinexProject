@include('user.headh')
@include('user.headerh')

 <!-- breadcrumb begin -->
 <div class="breadcrumb-oitila">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-8">
                <div class="part-txt">
                    <h1>faq</h1>
                    <ul>
                        <li>home</li>
                        <li>faq</li>
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

 <!-- faq begin -->
 <div class="faq">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-3 col-lg-3 col-md-4">
                <div class="faq-sidebar">
                    <div class="search-widget">
                        <form>
                            <input type="text" placeholder="Search here">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">General Questions</a>
                       
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8">
                <div class="faq-content">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="single-faq">
                                <h4> What is the minimum percentage that an investor can earn on Wryeltd?</h4>
                                <p>In Wryeltd Investment the minimum percentage to earn is 1.4% daily.</p>
                            </div>

                            <div class="single-faq">
                                <h4>Can I invest using cryptocurrency?</h4>
                                <p>Yea, in wryeltd investment we only accept funds using cryptocurrency.</p>
                            </div>

                            <div class="single-faq">
                                <h4>What are the minimum and maximum deposit amounts?</h4>
                                <p>Wryeltd Investment is for all, our minimum deposit is 100 dollars and we don't have maximum deposit, you can deposit as much as you want on Wryeltd.</p>
                            </div>
                            <div class="single-faq">
                                <h4>How long will the money arrive in my account after the withdrawal process?</h4>
                                <p>Your money will arrive 10-15 minutes after you initiate the withdrawal process.</p>
                            </div>
                            
                            <div class="single-faq">
                                <h4>What payment system can i use to withdraw?</h4>
                                <p>Wryeltd encourages crytocurrencies for withdrawal. For withdrawal your wallet address will be needed.</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                           
                            
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- faq end -->

        





@include('user.footerh')