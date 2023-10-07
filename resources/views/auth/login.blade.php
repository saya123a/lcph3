@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
	    <title>Login Page</title>
		    
        <!--Meta Tag-->
		    <meta charset="utf-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		    
        <!--External CSS-->
		    <link rel="stylesheet" href="{{ asset('login.css') }}">
		    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
				<div class="slide-controls">
			    	<input type="radio"  id="login" checked>
			        <label for="login" login">Login</label>
                    <div class="slider-tab"></div>
				</div>
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
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="field btn">
						    <div class="btn-layer"></div>
							<input type="submit" name="login" type="button" value="Login">
                        </div>
                        <div class="signup-link">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
							Not a member? <a href="">Signup now</a>
						</div>
                    </form>
                </div>
            </div>
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
		    </script>
	  </body>
</html>
@endsection
