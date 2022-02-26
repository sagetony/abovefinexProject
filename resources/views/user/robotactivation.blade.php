<!DOCTYPE html>
<html lang="en" class="h-100">


<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="admin, dashboard" />
	<meta name="author" content="DexignZone" />
	<meta name="robots" content="index, follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Sign up to your account. AboveFinex Investment Limited is the leading financial establishment providing high-quality international investment services" />
	<meta property="og:title" content="Sign up to your account. AboveFinex Investment Limited is the leading financial establishment providing high-quality international investment services" />
	<meta property="og:description" content="Sign up to your account. AboveFinex Investment Limited is the leading financial establishment providing high-quality international investment services" />
	<meta property="og:image" content="social-image.png"/>
	<meta name="format-detection" content="telephone=no">
    <title>Trading Account Activation | AboveFinex Forex Investment Limited</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{'assetsn/images/favicon.png'}}">
	<link href="{{ asset('assetsn/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsn/css/style.css') }}" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="#"><img src="{{ asset('assetsn/images/logo-full.png') }}" alt=""></a>
                                    </div>
                                    <marquee><h4>Please Don't Change Your Trading ID</h4></marquee>
                                    <form action="{{ route('tradingactivation') }}" method="post">
                                        @csrf 
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Trading ID</strong></label>
                                            <input type="text" name="id" class="form-control" value="{{ $id }}">
                                        </div>                                       
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Broker</strong></label>
                                            <input type="text" name="broker" class="form-control" placeholder="Enter Broker">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Trading ID</strong></label>
                                            <input type="text" name="tradingID" class="form-control" placeholder="Trading ID">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Trading Password</strong></label>
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Activate</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{ asset('assetsn/vendor/global/global.min.js') }}"></script>
<script src="{{asset('assetsn/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{ asset('assetsn/js/custom.min.js') }}"></script>
<script src="{{ asset('assetsn/js/deznav-init.js')}}"></script>
<script src="{{ asset('assetsn/js/demo.js') }}"></script>
<script src="{{ asset('assetsn/js/styleSwitcher.js') }}"></script>
@include('sweetalert::alert')

</body>

<!-- Mirrored from kripton.dexignzone.com/xhtml/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Jan 2022 15:02:25 GMT -->
</html>