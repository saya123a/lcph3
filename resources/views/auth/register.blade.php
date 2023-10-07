@extends('login_layout')

@section('content')

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
	    <title>Signup Page</title>
		    
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
		        <div class="title signup">
			          Signup Form
	            </div>
            </div>
            <div class="form-container">
  			    <div class="form-inner">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="field">
                            <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="field btn">
						    <div class="btn-layer"></div>
							<input type="submit" name="signup" value="Signup">
					    </div>
                        <div class="signup-link">
							<br>
                            @if (Route::has('login'))
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif
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
