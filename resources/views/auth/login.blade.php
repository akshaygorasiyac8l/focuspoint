@extends('layouts.app')
@section('script1')
@endsection
@section('content')
	@section('header')
		
	@endsection

	@section('sidebar')
		
	@endsection 

<div class="section-background	">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="login-box">
						<img src="images/FocusPoint_Logo.png" alt="Logo" class="img-responsive logo-set">
						<h4 class="login-title">Login</h4>
						<form method="POST" >
                        @csrf
							<div style="color:#f00;" class="errordata"></div>
							<div class="form-group">
								<input id="email" type="email"  name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group">
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="sec-remember">
								<div class="form-group check-rem">
									<input type="checkbox" class="form-control check" placeholder="Username / Email Address">
									<label class="remember-me">Remember Me</label>
								</div>
								<div class="form-group forget">
									<a href="" class="forget-password">Forgot Password</a>
								</div>
							</div>
							<div class="form-group btn-sec">
								<button type="button" class="btn btn-info login-btn">Login</button>
							</div>
							<input type="hidden" id="csrf_token" name="csrf"  value="{{csrf_token()}}" />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection
@section('script2')
	<script>
	    $(document).ready(function() {
			$.ajaxSetup({
			  headers: {
				  'X-CSRF-TOKEN': $('#csrf_token').val()
			  }
			});
			$('html').on("click",".login-btn",function(){
				$('.errordata').html('');
				var email = $('#email').val();
				var password = $('#password').val();
	 
			  
				var url = "{{ url('userlogin') }}";

				$.ajax({
					url: url,
					type: "POST",
					data: {email: email,password: password},
					success: function (data) {
							  console.log(data);
							  if(data.class=='success'){
								  window.location.href = "{{ url('home') }}";
							  }else{
								  $('.errordata').html(data.message);
							  }
							  

					},
					error: function (data) {
						console.log('Error:', data);
					}
				});
				
		  });
		});
	</script>
@endsection