<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
		<title>Living Legacy</title>
		<meta name="keywords" content="" />
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600,800,900|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{asset('owner/vendor/bootstrap/css/bootstrap.css')}}" />
		<link rel="stylesheet" href="{{asset('owner/vendor/animate/animate.css')}}">

		<link rel="stylesheet" href="{{asset('owner/vendor/font-awesome/css/all.min.css')}}" />
		<link rel="stylesheet" href="{{asset('owner/vendor/magnific-popup/magnific-popup.css')}}" />
		<link rel="stylesheet" href="{{asset('owner/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" />

		<!--(remove-empty-lines-end)-->

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{asset('owner/css/theme.css')}}" />


		<!--(remove-empty-lines-end)-->



		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{asset('owner/css/skins/default.css')}}" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{asset('owner/css/custom.css')}}">

		<!-- Head Libs -->
		<script src="{{asset('owner/vendor/modernizr/modernizr.js')}}"></script>

	</head>
	<body >
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				
				<div style="margin-bottom: 80px; text-align: center;">
					<a href="{{route('login_default')}}" class="logo float-left mb-3">
						<img width="100%" src="{{asset('owner/img/logo.png')}}" alt="Logo" />
					</a>
				</div>
				

				<div class="panel card-sign mt-5">
					<div class="card-body">
						<h2 class="text-center">REGISTRATION</h2>
						@if (Session::has('message'))
				          <br>
				         <div class="alert alert-danger alert-dismissible fade show" role="alert">
						  {{Session::get('message')}}
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
				         @endif
						<form action="{{route('joinnow_save')}}" method="post">
							<input type="hidden" name="_token" value="<?php echo csrf_token();?>">

							<div class="form-group mb-3">
								<label>Inviter</label>
								<div class="input-group">
									<input type="hidden" name="inviter" value="{{$invitee->email}}">
									<input type="hidden" name="inviter_id" value="{{$invitee->id}}">
									<input disabled type="text" class="form-control" value="{{$invitee->name}}" />
									<span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-user"></i>
										</span>
									</span>
								</div>
							</div>
							<div class="form-group mb-3">
								<label>Full Name</label>
								<div class="input-group">
									<input required name="name" type="text" class="form-control" />
									<span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-signature"></i>
										</span>
									</span>
								</div>
							</div>
							
							<div class="form-group mb-3">
								<label>Email</label>
								<div class="input-group">
									<input required name="email" type="email" class="form-control" />
									<span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-at"></i>
										</span>
									</span>
								</div>
							</div>
							<div class="form-group mb-3">
								<label>Phone</label>
								<div class="input-group">
									<input required name="phone" type="text" class="form-control" />
									<span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-phone"></i>
										</span>
									</span>
								</div>
							</div>
							<div class="form-group mb-3">
								<label>Select preferred gifting method</label>
								<div class="input-group">
									<select required name="gift_method" type="text" class="form-control" />
										<option value="Venmo">Venmo</option>
										<option value="Zelle">Zelle</option>
										<option value="Paypal">Paypal</option>
										<option value="Cashapp">Cashapp</option>
										<option value="Xoom">Xoom</option>
										<option value="Google Pay">Google Pay</option>
										<option value="Other">Other</option>
									</select>
									<span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-gift"></i>
										</span>
									</span>
								</div>
							</div>
							<div class="form-group mb-3">
								<label>Gift Method Username</label>
								<div class="input-group">
									<input required name="gift_username" type="text" class="form-control" />
									<span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-gift"></i>
										</span>
									</span>
								</div>
							</div>
							<div class="form-group mb-3">
								<label>Password</label>
								<div class="input-group">
									<input required name="password" type="password" class="form-control" />
									<span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-lock"></i>
										</span>
									</span>
								</div>
							</div>
							

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="accept" name="accept" type="checkbox"/ value="accepted">
										<label for="RememberMe">Accept <a  href="{{ URL::to( '/owner/privacy.pdf') }}" target="_blank">Privacy Policy</a></label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button disabled id="joinnow" type="submit" class="btn btn-primary mt-2">Join Now</button>
								</div>
							</div>

							<span class="mt-3 mb-3 line-thru text-center text-uppercase">
								<span>or</span>
							</span>

							

							<p class="text-center">Already have an account yet? <a href="{{route('login_default')}}">Sign in</a></p>

						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-3 mb-3">&copy; Copyright {{date("Y")}}. All Rights Reserved.</p>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="{{asset('owner/vendor/jquery/jquery.js')}}"></script>
		<script src="{{asset('owner/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
		<script src="{{asset('owner/vendor/popper/umd/popper.min.js')}}"></script>
		<script src="{{asset('owner/vendor/bootstrap/js/bootstrap.js')}}"></script>
		<script src="{{asset('owner/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
		<script src="{{asset('owner/vendor/common/common.js')}}"></script>
		<script src="{{asset('owner/vendor/nanoscroller/nanoscroller.js')}}"></script>
		<script src="{{asset('owner/vendor/magnific-popup/jquery.magnific-popup.js')}}"></script>
		<script src="{{asset('owner/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
		
		<!-- Specific Page Vendor -->


		<!--(remove-empty-lines-end)-->
		
		<!-- Theme Base, Components and Settings -->
		<script src="{{asset('owner/js/theme.js')}}"></script>
		
		<!-- Theme Custom -->
		<script src="{{asset('owner/js/custom.js')}}"></script>
		
		<!-- Theme Initialization Files -->
		<script src="{{asset('owner/js/theme.init.js')}}"></script>

		<script type="text/javascript">
		  	// switch change if metric applied
         $(document).ready(function(){
             
              $(document).on('change', '#accept', function() {
                if(this.checked) {
                  $("#joinnow").removeAttr("disabled");
                }
                else{
                     $("#joinnow").attr("disabled","1");
                }
              });
              
         });
         // switch change if metric applied end
	  </script>

	</body>
</html>