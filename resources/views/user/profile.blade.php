@include("user.head")

@include("user.header")
	
@include("user.sidebar")
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
          <!-- row -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-3 col-xxl-4">
          <div class="card">
            <div class="card-header pb-0 border-0">
              <h5 class="mb-0 text-black fs-20">My Profile</h5>
              
            </div>
            <div class="card-body">
              <div class="text-center">
                <img src="{{ auth()->user()->photo }}" alt= "" class="rounded ds-img-profile img-fluid">
                <h4 class="fs-26 mt-sm-3 mt-2 mb-sm-3 mb-0 font-w600 text-black">{{ auth()->user()->lastname.' ' .auth()->user()->firstname }}</h4>	
                <p class="mb-0 text-black ">{{ auth()->user()->email }}</p>
                
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-xl-9 col-xxl-8">
          <div class="card">
            <div class="card-header border-0 pb-0">
              <h5 class="mb-0 text-black fs-20">Personal Information</h5>
              
            </div>
            <div class="card-body">
                              <div class="basic-form">
                                <form action="{{ route("profileimage") }}" method="post" enctype="multipart/form-data">
                                  @csrf

                                      <div class="input-group custom_file_input mb-3 ">
                                          <div class="form-file" style="width: 80%;">
                                              <input type="file" name="file" id="file" class="form-file-input form-control " >
                                          </div>
                                      </div>
                  <button class="btn btn-primary btn-sm" type="submit" style="width: 40%;">Save</button>

                                      

                </form>
                <form action="{{ route('profile') }}" method="post">
                  @csrf
                  <div class="card">
                    
                    <div class="card-body">
                      <div class="basic-form">
                        <form>
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">First Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name ="firstname" value="{{ auth()->user()->firstname }}" placeholder="{{ auth()->user()->firstname }}">
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Last Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name ="lastname" value="{{ auth()->user()->lastname }}" placeholder="{{ auth()->user()->lastname }}">
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name ="usertname"value="{{ auth()->user()->username }}" placeholder="{{ auth()->user()->username }}" disabled>
                            </div>
                          </div>	<div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input type="email" class="form-control" name ="email" placeholder="{{ auth()->user()->email }}" value="{{ auth()->user()->email }}" disabled>
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Phone Number</label>
                            <div class="col-sm-9">
                              <input type="tel" class="form-control" name ="phone" value="{{ auth()->user()->phone }}" placeholder="{{ auth()->user()->phone }}">
                            </div>
                          </div>
                          
                          <div class="mb-3"  style="margin-left: 27%">
                            <div>
                              <button type="submit" class="btn btn-primary" style="width: 70%;">Update Profile</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
              `	</form>
                              </div>
                          </div>
          </div>
        </div>
        
        
      </div>
      <div class="row" style="margin-top: -10%;">
        <div class="col-xl-3 col-xxl-4">
          
        </div>
        <div class="col-xl-9 col-xxl-8">
          <div class="card">
            <div class="card-header border-0 pb-0">
              <h5 class="mb-0 text-black fs-20">Security Information</h5>
              
            </div>
            <div class="card-body">
                              <div class="basic-form">
                <form action="{{ route("profilepass") }}" method="post">
                  @csrf
                  <div class="card">
                    
                    <div class="card-body">
                      <div class="basic-form">
                        <form>
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Current Password</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="current_password"  type="password" placeholder="**********">
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">New Password</label>
                            <div class="col-sm-9">
                              <input  class="form-control" name="password" type="password" placeholder="**********" >
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Confirm Password</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="password_confirmation"  type="password" placeholder="**********" >
                            </div>
                          </div>
                        
                          
                          <div class="mb-3"  style="margin-left: 25%">
                            <div>
                              <button type="submit" class="btn btn-primary" style="width: 80%;">Update Password</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
              `	</form>
                              </div>
                          </div>
          </div>
        </div>
        
        
      </div>
          </div>
      </div>
      <!--**********************************
          Content body end
      ***********************************-->

@include("user.footer")

