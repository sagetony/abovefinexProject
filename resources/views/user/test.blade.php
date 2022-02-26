

@include('admin.head');
<body class="main-body">

		<!-- Loader -->
		<div id="global-loader" class="light-loader">
			<img src="{{ asset('assetsa/img/loaders/loader.svg') }}" class="loader-img" alt="Loader">
		</div>
        <!-- /Loader -->


        
		<!-- main-signin-wrapper -->
		<div class="my-auto page page-h">
			<div class="main-signin-wrapper">
				
				<div class="sign-up-body wd-md-50p">
					
						<h4>Please Login As Admin</h4>
						<form action="{{ route('adminlogin') }}" method="post">
						@csrf
							<div class="form-group">
								<label>Email</label> <input class="form-control" name="email" id="email" placeholder="Enter your email" type="text">
							</div>
							<div class="form-group">
								<label>Password</label> <input class="form-control" name="password" id="password" placeholder="Enter your password" type="password">
							</div>
							<button class="btn btn-main-primary btn-block" type="submit">Login</button>
                        </form>
                        <div class="main-signup-footer mg-t-10">
                            <p>Create an account? <a href="{{ route('adminregister') }}">Sign In</a></p>
                        </div>
					</div>
					
                    </div>
                    
                
				</div>
			</div>
		</div>
		<!-- /main-signin-wrapper -->

@include('admin.footer');