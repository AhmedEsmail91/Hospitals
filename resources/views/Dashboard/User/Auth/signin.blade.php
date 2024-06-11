@extends('dashboard.layouts.master2')@section('css')
<style>
	.loginform{
		display: none;
	}

</style>
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">


@endsection

@section('content')
				<div class="main-header-center ml-2">
							<ul class="nav">
								<li class="">
									<div class="dropdown  nav-itemd-none d-md-flex">
										<a href="#" class="d-flex  nav-item nav-link pl-0 country-flag1" data-toggle="dropdown"
										aria-expanded="false">
											@if (App::getLocale() == 'ar')
												<span class="avatar country-Flag mr-0 align-self-center bg-transparent">
													<i class="flag-icon flag-icon-eg"></i>
												</span>
												<strong
													class="mr-2 ml-2 my-auto">{{ LaravelLocalization::getCurrentLocaleName() }}</strong>
											@else
												<span class="avatar country-Flag mr-0 align-self-center bg-transparent"><i class="flag-icon flag-icon-us"></i></span>
												<strong
													class="mr-2 ml-2 my-auto">{{ LaravelLocalization::getCurrentLocaleName() }}</strong>
											@endif
											<div class="my-auto">
											</div>
										</a>
										<div class="dropdown-menu dropdown-menu-{{App::getLocale()=="ar"?"left":"right"}} " x-placement="bottom-end">
											@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
												<a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
												href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
													@if($properties['native'] == "English")
														<i class="flag-icon flag-icon-us"></i>
													@elseif($properties['native'] == "العربية")
														<i class="flag-icon flag-icon-eg"></i>
													@endif
													{{ $properties['native'] }}
												</a>
											@endforeach
										</div>
									</div>
								</li>
           					</ul>
							</div>
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('Dashboard/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>
				
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('Dashboard/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>{{trans('Dashboard/login_trans.welcome_back')}}</h2>
													@if ($errors->any())
														<div class="alert alert-danger">
															<ul>
																@foreach ($errors->all() as $error)
																	{{ $error }}
																@endforeach
															</ul>
														</div>
													@endif
												<!-- Roles -->
												<div class="form-group">
													<label for="ٌRoleSelection">{{trans('Dashboard/login_trans.role_selection')}}</label>
													<select class="form-control" id="ٌRoleSelection">
													<option selected disabled>{{trans('Dashboard/login_trans.user_role_chooser')}}</option>
													<option>User</option>
													<option>Admin</option>
													<!-- <option>4</option>
													<option>5</option> -->
													</select>
												</div>
												

												<!-- /Roles -->
												 <!-- user_form -->
												 <div class="loginform" id="user">
													<h5 class="font-weight-semibold mb-4">Please sign in as User to continue.</h5>
													<form method="post" action= "{{route('login.user')}}">
														@csrf
														<div class="form-group">
															<label>Email</label> <input class="form-control" placeholder="Enter your email" type="email" name="email" :value="old('email')" required autofocus>
														</div>
														<div class="form-group">
															<label>Password</label> <input class="form-control" placeholder="Enter your password" type="password" name="password" required autocomplete="current-password" >
														</div><button class="btn btn-main-primary btn-block">Sign In</button>
														<div class="row row-xs">
															<div class="col-sm-6">
																<button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
															</div>
															<div class="col-sm-6 mg-t-10 mg-sm-t-0">
																<button type="submit" class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
															</div>
														</div>
													</form>
													<div class="main-signin-footer mt-5">
														<p><a href="">Forgot password?</a></p>
														<p>Don't have an account? <a href="{{ url('/' . $page='signup') }}">Create an Account</a></p>
													</div>
												</div>
												 <!-- /user_form -->

												  <!-- admin_form -->
												 <div class="loginform" id="admin">
													<h5 class="font-weight-semibold mb-4">Please sign in as Admin to continue.</h5>
													<form method="post" action= "{{route('login.admin')}}">
														@csrf
														<div class="form-group">
															<label>Email</label> <input class="form-control" placeholder="Enter your email" type="email" name="email" :value="old('email')" required autofocus>
														</div>
														<div class="form-group">
															<label>Password</label> <input class="form-control" placeholder="Enter your password" type="password" name="password" required autocomplete="current-password" >
														</div><button class="btn btn-main-primary btn-block">Sign In</button>
														<!-- <div class="row row-xs">
															<div class="col-sm-6">
																<button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
															</div>
															<div class="col-sm-6 mg-t-10 mg-sm-t-0">
																<button type="submit" class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
															</div>
														</div> -->
													</form>
													<div class="main-signin-footer mt-5">
														<p><a href="">Forgot password?</a></p>
														<!-- <p>Don't have an account? <a href="{{ url('/' . $page='signup') }}">Create an Account</a></p> -->
													</div>
												</div>
												 <!-- /admin_form -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection
@section('js')
	<script>
		$(document).ready(function(){ // This is a jQuery method that ensures the code inside it only runs after the DOM (Document Object Model) is fully loaded. This is important because it guarantees that all HTML elements are available for manipulation by the script.
			$('#ٌRoleSelection').change(function(){
				var role = $(this).val(); // (this) word refers to the element that triggered the event(RoleSelection)
				
				if(role == 'User'){
					$('#user').show();
					$('#admin').hide();
				}else if(role == 'Admin'){
					$('#admin').show();
					$('#user').hide();
				}
				else{
					$('#user').hide();
					$('#admin').hide();
				}
			});
		});
	</script>
	<!-- 
		$(document).ready(function(){...});: This is a jQuery method that ensures the code inside it only runs after the DOM (Document Object Model) is fully loaded. This is important because it guarantees that all HTML elements are available for manipulation by the script.

		$('#ٌRoleFrom').change(function(){...});: This line attaches an event listener to an HTML element with the ID ٌRoleFrom, which is presumably a dropdown (<select>) element. The .change() method listens for any change in the selected option of the dropdown. When a change occurs, the anonymous function provided as an argument to .change() is executed.

		var role = $(this).val();: Inside the change event listener, $(this) refers to the #ٌRoleFrom element that triggered the event. .val() gets the value of the currently selected option in the dropdown. This value is stored in the variable role, which is then used to determine which elements to show or hide.

		The if statement checks the value of role. If role == 'Patient', it executes the code block that shows the HTML element with the ID user and hides the element with the ID admin. This is done using the jQuery .show() and .hide() methods, respectively.

		Conversely, if role == 'Admin', the else if block is executed, showing the admin element and hiding the user element. 
	-->
@endsection