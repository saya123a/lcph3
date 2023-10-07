<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Add Current Stocks</title>
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
					<li><a href="home_page.php">Home</a></li>
					<li>
						<div class="dropdown">
							<a button class="dropbtn">Update</button></a>
							<div class="dropdown-content">
								<div class="sub-dropdown">
									<a class="sub-dropbtn">Stocks</a>
									<div class="sub-dropdown-content">
										<a href="addcurrentdata.html">Add Current Stocks</a>
										<a href="addnewdata.html">Add New Stocks</a>
										<a href="deletecurrentdata.html">Delete Current Stocks</a>
									</div>
								</div>
								<div class="sub-dropdown">
									<a class="sub-dropbtn">Receiver</a>
									<div class="sub-dropdown-content">
										<a href="addnewreceiver.html">Add New Receiver</a>
										<a href="deletecurrentreceiver.html">Delete Current Receiver</a>
									</div>
								</div>
							</div>	
						</div>
					</li>
					<li><a href="checkoutmain.php">Checkout</a></li>
					<li><a href="login_page.php">Logout</a></li>
				</ul>
				<div class="icon menu-btn">
					<i class="fas fa-bars"></i>
				</div>
			</div>
		</nav>
		<div class="banner"></div>
		<main class="container">
			<section class="data-entry">
				<h2>Scan Barcode</h2>
				<form action="addcurrentdata.php" method="POST">
					<div class="data-input">
						<label for="item_barcode">Barcode:</label>
						<input type="text" id="item_barcode" name="item_barcode" required>
					</div>
					<button type="submit" name="submit" class="submit-button">Submit</button>
				</form>
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