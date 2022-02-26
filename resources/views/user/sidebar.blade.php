<div class="deznav">
	<div class="deznav-scroll">
		<ul class="metismenu" id="menu">
			<li><a class="ai-icon" href="{{ route('dashboard') }}" aria-expanded="false">
					<i class="flaticon-381-networking"></i>
					<span class="nav-text">Dashboard</span>
				</a>
			
			</li>
			<li><a class="ai-icon" href="{{ route('profile') }}" aria-expanded="false">
				<i class="flaticon-381-user-4
				"></i>
					<span class="nav-text">Edit Profile</span>
				</a>
			   
			</li>
			<li><a class="ai-icon" href="{{ route('fund') }}" aria-expanded="false">
					<i class="flaticon-381-id-card
					"></i>
					<span class="nav-text">Fund Wallet</span>
				</a>
				
			</li>
			<li><a class="ai-icon" href="{{ route('signalbuy') }}" aria-expanded="false">
					<i class="flaticon-381-internet"></i>
					<span class="nav-text">Signal Purchase</span>
				</a>
			   
			</li>
			<li><a class="ai-icon" href="{{ route('signal') }}" aria-expanded="false">
				<i class="flaticon-381-internet"></i>
				<span class="nav-text">VIP Signal</span>
			</a>
		   <li><a class="ai-icon" href="{{ route('robot') }}" aria-expanded="false">
					<i class="flaticon-381-settings"></i>
					<span class="nav-text">Robot Offer</span>
				</a>
			   
			</li>
		</li>
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-381-network
					"></i>
					<span class="nav-text">Investment</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="{{ route('deposit') }}">Invest Funds</a></li>
					<li><a href="{{ route('deposithistory') }}">Investment History</a></li>
				   
				</ul>
			</li>
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
				<i class="flaticon-381-briefcase

				"></i>
				<span class="nav-text">Withdrawal</span>
			</a>
			<ul aria-expanded="false">
				<li><a href="{{ route('withdraw') }}">Withdraw Funds</a></li>
				<li><a href="{{ route('withdrawhistory') }}">Withdraw History</a></li>
			   
			</ul>
		</li>
		   
			<li><a class=" ai-icon" href="{{ route('support') }}" aria-expanded="false">
					<i class="flaticon-381-notepad"></i>
					<span class="nav-text">Support</span>
				</a>
			   
			</li>
			
			<li><a class="ai-icon" href="{{ route('logout') }}" aria-expanded="false">
					<i class="flaticon-381-lock-2"></i>
					<span class="nav-text">Logout</span>
				</a>
				
			</li>
		</ul>
	
		<div class="book-box">
			<img src="{{ asset('assetsn/images/book.png') }}" alt="">
			<a href="javascript:void(0);">AboveFinex</a>
		</div>
		<div class="copyright">
			<p> © 2022 All Rights Reserved</p>
			<p class="fs-12">by AboveFinex</p>
		</div>
	</div>
</div>