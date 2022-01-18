@include('user.headh')
@include('user.headerh')
 <!-- breadcrumb begin -->
 <div class="breadcrumb-oitila">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-8">
                <div class="part-txt">
                    <h1>contact</h1>
                    <ul>
                        <li>home</li>
                        <li>contact page</li>
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
<div class="contact contact-page mb-4" id="contact">
    <div class="container container-contact">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8">
                <div class="section-title">
                    <span class="sub-title">
                        Contact Us
                    </span>
                    <h2>
                        Get in touch with us
                    </h2>
                </div>
            </div>
        </div>
        <div class="bg-tamim">
            <div class="row justify-content-around">
                <div class="col-xl-6 col-lg-6 col-sm-10 col-md-6">
                    <div class="part-form">
                        <form>
                            <input type="text" placeholder="FullName">
                            <input type="text" placeholder="Email">
                            <textarea placeholder="Write to Us..."></textarea>
                            <button class="submit-btn def-btn" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-sm-10 col-md-6">
                    <div class="part-address">
                        <div class="addressing">
                            <div class="single-address">
                                <h4>Our Office</h4>
                                <p>Summerdale Head Dyke Lane


                                    <br/>                                                Pilling, Preston, Lancashire, PR3 63J, U.K
                                    s</p>
                            </div>
                            <div class="single-address">
                                <h4>Email</h4>
                                <p>support@wryeltd.com

                                    <br/>
                                    </p>
                            </div>
                            <div class="single-address">
                                <h4>Phone</h4>
                                <p>+447915605108

                                    <br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact end -->




@include('user.footerh')