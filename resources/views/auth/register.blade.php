@extends('login_layout')

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
			      <div class="title signup">
					      Signup Form
				    </div>
			  </div>
        <div class="form-container">
  			    <div class="form-inner">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="field">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="field btn">
							              <div class="btn-layer"></div>
							              <input type="submit" name="signup" value="Signup">
						            </div>
                    </form>
            </div>
        </div>
    </body>
</html>
@endsection
