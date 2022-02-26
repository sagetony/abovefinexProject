            <!-- main-sidebar opened -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll ">
    <div class="main-sidebar-header">
        <a class=" desktop-logo logo-light" href="./"><img src="{{ asset("images/log.png") }}" width="200" class="main-logo" alt="logo"></a>
        <a class=" desktop-logo logo-dark" href="./"><img src="{{ asset("images/log.png") }}" width="200" class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light" href="./"><img src="{{ asset("images/log.png") }}" width="200" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark" href="./"><img src="{{ asset("images/log.png") }}" width="200" class="logo-icon dark-theme" alt="logo"></a>
    </div>
    <div class="main-sidebar-body circle-animation ">

        <ul class="side-menu circle">
            <li><h3 class="">Dashboard</h3></li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin') }}"><i class="side-menu__icon ti-desktop"></i><span class="side-menu__label">Dashboard</span></a>
            </li>
            <li><h3>My Profile</h3></li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('adminprofile') }}"><i class="side-menu__icon ti-user"></i><span class="side-menu__label">Admin Account</span></a>
            </li>
            
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-package"></i><span class="side-menu__label">Manage User</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('adminusers') }}">All Users</a></li>
                    <!-- <li><a class="slide-item" href="deposithistory.php">Add Users</a></li> -->
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-wallet"></i><span class="side-menu__label">Payment</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('adminfunding') }}">Deposits</a></li>
                    <li><a class="slide-item" href="{{ route('admininvest') }}">Investment</a></li>
                    <li><a class="slide-item" href="{{ route('adminsignalbuy') }}">Signal Fund</a></li>
                    <li><a class="slide-item" href="{{ route('adminwithdraw') }}">Robots Fund</a></li>
                    <li><a class="slide-item" href="{{ route('adminwithdraw') }}">Withdraw</a></li>
                    <li><a class="slide-item" href="{{ route('admindeposit') }}">Add Interest</a></li>

                    
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('sms') }}"><i class="side-menu__icon ti-desktop"></i><span class="side-menu__label">Signal</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('adminsupport') }}"><i class="side-menu__icon ti-email  menu-icons"></i><span class="side-menu__label">Support</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('adminlogout') }}"><i class="side-menu__icon fas fa-sign-out-alt menu-icons"></i><span class="side-menu__label">Log Out</span></a>
            </li>
            
            </li>
        </ul>
    </div>
</aside>