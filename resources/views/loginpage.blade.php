<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>Login Page</title>
		<!--Meta Tag-->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--External CSS-->
		<link rel="stylesheet" href="login.css">
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
				<div class="title signup">
					Signup Form
				</div>
			</div>
			<div class="form-container">
				<div class="slide-controls">
					<input type="radio" name="slide" id="login" checked>
					<input type="radio" name="slide" id="signup">
					<label for="login" class="slide login">Login</label>
					<label for="signup" class="slide signup">Signup</label>
					<div class="slider-tab"></div>
				</div>
				<div class="form-inner">
					<form method="post" action="{{route('login')}}" class="login">
                        @csrf
                        @method('POST')
						<div class="field">
							<input type="text" name="username" placeholder="Username" required>
						</div>
						<div class="field">
							<input type="password" name="password" placeholder="Password" required>
						</div>
						<div class="field btn">
							<div class="btn-layer"></div>
							<input type="submit" name="login" type="button" value="Login">
						</div>
						<div class="signup-link">
							Not a member? <a href=""{{route('signup')}}"">Signup now</a>
						</div>
					</form>
					<form action="{{route('signup')}}" method="post" class="signup">
                        @csrf
                        @method('POST')
						<div class="field">
							<input type="text" name="username" placeholder="Username" required>
						</div>
						<div class="field">
							<input type="password" name="password" placeholder="Password" required>
						</div>
						<div class="field btn">
							<div class="btn-layer"></div>
							<input type="submit" name="signup" value="Signup">
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
