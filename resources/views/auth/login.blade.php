@extends('login_layout')

@section('content')

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
	    <title>Login</title>
		    
        <!--Meta Tag-->
		    <meta charset="utf-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		    
        <!--External CSS-->
		    <link rel="stylesheet" href="{{ asset('login.css') }}">
		    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        
        <!-- Include Bootstrap CSS and JavaScript -->
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

		    <style>
		    	  html,body
		    	  {
		    	    	display: grid;
		        		height: 100%;
		        		width: 100%;
		        		place-items: center;
		        		background: url("img/surau.jpg") no-repeat center;
			        	background-size: cover;
			      }
		    </style>
    </head>
    <body>	
	    <div class="wrapper">
		  	<div class="title-text">
		       	<div class="title login">
		   			Login Form
		       	</div>
		    </div>
            <div class="form-container">
                <div class="form-inner">
                    <form method="POST" action="{{ route('login') }}" class="login">
                        @csrf
                        <div class="field">
                            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
                        <div class="field">
                            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
						    @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--<div class="signup-link">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
						</div>-->
                        <div class="field btn">
						    <div class="btn-layer"></div>
							<input type="submit" name="login" type="button" value="Login">
                        </div>
                        <div class="signup-link">
							<br>Not a member?
                            @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Signup now') }}</a>
                            @endif
						</div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Remove the Bootstrap modal section -->
<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
    <!-- Modal content here -->
</div>

        <script>
		        const loginText = document.querySelector(".title-text .login");
		      	const loginForm = document.querySelector("form.login");
		      	const loginBtn = document.querySelector("label.login");
		      	const signupBtn = document.querySelector("label.signup");
		      	const signupLink = document.querySelector("form .signup-link a");
			    signupBtn.onclick = (()=>{
			        	loginForm.style.marginLeft = "-50%";
			        	loginText.style.marginLeft = "-50%";
		      	});
			    loginBtn.onclick = (()=>{
			        	loginForm.style.marginLeft = "0%";
			        	loginText.style.marginLeft = "0%";
			    });
			    signupLink.onclick = (()=>{
			        	signupBtn.click();
			        	return false;
			    });
            <!-- Add the following script to your Blade file -->
    @if($errors->any())
        var errorMessage = '';
        @foreach ($errors->all() as $error)
            errorMessage += '{{ $error }}\n';
        @endforeach
        alert(errorMessage);
    @endif

        </script>
	</body>
</html>
@endsection
