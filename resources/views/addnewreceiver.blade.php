<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Add New Receiver</title>
		<!--Meta Tag-->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--External CSS-->
		<link rel="stylesheet" href="update.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	</head>
	<body>
        <nav class="navbar">
			<div class="content">
				<div class="logo">
					<img class="lcph" src="img/logo_surau.png" ></a> 	
				</div>
				<ul class="menu-list">
					<div class="icon cancel-btn">
						<i class="fas fa-times"></i>
					</div>
					<li><a href="{{ route('home') }}">Home</a></li>
					<li>
						<div class="dropdown">
							<a button class="dropbtn">Update</button></a>
							<div class="dropdown-content">
								<div class="sub-dropdown">
									<a class="sub-dropbtn">Stocks</a>
									<div class="sub-dropdown-content">
										<a href="{{ route('addcurrentitem') }}">Add Current Stocks</a>
										<a href="{{ route('addnewitem') }}">Add New Stocks</a>
										<a href="{{ route('deletecurrentitem') }}">Delete Current Stocks</a>
									</div>
								</div>
								<div class="sub-dropdown">
									<a class="sub-dropbtn">Receiver</a>
									<div class="sub-dropdown-content">
										<a href="{{ route('addnewreceiver') }}">Add New Receiver</a>
										<a href="deletecurrentreceiver.html">Delete Current Receiver</a>
									</div>
								</div>
							</div>	
						</div>
					</li>
					<li><a href="checkoutmain.php">Checkout</a></li>
					<li>
                        <div class="dropdown">
                            <a button class="dropbtn id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                            </button></a>
							<div class="dropdown-content">
							    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
	                        </div>
                        </div>
                    </li>
				</ul>
				<div class="icon menu-btn">
					<i class="fas fa-bars"></i>
				</div>
			</div>
		</nav>
		<div class="banner"></div>
		<main class="container">
			<section class="data-entry">
				<h2>Enter Details Required</h2>
				<form action="{{ route('addnewreceivers') }}" method="POST">
          @csrf
					<div class="data-input">
						<label for="receiver_ic">IC:</label>
						<input type="text" id="ic" name="ic" pattern="[0-9]{12}" title="Receiver IC must be exactly 12 numeric characters." required>
					</div>
					<div class="data-input">
						<label for="receiver_name">Name:</label>
						<input type="text" id="name" name="name" required>
					</div>
					<button type="submit" name="submit" class="submit-button">Submit</button>
				</form>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                      <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
			</section>
		</main>
		<div class="nutri">
			<div class="content">
				<img class="lcph" src="img/logo_surau.png">
				<p>&copy; 2023 La Cottage Prayer Hall</p>
			</div>
		</div>
		<script>
			const body = document.querySelector("body");
			const navbar = document.querySelector(".navbar");
			const menuBtn = document.querySelector(".menu-btn");
			const cancelBtn = document.querySelector(".cancel-btn");
			menuBtn.onclick = ()=>{
				navbar.classList.add("show");
				menuBtn.classList.add("hide");
				body.classList.add("disabled");
			}
			cancelBtn.onclick = ()=>{
				body.classList.remove("disabled");
				navbar.classList.remove("show");
				menuBtn.classList.remove("hide");
			}
			window.onscroll = ()=>{
				this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
			}
			
			// Function to get query parameters from the URL
			function getQueryParam(param) {
				const urlSearchParams = new URLSearchParams(window.location.search);
				return urlSearchParams.get(param);
			}
	
			// Check if the 'notfound' query parameter is present
			const notFoundParam = getQueryParam('notfound');
			if (notFoundParam === 'true') {
				// Show a notification that the barcode was not found
				alert("Barcode not found in the database. Please add new data.");
			}
		
			// Automatically focus on the input field when the page loads
			document.addEventListener("DOMContentLoaded", function() {
				document.getElementById("item_barcode").focus();
			});
		</script>
	</body>
</html>
